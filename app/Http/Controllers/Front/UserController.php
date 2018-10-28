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
      'g-recaptcha-response' => 'required|captcha',
      'email' => 'required|email|exists:_class_user|max:255',
      'password' => 'required|string|min:3|max:255',
    ];

    protected $signInRulesAfterRegistration = [
        'email' => 'required|email|exists:_class_user|max:255',
        'password' => 'required|string|min:3|max:255',
      ];

    protected $signUpRules = [
      'g-recaptcha-response' => 'required|captcha',
      'name' => 'required|string|max:255',
      'email' => 'required|email|unique:_class_user,email,NULL,id,deleted_at,NULL',
      'password' => 'required|string|min:3|max:255|confirmed:password_confirmation',
      'password_confirmation' => 'required|string|min:3|max:255',
    ];

    protected $resetRequestRules = [
      'g-recaptcha-response' => 'required|captcha',
      'email' => 'required|email|exists:_class_user|max:255',
    ];

    protected $resetRules = [
      'g-recaptcha-response' => 'required|captcha',
      'password' => 'required|string|min:3|max:255|confirmed:password_confirmation',
      'password_confirmation' => 'required|string|min:3|max:255',
    ];

    protected function updateRules($user) {
      return [
        'g-recaptcha-response' => 'required|captcha',
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

      $permissions = ['email', 'public_profile']; // Optional permissions
      $facebookLoginUrl = $helper->getLoginUrl(url('facebook/callback'), $permissions);


      return $this->make_view('components.auth.login', compact('facebookLoginUrl'));
    }

    public function registerForm()
    {
      $fb = $this->getFB();

      $helper = $fb->getRedirectLoginHelper();

      $permissions = ['email', 'public_profile']; // Optional permissions
      $facebookLoginUrl = $helper->getLoginUrl(url('facebook/callback'), $permissions);
      return $this->make_view('components.auth.register', compact('facebookLoginUrl'));
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

    public function signIn(Request $request, $is_registered=false)
    {
        if($is_registered)
        {
            $this->validate($request, $this->signInRulesAfterRegistration);
        }
        else 
        {
            $this->validate($request, $this->signInRules);
        }
      

      $user = Model('user')->where('email', $request->input('email'))->first();

      if(!Hash::check($request->input('password'), $user->password)) {
        return redirect()->back()->withInput()->withErrors(['password'=>'Email or password do not match']);
      }

      Session::put('authUser', $user);

      if(\Input::get('continue')) {
        return redirect(\Input::get('continue'));
      }

      if(request('back'))
      {
          return redirect(lPath(request('back')));
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

      return $this->signIn($request, true);

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

    public function facebookCallback(Request $request)
    {
      session_start(); //Session should be active
      $fb = $this->getFB();

      $helper = $fb->getRedirectLoginHelper();
      if (isset($_GET['state'])) {
          $helper->getPersistentDataHandler()->set('state', $_GET['state']);
      }

      // dd($helper->getAccessToken());
      $accessToken = $helper->getAccessToken();

      if (! isset($accessToken)) {
        if ($helper->getError()) {
          header('HTTP/1.0 401 Unauthorized');
          echo "Error: " . $helper->getError() . "\n";
          echo "Error Code: " . $helper->getErrorCode() . "\n";
          echo "Error Reason: " . $helper->getErrorReason() . "\n";
          echo "Error Description: " . $helper->getErrorDescription() . "\n";
        } else {
          header('HTTP/1.0 400 Bad Request');
          echo 'Bad request';
        }
        exit;
      }
      

      // The OAuth 2.0 client handler helps us manage access tokens
      $oAuth2Client = $fb->getOAuth2Client();

      // Get the access token metadata from /debug_token
      $tokenMetadata = $oAuth2Client->debugToken($accessToken);

      // Validation (these will throw FacebookSDKException's when they fail)
      $tokenMetadata->validateAppId('1483465915068749'); // Replace {app-id} with your app id
      // If you know the user ID this access token belongs to, you can validate it here
      //$tokenMetadata->validateUserId('123');
      $tokenMetadata->validateExpiration();

      if (! $accessToken->isLongLived()) {
        // Exchanges a short-lived access token for a long-lived one
        try {
          $accessToken = $oAuth2Client->getLongLivedAccessToken($accessToken);
        } catch (Facebook\Exceptions\FacebookSDKException $e) {
          echo "<p>Error getting long-lived access token: " . $helper->getMessage() . "</p>\n\n";
          exit;
        }


      }

      try {
          // Returns a `Facebook\FacebookResponse` object
          $response = $fb->get('/me?fields=id,name,email', $accessToken);
        } catch(Facebook\Exceptions\FacebookResponseException $e) {
          echo 'Graph returned an error: ' . $e->getMessage();
          exit;
        } catch(Facebook\Exceptions\FacebookSDKException $e) {
          echo 'Facebook SDK returned an error: ' . $e->getMessage();
          exit;
        }

        $facebook_user = $response->getGraphUser();

        $user = Model('user')->where('facebook_id', $facebook_user['id'])->first();
        if(! count($user))
        {
          $userClass = Classes::where('shortname', 'user')->first();
          $usersNode = Nodes::where('shortname', 'users')->first();
          $userSlug = mt_rand(10,99).time().mt_rand(10,99).'-'.str_slug($facebook_user['name']);
          $activeLocal = PH::getActiveLocalId();

          Node::push($userClass->id, $usersNode->id, $userSlug, [
            $activeLocal => [
              'name' => $facebook_user['name'],
              'is_active' => true,
              'email' => $facebook_user['email'],
              'facebook_id' => $facebook_user['id'],
            ]
          ]); 
        }

        $user = Model('user')->where('facebook_id', $facebook_user['id'])->first();
        
        Session::put('authUser', $user);

        return redirect(lPath($user->node->absolute_path));

       
    }


}
