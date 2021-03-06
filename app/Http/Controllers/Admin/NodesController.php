<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Runsite\Nodes;
use App\Runsite\Classes;
use App\Runsite\Fields;
use App\Runsite\Field_groups;
use App\Runsite\Field_types;
use App\Runsite\Field_settings;
use App\Runsite\Languages;
use App\Runsite\Data;
use App\Runsite\Class_dependencies;
use App\Runsite\Node_dependencies;
use Request;
use Debugbar;
use Validator;
use Image;
use Excel;
use App\Runsite\Libraries\Node;
use Session;
use App\Runsite\Image as RunsiteImage;
use DB;
use App\Runsite\Event;
use Auth;
use App\Runsite\Libraries\Alert;
use App\Http\Actions\Node as NodeAction;

class NodesController extends Controller {

  protected $pagination_limit = 30;
  protected $ignoredKeys = [
    'image_remove',
  ];

  protected $middlewareOperations = [
    'image',
    'link_group',
    'images_multiple',
  ];

  protected $ignoreEmpty = [
    'image',
    'images_multiple',
  ];


  protected function dependenciesAddRules($node_id) {
    return [
      'node_id'     => 'required|integer|exists:nodes,id',
      'add_id'      => 'required|integer|exists:classes,id',
    ];
  }

  protected $dependenciesRemoveRules = [
    'node_id'     => 'required|integer|exists:nodes,id',
    'remove_id'   => 'required|integer|exists:node_dependencies,subclass_id',
  ];

  protected $imagesPath = 'imglib';

