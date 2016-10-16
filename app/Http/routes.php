<?php

use App\Runsite\Libraries\Node;
use App\Runsite\Nodes;
use App\Runsite\Classes;
use App\Runsite\Libraries\PH;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('/_debugbar/assets/stylesheets', [
    'as' => 'debugbar-css',
    'uses' => '\Barryvdh\Debugbar\Controllers\AssetController@css'
]);

Route::get('/_debugbar/assets/javascript', [
    'as' => 'debugbar-js',
    'uses' => '\Barryvdh\Debugbar\Controllers\AssetController@js'
]);

  Route::group(['prefix'=>'panel-admin', 'namespace'=>'Admin'], function(){

    // Route::get('/signup', [
    //       'uses' => 'AuthController@getSignUpPage',
    //       'as' => 'signup'
    //   ]);
    //
    //   Route::post('/signup', [
    //       'uses' => 'AuthController@postSignUp',
    //       'as' => 'signup'
    //   ]);
    //
    //   Route::get('/signin', [
    //       'uses' => 'AuthController@getSignInPage',
    //       'as' => 'signin'
    //   ]);
    //
    //   Route::post('/signin', [
    //       'uses' => 'AuthController@postSignIn',
    //       'as' => 'signin'
    //   ]);
    //
    //   Route::get('/logout', [
    //       'uses' => 'Auth\\AuthController@getLogout',
    //       'as' => 'logout'
    //   ]);

    Route::group(['prefix' => 'auth', 'namespace' => 'Auth'], function() {
      Route::get('login',     ['uses' => 'AuthController@getLogin',     'as' => 'admin.auth.login']);
      Route::get('logout',    ['uses' => 'AuthController@getLogout',    'as' => 'admin.auth.logout']);
      Route::post('signin',   ['uses' => 'AuthController@postLogin',    'as' => 'admin.auth.signin']);
    });

    Route::group(['middleware' => 'auth'], function(){

      Route::get('/',                                               ['as'=>'admin',                                 'uses'=>'MainController@Execute']);
      Route::get('tree',                                            ['as'=>'admin.tree',                            'uses'=>'MainController@tree']);

      // Users
      Route::resource('roles', 'RoleController');
      Route::resource('userrole', 'UserroleController');
      Route::resource('users', 'UsersController');

      // CLASSES
      Route::group(['prefix' => 'classes'], function(){
        Route::get('/',                                             ['as'=>'admin.classes.items',                   'uses'=>'ClassesController@items']);
        Route::get('edit/{id}',                                     ['as'=>'admin.classes.edit',                    'uses'=>'ClassesController@edit']);
        Route::get('create',                                        ['as'=>'admin.classes.create',                  'uses'=>'ClassesController@create']);
        Route::get('remove/{id}',                                   ['as'=>'admin.classes.remove_confirmation',     'uses'=>'ClassesController@remove_confirmation']);
        Route::post('store',                                        ['as'=>'admin.classes.store',                   'uses'=>'ClassesController@store']);
        Route::post('update',                                       ['as'=>'admin.classes.update',                  'uses'=>'ClassesController@update']);
        Route::post('remove',                                       ['as'=>'admin.classes.remove',                  'uses'=>'ClassesController@remove']);
      });

      // FIELDS
      Route::group(['prefix' => 'fields'], function(){
        Route::get('{class_id}',                                    ['as'=>'admin.fields.items',                    'uses'=>'FieldsController@items']);
        Route::get('edit/{class_id}/{field_id}',                    ['as'=>'admin.fields.edit',                     'uses'=>'FieldsController@edit']);
        Route::get('settings/{class_id}/{field_id}',                ['as'=>'admin.fields.settings',                 'uses'=>'FieldsController@settings']);
        Route::get('create/{class_id}',                             ['as'=>'admin.fields.create',                   'uses'=>'FieldsController@create']);
        Route::get('remove/{class_id}/{field_id}',                  ['as'=>'admin.fields.remove_confirmation',      'uses'=>'FieldsController@remove_confirmation']);
        Route::get('moveup/{class_id}/{field_id}',                  ['as'=>'admin.fields.moveup',                   'uses'=>'FieldsController@moveup']);
        Route::get('movedown/{class_id}/{field_id}',                ['as'=>'admin.fields.movedown',                 'uses'=>'FieldsController@movedown']);
        Route::post('store/{class_id}',                             ['as'=>'admin.fields.store',                    'uses'=>'FieldsController@store']);
        Route::post('update/{class_id}',                            ['as'=>'admin.fields.update',                   'uses'=>'FieldsController@update']);
        Route::post('settings/update/{class_id}/{field_id}',        ['as'=>'admin.fields.settings.update',          'uses'=>'FieldsController@settings_update']);
        Route::post('remove/{field_id}',                            ['as'=>'admin.fields.remove',                   'uses'=>'FieldsController@remove']);
      });

      // GROUPS
      Route::group(['prefix' => 'groups'], function(){
        Route::get('{class_id}',                                    ['as'=>'admin.groups.items',                    'uses'=>'GroupsController@items']);
        Route::get('create/{class_id}',                             ['as'=>'admin.groups.create',                   'uses'=>'GroupsController@create']);
        Route::get('edit/{class_id}/{group_id}',                    ['as'=>'admin.groups.edit',                     'uses'=>'GroupsController@edit']);
        Route::get('remove/{class_id}/{group_id}',                  ['as'=>'admin.groups.remove_confirmation',      'uses'=>'GroupsController@remove_confirmation']);
        Route::post('store/{class_id}',                             ['as'=>'admin.groups.store',                    'uses'=>'GroupsController@store']);
        Route::post('update/{class_id}',                            ['as'=>'admin.groups.update',                   'uses'=>'GroupsController@update']);
        Route::post('remove/{group_id}',                            ['as'=>'admin.groups.remove',                   'uses'=>'GroupsController@remove']);
      });

      // DEPENDENCIES
      Route::group(['prefix' => 'dependencies'], function(){
        Route::get('{class_id}',                                    ['as'=>'admin.dependencies.view',               'uses'=>'DependenciesController@view']);
        Route::get('add/{class_id}/{add_id}',                       ['as'=>'admin.dependencies.add',                'uses'=>'DependenciesController@add']);
        Route::get('remove/{class_id}/{remove_id}',                 ['as'=>'admin.dependencies.remove',             'uses'=>'DependenciesController@remove']);
      });

      // LANGUAGES
      Route::group(['prefix' => 'languages'], function(){
        Route::get('/',                                             ['as'=>'admin.languages.items',                 'uses'=>'LanguagesController@items']);
        Route::get('create',                                        ['as'=>'admin.languages.create',                'uses'=>'LanguagesController@create']);
        Route::get('edit/{id}',                                     ['as'=>'admin.languages.edit',                  'uses'=>'LanguagesController@edit']);
        Route::get('remove/{id}',                                   ['as'=>'admin.languages.remove_confirmation',   'uses'=>'LanguagesController@remove_confirmation']);
        Route::post('store',                                        ['as'=>'admin.languages.store',                 'uses'=>'LanguagesController@store']);
        Route::post('update',                                       ['as'=>'admin.languages.update',                'uses'=>'LanguagesController@update']);
        Route::post('remove',                                       ['as'=>'admin.languages.remove',                'uses'=>'LanguagesController@remove']);
      });

      // NODES
      Route::group(['prefix' => 'nodes'], function(){
        Route::get('edit/{id}',                                     ['as'=>'admin.nodes.edit',                      'uses'=>'NodesController@edit']);
        Route::get('create/{class_id}/{parent_id}',                 ['as'=>'admin.nodes.create',                    'uses'=>'NodesController@create']);
        Route::get('settings/{id}',                                 ['as'=>'admin.nodes.settings',                  'uses'=>'NodesController@settings']);
        Route::get('dependencies/{id}',                             ['as'=>'admin.nodes.dependencies',              'uses'=>'NodesController@dependencies']);
        Route::get('dependencies/add/{node_id}/{add_id}',           ['as'=>'admin.nodes.dependencies.add',          'uses'=>'NodesController@dependencies_add']);
        Route::get('dependencies/remove/{node_id}/{remove_id}',     ['as'=>'admin.nodes.dependencies.remove',       'uses'=>'NodesController@dependencies_remove']);
        Route::post('update',                                       ['as'=>'admin.nodes.update',                    'uses'=>'NodesController@update']);
        Route::post('store',                                        ['as'=>'admin.nodes.store',                     'uses'=>'NodesController@store']);
        Route::post('settings',                                     ['as'=>'admin.nodes.settings.update',           'uses'=>'NodesController@settings_update']);
        Route::get('destroy{id}',                                   ['as'=>'admin.nodes.destroy',                   'uses'=>'NodesController@destroy']);
        Route::post('export',                                       ['as'=>'admin.nodes.export',                    'uses'=>'NodesController@export']);
        Route::get('sort/up/{id}/{class_id}/{parent_id}',           ['as'=>'admin.nodes.sort_up',                   'uses'=>'NodesController@sort_up']);
        Route::get('sort/down/{id}/{class_id}/{parent_id}',         ['as'=>'admin.nodes.sort_down',                 'uses'=>'NodesController@sort_down']);

        // UPLOAD IMAGE DROPZONE
        Route::post('upload-image',                                 ['as'=>'admin.nodes.upload.image',              'uses'=>'NodesController@uploadImage']);
      });

      // FILEMANAGER
      Route::get('filemanager', ['as'=>'filemanager', 'uses'=>'FilemanagerController@index']);
      Route::group(['prefix' => 'events'], function(){
        Route::get('list', ['as'=>'events.list', 'uses'=>'EventsController@index']);
        Route::get('user/{id}', ['as'=>'events.user', 'uses'=>'EventsController@user']);
        Route::get('view/{id}', ['as'=>'events.view', 'uses'=>'EventsController@view']);
      });

      // NOTIFY
      // Route::group(['prefix' => 'notify'], function(){
      //   Route::get('/',                                             ['as'=>'admin.notify.items',                 'uses'=>'NotifyController@items']);
      //   Route::get('create',                                        ['as'=>'admin.notify.create',                'uses'=>'NotifyController@create']);
      //   Route::get('edit/{id}',                                     ['as'=>'admin.notify.edit',                  'uses'=>'NotifyController@edit']);
      //   Route::post('store',                                        ['as'=>'admin.notify.store',                 'uses'=>'NotifyController@store']);
      //   Route::post('update',                                       ['as'=>'admin.notify.update',                'uses'=>'NotifyController@update']);
      //   Route::post('remove',                                       ['as'=>'admin.notify.remove',                'uses'=>'NotifyController@remove']);
      // });
      Route::get('notify/last', ['as'=>'admin.notify.last', 'uses'=>'NotifyController@last']);
      Route::get('notify/count', ['as'=>'admin.notify.count', 'uses'=>'NotifyController@cnt']);
      Route::resource('notify', 'NotifyController');


      // AUTOCOMPETE
      Route::get('autocomplete', ['as'=>'admin.autocomplete', 'uses'=>'NodesController@getAutocompleteResults']);

      // Route::get('/laravel-filemanager', '\Tsawler\Laravelfilemanager\controllers\LfmController@show');
      // Route::post('/laravel-filemanager/upload', '\Tsawler\Laravelfilemanager\controllers\LfmController@upload');
      Route::get('sample-ckeditor-integration', function () {
          return \Illuminate\Support\Facades\View::make('editor');
      });

      // Show LFM
      Route::get('/laravel-filemanager', '\Tsawler\Laravelfilemanager\controllers\LfmController@show');


      // upload
      Route::any('/laravel-filemanager/upload', '\Tsawler\Laravelfilemanager\controllers\UploadController@upload');

      // list images & files
      Route::get('/laravel-filemanager/jsonimages', '\Tsawler\Laravelfilemanager\controllers\ItemsController@getImages');
      Route::get('/laravel-filemanager/jsonfiles', '\Tsawler\Laravelfilemanager\controllers\ItemsController@getFiles');

      // folders
      Route::get('/laravel-filemanager/newfolder', '\Tsawler\Laravelfilemanager\controllers\FolderController@getAddfolder');
      Route::get('/laravel-filemanager/deletefolder', '\Tsawler\Laravelfilemanager\controllers\FolderController@getDeletefolder');
      Route::get('/laravel-filemanager/folders', '\Tsawler\Laravelfilemanager\controllers\FolderController@getFolders');

      // crop
      Route::get('/laravel-filemanager/crop', '\Tsawler\Laravelfilemanager\controllers\CropController@getCrop');
      Route::get('/laravel-filemanager/cropimage', '\Tsawler\Laravelfilemanager\controllers\CropController@getCropimage');

      // rename
      Route::get('/laravel-filemanager/rename', '\Tsawler\Laravelfilemanager\controllers\RenameController@getRename');

      // scale/resize
      Route::get('/laravel-filemanager/resize', '\Tsawler\Laravelfilemanager\controllers\ResizeController@getResize');
      Route::get('/laravel-filemanager/doresize', '\Tsawler\Laravelfilemanager\controllers\ResizeController@performResize');

      // download
      Route::get('/laravel-filemanager/download', '\Tsawler\Laravelfilemanager\controllers\DownloadController@getDownload');

      // delete
      Route::get('/laravel-filemanager/delete', '\Tsawler\Laravelfilemanager\controllers\DeleteController@getDelete');

    });
    //return true;
  });


  Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => [ 'localeSessionRedirect', 'localizationRedirect' ]], function()
  {

    $uri = \Request::path();
    if($uri != '/') $uri = '/'.$uri;

    $node = Nodes::where('absolute_path', $uri)->first();

    // $node = \Cache::remember('absolute_path_'.md5($uri), 15, function() use($uri) {
    //     return Nodes::where('absolute_path', $uri)->first();
    // });

    if($node) {
      if($node->controller) {
        // Якщо контроллер прописаний в вузлі то юзаєм його
        $controller = $node->controller;
      }
      else {
        // Якщо контроллер не вказано то пробуємо витягнути "контроллер по замовчуванню" з класу
        $class = Classes::find($node->class_id);
        $controller = $class->default_controller;
      }
      PH::setGlobal('RunsiteNode', $node);

      if($controller) {
        Route::any('/', ['uses'=>'Front\\'.$controller]);
        Route::any('{slug}', ['uses'=>'Front\\'.$controller])->where('slug', '([A-z\d-\/_.]+)?');
      }
    }




  });
