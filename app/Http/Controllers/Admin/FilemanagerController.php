<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Runsite\Fields;
use App\Runsite\Classes;
use App\Runsite\Field_types;
use App\Runsite\Field_groups;
use App\Runsite\Field_settings;
use App\Runsite\Field_settings_default;
use Illuminate\Http\Request;
use Validator;

class FilemanagerController extends Controller {

  public function index() {
    return view('admin.filemanager.index');
  }
}