  public function edit($id) {

    $authUser = \Auth::user();

    // Отримуємо вузол
    $_NODE        = Nodes::with('_class._fields.type.group.settings')->find($id) or abort(404);
    // Отримуємо список активних мов
    $_LANGUAGES   = Languages::where('is_active', true)->orderBy('is_default', 'desc')->get();
    // Отримуємо групи полей даного класу вузла
    $_GROUPS      = Field_groups::where('class_id', $_NODE->class_id)->get();

    // Ініціалізуємо універсальну модель
    $_DATA = new Data;
    $_DATA->init($_NODE->_class->prefix . $_NODE->_class->shortname, $_NODE->_class->_fields);

    // Завантажуємо дані
    $_VALUES      = $_DATA->where('node_id', $_NODE->id)->get();
    $_LANGS       = [];

    foreach($_VALUES as $item) {
      // Перебираємо в циклі і присвоюємо поля відносно мови
      $_LANGS[$item->language_id] = $item;
    }

    // Отримуємо підкласи класів
    $_DEPENDENCIES      = Class_dependencies::where('class_id', $_NODE->_class->id)->with('classes')->get();
    // if($authUser->is_limited) {
    //   foreach($_DEPENDENCIES as $k=>$v) {
    //     if(! $v->classes->limited_users_can_create) {
    //       unset($_DEPENDENCIES[$k]);
    //     }
    //   }
    // }

    // Отримуємо підкласи вузла
    $_NODE_DEPENDENCIES = Node_dependencies::where('node_id', $_NODE->id)->with('classes')->get();
    // if($authUser->is_limited) {
    //   foreach($_NODE_DEPENDENCIES as $k=>$v) {
    //     if(! $v->classes->limited_users_can_create) {
    //       unset($_NODE_DEPENDENCIES[$k]);
    //     }
    //   }
    // }




    // CHILDREN
    if(!empty(Request::get('class'))) {
      // Якщо клас передано параметром
      $class_id = Request::get('class');
    }
    else {
      // Якщо не передано то пробуємо завантажити клас зі списку залежностей
      $dependencies       = $_DEPENDENCIES->first();
      $nodedependencies   = $_NODE_DEPENDENCIES->first();
      if($dependencies) {
        // якшо є залежності то ок
        $class_id         = $_DEPENDENCIES->first()->subclass_id;
      }
      elseif($nodedependencies) {
        // якшо нема то нема
        $class_id = $nodedependencies->subclass_id;
      }
      else {
        $class_id = false;
      }
    }

    // ініціалізуємо змінні
    $_CLASS = false;
    $_FIELDS_TO_SHOW = false;
    $_CHILDREN = false;
    $showChildren = false;
    $all_fields = false;
    $_CHILDREN_LAST_ORDER = false;

    if($class_id) {
      // якшо є клас то присвоюємо змінним значення
      $_CLASS             = Classes::find($class_id);
      $_FIELDS_TO_SHOW    = Fields::where('class_id', $_CLASS->id)->where('shown', true)->with('type')->get();
      // $_CHILDREN          = Nodes::where('parent_id', $_NODE->id)->where('class_id', $class_id)->paginate($this->pagination_limit);
      $_CHILDREN          = Node::getUniversal(false, $class_id)->where('parent_id', $_NODE->id)->where('language_id', Languages::where('is_default', true)->first()->id);

      if(Request::get('filter') and Request::get('filter_value') !== false)
      {
        if(Request::get('condition') and Request::get('condition') == 'like')
        {
          $_CHILDREN = $_CHILDREN->where(Request::get('filter'), 'like', '%'.Request::get('filter_value').'%');
        }
        else
        {
          $_CHILDREN = $_CHILDREN->where(Request::get('filter'), Request::get('filter_value'));
        }
      }

      if($_CLASS->order_by)
      {
        $order_by_parts = explode(' ', $_CLASS->order_by);
        $_CHILDREN = $_CHILDREN->orderBy($order_by_parts[0], $order_by_parts[1])->paginate($this->pagination_limit);
      }
      else
      {
        $_CHILDREN = $_CHILDREN->orderBy('orderby', 'asc')->paginate($this->pagination_limit);
      }

      $_CHILDREN_LAST_ORDER = Node::getUniversal(false, $class_id)->where('parent_id', $_NODE->id)->orderBy('orderby', 'desc')->first();
      if($_CHILDREN_LAST_ORDER) $_CHILDREN_LAST_ORDER = $_CHILDREN_LAST_ORDER->orderby;
      $showChildren       = true;

      // Отримуємо всі поля класу
      $all_fields         = Fields::where('class_id', $_CLASS->id)->get();
    }

    // будуємо хлібні крихти
    $breadcrumb         = array_reverse($_NODE->generateBreadcrumb($_NODE->id));

    // відправляємо в шаблон
    return view('admin.nodes.edit')
            ->withNode($_NODE)
            ->withLanguages($_LANGUAGES)
            ->withGroups($_GROUPS)
            ->withValues($_LANGS)
            ->withDependencies($_DEPENDENCIES)
            ->with('NodeDependencies', $_NODE_DEPENDENCIES)
            ->withChildren($_CHILDREN)
            ->withClass($_CLASS)
            ->withFields($_FIELDS_TO_SHOW)
            ->withBreadcrumb($breadcrumb)
            ->with('showChildren', $showChildren)
            ->with('all_fields', $all_fields)
            ->with('children_last_order', $_CHILDREN_LAST_ORDER)
            ->with('filter', Request::get('filter'))
            ->with('filter_value', Request::get('filter_value'));

  }

  public function create($class_id, $parent_id) {

    $_CLASS       = Classes::find($class_id) or abort(404);
    $_LANGUAGES   = Languages::where('is_active', true)->orderBy('is_default', 'desc')->get();
    $_GROUPS      = Field_groups::where('class_id', $class_id)->get();
    $_FIELDS      = Fields::where('class_id', $class_id)->orderBy('sort', 'asc')->get();
    $_PARENT      = Nodes::find($parent_id);

    return view('admin.nodes.create')
            ->withLanguages($_LANGUAGES)
            ->withGroups($_GROUPS)
            ->withClass($_CLASS)
            ->withFields($_FIELDS)
            ->withParent($_PARENT)
            ->withNode($_PARENT);

  }

