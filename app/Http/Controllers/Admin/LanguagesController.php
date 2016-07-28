<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Http\Request;
use App\Runsite\Languages;
use App\Runsite\Nodes;
use App\Runsite\Classes;
use App\Runsite\Libraries\Node;

class LanguagesController extends Controller {

  protected $storeRules = [
    'locale'    => 'required|unique:languages,locale|max:2|alpha',
    'name'      => 'required|unique:languages,locale|max:64|alpha',
  ];

  protected $updateRules = [
    'id'        => 'required|integer|exists:languages,id',
    'locale'    => 'required|max:2|alpha',
    'name'      => 'required|max:64|alpha',
  ];

  protected $removeRules = [
    'id'        => 'required|integer|exists:languages,id',
  ];

  public function items(Languages $languagesModel) {
    $languages = $languagesModel->get();
    return view('admin.languages.items')
            ->withLanguages($languages);
  }

  public function create(Languages $languagesModel) {
    return view('admin.languages.create');
  }

  public function edit($id, Languages $languagesModel) {
    $lang = $languagesModel->find((int) $id);
    $actives = $languagesModel->where('is_active', true)->count();
    if($lang) {
      return view('admin.languages.edit')
        ->withLang($lang)
        ->withActives($actives);
    }
    else {
      // return items view
      return \Redirect::route('admin.languages.items');
    }
  }

  public function remove_confirmation($id, Languages $languagesModel) {
    $lang = $languagesModel->find((int) $id);
    if($lang) {
      return view('admin.languages.remove')->withLang($lang);
    }
    else {
      return \Redirect::route('admin.languages.items');
    }
  }

  public function store(Request $request, Validator $validator) {
    // validation request
    if($v = $validator::make($request->all(), $this->storeRules) and $v->fails()) {
      return redirect()->back()->withInput()->withErrors($v->errors()); // errors exists
    }

    $language = Languages::create($request->all());

    // Node::push(1, 0, '/', [
    //   $language->id => [
    //     'name' => 'Main page',
    //     'is_active' => true,
    //   ],
    // ]);

    $node = Node::getUniversal('index', false, true);

    $node->node_id = 1;
    $node->parent_id = 0;
    $node->parent_id = 0;
    $node->language_id = $language->id;
    $node->name = 'Main page';
    $node->is_active = true;

    $node->save();

    //dd($language);
    // return items view
    return \Redirect::route('admin.languages.items');
  }

  public function update(Request $request, Languages $languagesModel, Validator $validator) {
    // validation request
    if($v = $validator::make($request->all(), $this->updateRules) and $v->fails()) {
      return redirect()->back()->withInput()->withErrors($v->errors()); // errors exists
    }

    $lang = $languagesModel->find((int) $request->id);
    $lang->setValues($request);

    if($lang->is_active === false and $languagesModel->where('is_active', true)->count() <= 1) {
      $lang->is_active = true;
    }

    $lang->save();

    if($request->is_default) {
      $languagesModel->where('id', '!=', $request->id)->update(['is_default' => false]);
    }

    // saving success message
    \Session::flash('success','Successfully saved');

    // return edit view
    return \Redirect::route('admin.languages.edit', $lang->id);

  }

  public function remove(Request $request, Languages $languagesModel, Validator $validator, Nodes $nodesModel, Classes $classesModel) {
    // validation request
    if($v = $validator::make($request->all(), $this->removeRules) and $v->fails()) {
      return redirect()->back()->withInput()->withErrors($v->errors()); // errors exists
    }

    $lang = $languagesModel->find((int) $request->id);
    if(!$lang->is_default) {
      $lang->delete();
      $classes = $classesModel->get();
      if(count($classes)) {
        foreach($classes as $class) {
          \DB::table($classesModel->prefix.$class->shortname)->where('language_id', $request->id)->delete();
        }
      }
    }


    return \Redirect::route('admin.languages.items');

  }

}
