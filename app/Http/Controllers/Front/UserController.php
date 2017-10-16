<?php
namespace App\Http\Controllers\Front;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\RunsiteController;
use App\Runsite\Libraries\Node;
use App\Runsite\Languages;
use App\Runsite\Classes;
use App\Runsite\Nodes;
use Session;
use Hash;
use PH;
use App\Notifications\ResetPassword;
use App\Notifications\AuthData;
use Notification;


class UserController extends RunsiteController
{

    protected function getFB()
    {
      return new \Facebook\Facebook([
        'app_id' => '1483465915068749', // Replace {app-id} with your app id
        'app_secret' => '5f4c06c8fe25b1ec2d9c589f2f6bef8f',
        'default_graph_version' => 'v2.10',
        ]);
    }

    protected $signInRules = [
      'email' => 'required|email|exists:_class_user|max:255',
      'password' => 'required|string|min:3|max:255',
    ];

    protected $signUpRules = [
      'name' => 'required|string|max:255',
      'email' => 'required|email|unique:_class_user,email,NULL,id,deleted_at,NULL',
      'password' => 'required|string|min:3|max:255|confirmed:password_confirmation',
      'password_confirmation' => 'required|string|min:3|max:255',
    ];

    protected $resetRequestRules = [
      'email' => 'required|email|exists:_class_user|max:255',
    ];

    protected $resetRules = [
      'password' => 'required|string|min:3|max:255|confirmed:password_confirmation',
      'password_confirmation' => 'required|string|min:3|max:255',
    ];

    protected function updateRules($user) {
      return [
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:_class_user,email,'.$user->node_id.',node_id,deleted_at,NULL',
        'old_password' => 'sometimes|required|string|min:3|max:255',
        'new_password' => 'sometimes|required|string|min:3|max:255|confirmed:password_confirmation',
        'new_password_confirmation' => 'sometimes|required|string|min:3|max:255',
      ];
    }

    public function loginForm()
    {
      $fb = $this->getFB();

      $helper = $fb->getRedirectLoginHelper();

      $permissions = ['email']; // Optional permissions
      $facebookLoginUrl = $helper->getLoginUrl(url('facebook/callback'), $permissions);


      return $this->make_view('components.auth.login', compact('facebookLoginUrl'));
    }

    public function registerForm()
    {
      return $this->make_view('components.auth.register');
    }

    public function resetForm()
    {
      return $this->make_view('components.auth.reset');
    }

    public function view()
    {
      if(!Session::get('authUser'))
      {
        return redirect(lPath('/auth/login'));
      }
      return $this->make_view('components.auth.view');
    }

    public function signIn(Request $request)
    {
      $this->validate($request, $this->signInRules);

      $user = Model('user')->where('email', $request->input('email'))->first();

      if(!Hash::check($request->input('password'), $user->password)) {
        return redirect()->back()->withInput()->withErrors(['password'=>'Email or password do not match']);
      }

      Session::put('authUser', $user);

      if(\Input::get('continue')) {
        return redirect(\Input::get('continue'));
      }
      return redirect(lPath($user->node->absolute_path));
    }

    public function signUp(Request $request)
    {
      $this->validate($request, $this->signUpRules);

      $userClass = Classes::where('shortname', 'user')->first();
      $usersNode = Nodes::where('shortname', 'users')->first();
      $userSlug = mt_rand(10,99).time().mt_rand(10,99).'-'.str_slug($request->input('name'));
      $password = bcrypt($request->input('password'));
      $activeLocal = PH::getActiveLocalId();

      Node::push($userClass->id, $usersNode->id, $userSlug, [
        $activeLocal => [
          'name' => $request->input('name'),
          'is_active' => true,
          'email' => $request->input('email'),
          'password' => $password,
        ]
      ]);

      $user = Model('user')->where('email', $request->input('email'))->first();
      Notification::send($user, new AuthData($user->email, $request->input('password')));

      return $this->signIn($request);

    }

    public function update(Request $request)
    {
      $authUser = Session::get('authUser');
      $this->validate($request, $this->updateRules($authUser));

      $data = [
        'name' => $request->input('name'),
        'email' => $request->input('email'),
      ];

      if($request->has('edit_password'))
      {
        if(!Hash::check($request->input('old_password'), $authUser->password)) {
          return redirect()->back()->withInput()->withErrors(['old_password'=>'Password do not match']);
        }

        $data['password'] = bcrypt($request->input('new_password'));
      }

      Model('user')->where('node_id', $authUser->node_id)->update($data);

      // $user = Model('user')->where('email', $request->input('email'))->first();

      if($request->has('edit_password'))
        Notification::send($authUser, new AuthData($authUser->email, $request->input('new_password')));

      return redirect(lPath($authUser->node->absolute_path));
    }

    public function sendResetRequest(Request $request)
    {
      $this->validate($request, $this->resetRequestRules);

      $token = str_random(255);

      Model('user')->where('email', $request->input('email'))->update(['reset_token'=>$token]);

      $user = Model('user')->where('email', $request->input('email'))->first();

      Notification::send($user, new ResetPassword());

      return $this->make_view('components.auth.reset_request');
    }

    public function resetPassword(Request $request)
    {
      $user = Model('user')->where('email', $request->input('email'))->where('reset_token', $request->input('token'))->first();
      if(count($user))
      {
        return $this->make_view('components.auth.reset_form', ['request'=>$request]);
      }
    }

    public function resetPasswordAction(Request $request)
    {
      $this->validate($request, $this->resetRules);
      $user = Model('user')->where('email', $request->input('email'))->where('reset_token', $request->input('reset_token'))->first();
      if(count($user))
      {
        Model('user')->where('node_id', $user->node_id)->update(['password'=>bcrypt($request->input('password'))]);
        Notification::send($user, new AuthData($user->email, $request->input('password')));

        return redirect(lPath('/auth/login'));
      }

      else
      {
        echo 'access error';
      }
    }

    public function logout()
    {
      Session::flash('authUser', false);
      return redirect(lPath('/auth/login'));
    }

    public function facebookCallback()
    {

    }


}