  public function update($request=false, $node_id=false, $parent_id=false, $is_creating=false) {
    // $langs = Languages::where('is_active', true)->get(); # отримаємо усі мови сайту TODO: не знаю чи це потрібно. Треба потестити і видалити якшо не треба.
    $default_lang = Languages::where('is_default', true)->first();

    if(! $request) { # оприділяємося зі значеннями $values
      $request = Request::all(); # якшо нема $values то пробуємо отримати їх з реквесту
    }


    # оприділяємося з нодами - якшо нема в значеннях то вони мають бути в аргументах
    if(! isset($request['node_id']) and $node_id)         $request['node_id']      = $node_id;
    if(! isset($request['parent_id']) and $parent_id)     $request['parent_id']    = $parent_id;
    # оприділилися

    $node       = Nodes::find($request['node_id']); # загружаємо ноду
    $class      = Classes::find($node->class_id); # загружаємо клас
    $fields     = Fields::where('class_id', $node->class_id)->get(); # загружаємо поля

    foreach($request['langs'] as $lang_id=>$values) { # передибаємо мови
      $langData = []; # тимчасова змінна для оновлення бази даних
      foreach($values as $key=>$value) { # перебираємо ключі - значення

        # TODO: передопрацювання різних типів полей
        $currentField = $this->getField($fields, $key);
        if($currentField and in_array($currentField->type->input_controller, $this->middlewareOperations)) {
          $value = Fields::middleware($currentField, $value);
          // $value = $this->{'process'.$currentField->type->name}($currentField, $value);
        }


        if(! in_array($key, $this->ignoredKeys)) { # якшо ключа немає в масиві ігнорованих..
          if($value) {
            $langData[$key] = $value;
          }
          elseif(! in_array($currentField->type->input_controller, $this->ignoreEmpty)) { # якшо поле не є в списку ігнорованих, при пустоті
            $langData[$key] = $value;
          }
          elseif(isset($request['clear'][$lang_id][$key]) and $request['clear'][$lang_id][$key]) { # якшо відправлено запит на очищення поля
            $langData[$key] = null;
          }

          if(isset($langData[$key]) and $lang_id == $default_lang->id) {
            $request['langs'][$default_lang->id][$key] = $langData[$key];
          }

          if($currentField and $currentField->ignore_language and $lang_id != $default_lang->id) { # якшо поле ігнорується мовами то ...
            if(isset($request['clear'][$default_lang->id][$key]) and $request['clear'][$default_lang->id][$key]) { # якшо відправлено запит на очищення поля
                $langData[$key] = null;
            }
            elseif(isset($request['langs'][$default_lang->id][$key])) {
              $langData[$key] = $request['langs'][$default_lang->id][$key]; # ... то заповнюємо його таким же значенням як в основної мови
            }
          }
        }




      } # -- кінець перебирання ключів-значень --

      # оновлення бази даних
      # спочатку перевіримо чи є рекорд мови в таблиці і якшо нема то створимо
      if(! Node::getUniversal($class->shortname)->where('language_id', $lang_id)->where('node_id', $node->id)->count()) {
        # потрібно в тому випадку, коли додали нову мову і треба створити новий рекорд в таблиці.
        # відповідно його треба заповнити системною інформацією, яка дублюється. От звідси і візьметься ця інформація.
        $nodeData   = Node::getUniversal($class->shortname)
                        ->where('language_id', $default_lang->id)
                        ->where('node_id', $node->id)
                        ->first();

        # створюємо рекорд
        DB::table('_class_'.$class->shortname)->insert([
          'node_id' => $node->id,
          'parent_id' => $node->parent_id,
          'orderby' => ($nodeData) ? $nodeData->orderby : (Node::getLastOrder($class->shortname) + 1),
          'language_id' => $lang_id,
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s'),
        ]);

      }


      Node::getUniversal($class->shortname)
        ->where('language_id', $lang_id)
        ->where('node_id', $node->id)
        ->update($langData);
      # -- кінець оновлення бази даних --

      unset($langData); # видалення тимчасової змінної
    } # -- кінець перебирання мов --

    # записуємо в журнал
    Event::create([
      'user_id' => Auth::user()->id,
      'event_type_id' => $is_creating ? 1 : 2,
      'node_id' => $node->id,
    ]);


    // Session::flash('success', 'saved');
    Alert::success(trans('admin/nodes.Зміни в розділі успішно збережені'));
    Session::flash('active_group', $request['active_group_id']);
    Session::flash('active_lang', $request['active_lang_id']);

    if($is_creating)
    {
      NodeAction::create($node->id, $class->shortname);
    }
    else
    {
      NodeAction::update($node->id, $class->shortname);
    }

    switch ($request['do_after']) {
      case 'stay':
        return redirect()->route('admin.nodes.edit', $request['node_id']);
        break;

      case 'go_up':
        if($node->parent_id)
          return redirect()->route('admin.nodes.edit', $node->parent_id);
        else
          return redirect()->route('admin.nodes.edit', $request['node_id']);
        break;

      default:
        return redirect()->route('admin.nodes.edit', $request['node_id']);
        break;
    }



  }





  // protected function processImage($currentField, $value) {
  //   if($value) {
  //     $defSizes = explode('/', $this->getFieldParameter($currentField->settings, 'image_sizes'));
  //     if(! is_array($value)) {
  //       $filename = str_slug(time().'-'.str_random(5).'-'.mt_rand(100, 999)).'.png';
  //       foreach($defSizes as $k=>$size) {
  //         $targetFolder = $size.'px';
  //         if(! $k) $targetFolder = 'full';
  //         if(++$k == count($defSizes)) $targetFolder = 'thumb';
  //         RunsiteImage::createFrom($value, $filename, $size, $targetFolder);
  //       }
  //
  //       return $filename;
  //     }
  //   }
  //   else {
  //     return null;
  //   }
  //
  // }
  //
  protected function getField($fields, $key) {
    foreach($fields as $field) {
      if($field->shortname == $key) {
        return $field;
        break;
      }
    }
  }
  //
  // protected function getFieldParameter($settings, $need) {
  //   foreach($settings as $key=>$value) {
  //     if($value->_parameter == $need) {
  //       return $value->_value;
  //       break;
  //     }
  //   }
  // }


  public function _update($values = false, $node_id = false, $parent_id = false) {
    $_LNG = new Languages;
    if(!$values) $values = Request::all();
    if(!isset($values['node_id']) and $node_id) $values['node_id'] = $node_id;
    if(!isset($values['parent_id']) and $parent_id) $values['parent_id'] = $parent_id;
    $node       = Nodes::find($values['node_id']);
    $class      = Classes::find($node->class_id);
    $fields     = Fields::where('class_id', $class->id)->with('type')->get();
    $languages  = Languages::where('is_active', true)->get();
    $def_lang   = $_LNG->getDefault()->id;
    $last_order = Node::getUniversal($class->shortname)->where('parent_id', $parent_id)->orderBy('orderby', 'desc')->first();

    foreach($languages as $language) {
      $data = new Data;
      $data->init($class->prefix.$class->shortname, $fields->pluck('shortname'));
      $dataEx = $data->where('node_id', $node->id)->where('language_id', $language->id)->first();
      if($dataEx) $dataEx->init($class->prefix.$class->shortname, $fields->pluck('shortname'));
      foreach($fields as $field) {

        // MIDDLEWARE IMAGE
        if($field->type->input_controller == 'image') {

          if(isset($values['langs'][$language->id][$field->shortname.'_remove']) and $values['langs'][$language->id][$field->shortname.'_remove']) {
            $values['langs'][$language->id][$field->shortname] = NULL;
          }
          else {
            $imageFile = Request::file('langs.'.$language->id.'.'.$field->shortname);

            if(is_array($imageFile)) {
              // якшо передано масив
              ;
            }
            else {
              // якшо передано файл
              ;
            }

            if($imageFile != NULL and $imageFile->isValid()) {
              // зображення передано і валідне
              $filename = str_slug(time().'-'.str_random(25)).'.png';
              $settings = Field_settings::pull(Field_settings::where('field_id', $field->id)->get(), 'image_sizes');
              $settings = explode('/', $settings);
              foreach($settings as $size_key=>$size) {
                if(!$size_key) $folder_name = 'full';
                elseif(++$size_key == count($settings)) $folder_name = 'thumb';
                else $folder_name = $size.'px';
                if(!is_dir( public_path('imglib/' . $folder_name . '/') )) mkdir(public_path('imglib/' . $folder_name . '/'));
                $path = public_path('imglib/' . $folder_name . '/' . $filename);

                list($originalWidth, $originalHeight) = getimagesize($imageFile->getRealPath());
                $ratio = $originalWidth / $originalHeight;
                $targetWidth = $targetHeight = min($size, max($originalWidth, $originalHeight));

                if ($ratio < 1) {
                    $targetWidth = $targetHeight * $ratio;
                } else {
                    $targetHeight = $targetWidth / $ratio;
                }

                $background = Image::canvas($targetWidth, $targetHeight);
                $img = Image::make($imageFile->getRealPath());
                $img->resize($targetWidth, $targetHeight, function($constraint) {
                    $constraint->aspectRatio();
                });
                $background->insert($img, 'center');

                $background->save($path);
                $values['langs'][$language->id][$field->shortname] = $filename;
              }
            }
          }
        }
        // [END] MIDDLEWARE IMAGE

        if($field->type->input_controller == 'link_group') {
          if(isset($values['langs'][$language->id][$field->shortname]) and is_array($values['langs'][$language->id][$field->shortname])) {
            $tmp_val = '';
            foreach($values['langs'][$language->id][$field->shortname] as $tmp_k=>$tmp_item) {
              $tmp_val .= $tmp_item;
              if(++$tmp_k < count($values['langs'][$language->id][$field->shortname])) {
                $tmp_val .= ',';
              }
            }
            $values['langs'][$language->id][$field->shortname] = $tmp_val;
            unset($tmp_val);
          }
        }

        if(isset($values['langs'][$language->id][$field->shortname])) {
          $value = $values['langs'][$language->id][$field->shortname];
        }
        else {
          $value = NULL;
        }
        if(!$value and $field->ignore_language) $value = $values['langs'][$def_lang][$field->shortname];
        if($dataEx) {
          if($value) {
            $dataEx->{$field->shortname}  = $value;
          }
          else {
            if($field->type->input_controller != 'image') {
              $dataEx->{$field->shortname}  = $value;
            }
            elseif(isset($values['langs'][$language->id][$field->shortname.'_remove']) and $values['langs'][$language->id][$field->shortname.'_remove']) {
              $dataEx->{$field->shortname}  = $value;
            }
          }
        }
        else {
          if($value) {
            $data->{$field->shortname}  = $value;
          }
          else {
            if($field->type->input_controller != 'image') {
              $data->{$field->shortname}  = $value;
            }
            elseif(isset($values['langs'][$language->id][$field->shortname.'_remove']) and $values['langs'][$language->id][$field->shortname.'_remove']) {
              $data->{$field->shortname}  = $value;
            }
          }
        }
      }
      if($dataEx) $dataEx->save();
      else {

        $data->node_id = $node->id;
        if($parent_id) $data->parent_id = $parent_id;
        $data->orderby = $last_order ? ($last_order->orderby) + 1 : 1;
        $data->language_id = $language->id;
        $data->save();
      }
    }

    Session::flash('success', 'saved');
    Session::flash('active_group', $values['active_group_id']);
    Session::flash('active_lang', $values['active_lang_id']);

    switch ($values['do_after']) {
      case 'stay':
        return redirect()->route('admin.nodes.edit', $values['node_id']);
        break;

      case 'go_up':
        if($node->parent_id)
          return redirect()->route('admin.nodes.edit', $node->parent_id);
        else
          return redirect()->route('admin.nodes.edit', $values['node_id']);
        break;

      default:
        return redirect()->route('admin.nodes.edit', $values['node_id']);
        break;
    }

  }


  public function store() {


    // dd(Request::all());
    // exit();
    $Languages    = new Languages;
    $def_lang = $Languages->getDefault()->id;

    $lastNode = Nodes::orderBy('id', 'desc')->first();
    $nameField = isset(Request::input('langs')[$def_lang]['name']) ? Request::input('langs')[$def_lang]['name'] : '';

    (!empty($nameField))
      ? $shortname = str_slug($nameField)
      : $shortname = $lastNode->id + 1;


    $nodes = new Nodes;
    $absolute_path = $nodes->generateAbsulutePath(Request::input('parent_id'), $shortname);

    if(Nodes::where('absolute_path', $absolute_path)->count()) {
      $absolute_path .= time();
    }

    $newNode = Nodes::create([
      'parent_id' => Request::input('parent_id'),
      'class_id' => Request::input('class_id'),
      'shortname' => $shortname,
      'absolute_path' => $absolute_path,
    ]);

    $values = Request::all();
    //$values['node_id'] = $newNode->id;

    $this->update($values, $newNode->id, Request::input('parent_id'), true);



    // dd(Request::input('go_up'));
    switch (Request::input('do_after')) {
      case 'stay':
        return redirect()->route('admin.nodes.edit', $newNode->id);
        break;

      case 'go_up':
        if($newNode->parent_id)
          return redirect()->route('admin.nodes.edit', $newNode->parent_id);
        else
          return redirect()->route('admin.nodes.edit', $newNode->id);
        break;

      case 'create':
        return redirect()->route('admin.nodes.create', [$newNode->class_id, $newNode->parent_id]);
        break;

      default:
        return redirect()->route('admin.nodes.edit', $newNode->id);
        break;
    }

  }


  public function dependencies($id, Node_dependencies $dependencies, Classes $classes) {
    $node = Nodes::find($id) or abort(404);

    $submitted = $dependencies->with('classes')->where('node_id', $node->id)->get();
    $available = $classes->whereNotIn('id', $submitted->pluck('subclass_id'))->orderBy('id', 'desc')->get();

    return view('admin.nodes.dependencies')
            ->withNode($node)
            ->withSubmitted($submitted)
            ->withAvailable($available);
  }

  public function dependencies_add($node_id, $add_id, Node_dependencies $dependencies, Validator $validator) {
    if($v = $validator::make(['node_id'=>$node_id, 'add_id'=>$add_id], $this->dependenciesAddRules($add_id)) and $v->fails()) {
      return \Redirect::route('admin.nodes.dependencies', $node_id)->withErrors($v->fails()); // errors exists
    }

    $dependencies->node_id      = $node_id;
    $dependencies->subclass_id  = $add_id;
    $dependencies->save();
    return \Redirect::route('admin.nodes.dependencies', $node_id);
  }

  public function dependencies_remove($node_id, $remove_id, Node_dependencies $dependencies, Validator $validator) {
    if($v = $validator::make(['node_id'=>$node_id, 'remove_id'=>$remove_id], $this->dependenciesRemoveRules) and $v->fails()) {
      return \Redirect::route('admin.nodes.dependencies', $node_id); // errors exists
    }

    $dependencies->where('node_id', $node_id)->where('subclass_id', $remove_id)->delete();
    return \Redirect::route('admin.nodes.dependencies', $node_id);
  }


  public function settings($id) {
    $node = Nodes::find($id) or abort(404);

    return view('admin.nodes.settings')
            ->withNode($node);
  }

  public function settings_update() {
    $node = Nodes::find(Request::input('node_id')) or abort(404);

    if(Request::input('shortname')) {
      $node->shortname = Request::input('shortname');

      // переписування absolute_path
      $node->absolute_path = $node->generateAbsulutePath($node->parent_id, $node->shortname);
    }

    $node->controller = Request::input('controller');
    $node->can_export_children = Request::input('can_export_children');
    $node->save();

    return \Redirect::route('admin.nodes.settings', $node->id);
  }



  public function destroy($id, Classes $classes) {
    $node = Nodes::find($id);
    $class = $classes->find($node->class_id);
    $data = new Data;

    $data->init($classes->prefix.$class->shortname, []);
    $data->where('node_id', $id)->delete();
    $node->delete();

    # записуємо в журнал
    Event::create([
      'user_id' => Auth::user()->id,
      'event_type_id' => 3,
      'node_id' => $node->id,
    ]);

    return \Redirect::route('admin.nodes.edit', $node->parent_id);
  }

  public function export() {
    //header('Content-Type: text/html; charset=utf-8');
    $class_to_export = Classes::find(Request::input('class_id'));
    $parent_node = Nodes::where('parent_id', Request::input('parent_id'));
    $fields = Fields::where('class_id', Request::input('class_id'))->get();
    if(Request::input('limit') and Request::input('limit') > 0) {
      $parent_node = $parent_node->paginate(Request::input('limit'));
    }
    else {
      $parent_node = $parent_node->get();
    }

    if($parent_node)
    {
      $ids = false;
      foreach($parent_node as $item) {
        $ids[] = $item->id;
      }
    }
    $data = new Data;
    $data->init($class_to_export->prefix.$class_to_export->shortname, []);

    $records = $data->where('language_id', Request::input('language_id'))->whereIn('node_id', $ids)->get();
    $d = false;

    foreach($fields as $k=>$field) {
      foreach(Request::input('fields') as $f) {
        if($field->shortname == $f) {
          $d[0][] = $field->name;
        }
      }
    }


    if($records) {
      foreach($records as $k=>$record) {
        ++$k;
        foreach(Request::input('fields') as $f) {
          $d[$k][] = $record->{$f};
        }
      }
    }



    Excel::create($class_to_export->name_more.'_'.date('Y_m_d_H_i_s'), function($excel) use($d) {
      $excel->sheet('Sheetname', function($sheet) use($d) {
          $sheet->fromArray($d, null, 'A1', false, false);
      });
    })->download(Request::input('type'));

  }


  public function sort_up($id, $class_id, $parent_id) {
    $languages = Languages::all();
    $languages_count = count($languages);

    $nodeData = Node::getUniversal(false, $class_id)->where('node_id', $id)->where('parent_id', $parent_id)->skip(0)->take($languages_count)->get();
    // dd($nodeData);
    $nodeDataReplaced = Node::getUniversal(false, $class_id)->where('parent_id', $parent_id)->where('orderby', '<', $nodeData[0]->orderby)->orderBy('orderby', 'desc')->skip(0)->take($languages_count)->get();
    // dd($nodeDataReplaced);

    $old_sort = $nodeData[0]->orderby;

    Node::getUniversal(false, $class_id)->where('node_id', $id)
      ->update(['orderby'=>$nodeDataReplaced[0]->orderby]);

    Node::getUniversal(false, $class_id)->where('node_id', $nodeDataReplaced[0]->node_id)
      ->update(['orderby'=>$old_sort]);

    return redirect()->back();
  }

  public function sort_down($id, $class_id, $parent_id) {
    $languages = Languages::all();
    $languages_count = count($languages);

    $nodeData = Node::getUniversal(false, $class_id)->where('node_id', $id)->where('parent_id', $parent_id)->skip(0)->take($languages_count)->get();
    // dd($nodeData);
    $nodeDataReplaced = Node::getUniversal(false, $class_id)->where('parent_id', $parent_id)->where('orderby', '>', $nodeData[0]->orderby)->orderBy('orderby', 'asc')->skip(0)->take($languages_count)->get();
    // dd($nodeDataReplaced);

    $old_sort = $nodeData[0]->orderby;

    Node::getUniversal(false, $class_id)->where('node_id', $id)
      ->update(['orderby'=>$nodeDataReplaced[0]->orderby]);

    Node::getUniversal(false, $class_id)->where('node_id', $nodeDataReplaced[0]->node_id)
      ->update(['orderby'=>$old_sort]);

    return redirect()->back();
  }

  public function getAutocompleteResults() {
    $linked_class = \Input::get('linked_class');
    $parent_id = \Input::get('parent_id');
    $results = false;
    $s = \Input::get('q')['term'];

    $nodes = Node::getU($linked_class);

    if($s and strlen($s) > 3) {
      $nodes->where('name', 'like', $s.'%');
    }

    if($parent_id) {
      $nodes = $nodes->where('parent_id', $parent_id);
    }

    $nodes = $nodes->take(10)->orderBy('node_id', 'desc')->get();

    if(count($nodes)) {
      foreach($nodes as $node) {
        $results[] = [
          'id' => $node->node_id,
          'text' => $node->name,
        ];
      }
    }




    return response()->json([
      'results' => $results
    ]);
  }


































}
