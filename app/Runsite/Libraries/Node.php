<?php

namespace App\Runsite\Libraries;
use App\Runsite\Classes;
use App\Runsite\Nodes;
use App\Runsite\Fields;
use App\Runsite\Data;
use App\Runsite\Languages;
use App\Runsite\Universal;
use App\Runsite\Libraries\PH;

class Node {

  public static function getUniversal($class_name=false, $class_id=false) {
    $universalModel = false;
    if(!$class_name and $class_id) {
      $class = Classes::find($class_id);
      $class_name = $class->shortname;
    }
    $universalModel = new Universal('_class_'.$class_name);
    return $universalModel;
  }

  public static function push($class_id, $parent_id, $shortname=NULL, $fields) {

    $nodesModel                   = new Nodes;
    $classesModel                 = new Classes;
    $fieldsModel                  = new Fields;
    $LanguagesModel               = new Languages;

    $defaultLanguageId            = $LanguagesModel->getDefaultId();

    /* store node */
    $nodesModel->parent_id        = $parent_id;
    $nodesModel->class_id         = $class_id;
    $nodesModel->subtree_order    = $nodesModel->where('class_id', $class_id)->count() + 1;
    $nodesModel->shortname        = $shortname ? $shortname : str_slug($fields[$defaultLanguageId]['name']);
    $nodesModel->absolute_path    = $nodesModel->generateAbsulutePath($parent_id, $nodesModel->shortname);

    $nodesCountWithAbsolutePath   = $nodesModel->where('absolute_path', $nodesModel->absolute_path)->count();
    if($nodesCountWithAbsolutePath) {
      $nodesModel->absolute_path  .= '-' . $nodesModel->count() . mt_rand(111, 999);
    }

    $nodesModel->save();
    /* [end] store node */

    /* store data */
    $currentClass                 = $classesModel->find($class_id);
    $currentClassFields           = $fieldsModel->where('class_id', $class_id)->get();

    $currentClassFillable         = [];
    foreach($currentClassFields as $f) { array_push($currentClassFillable, $f->shortname); }

    foreach($fields as $lang_id=>$field) {
      $dataObject                 = new Data;
      $dataObject->init($classesModel->prefix.$currentClass->shortname, $currentClassFillable);
      $dataObject->language_id    = $lang_id;
      $dataObject->node_id        = $nodesModel->id;

      $dataObject->parent_id = $parent_id;
      foreach($field as $field_name=>$value) {
        $dataObject->{$field_name} = $value;
      }

      $dataObject->save();
    }
    /* [end] store data */

    return;
  }

  public static function get($class_shortname, $node_id, $lang_id=false) {
    $classes = new Classes;
    $fields = new Fields;
    $currentClass = $classes->where('shortname', $class_shortname)->first();
    if(!$currentClass)
      return false;

    $currentClassFields           = $fields->where('class_id', $currentClass->id)->get();
    $currentClassFillable         = [];
    foreach($currentClassFields as $f) { array_push($currentClassFillable, $f->shortname); }

    $dataObject = new Data;
    $dataObject->init($classes->prefix.$currentClass->shortname, $currentClassFillable);

    $dataObject = $dataObject->where('node_id', $node_id);
    $dataObject = $dataObject->where('is_active', true);

    // Якщо мова вказана явно, то вибираємо по ній
    if($lang_id) {
      $dataObject->where('language_id', (int) $lang_id);
    }
    else {
      // Ящо ж мова явно не вказана то вибираємо по дефолтовій локалізації
      // $defaultLocale = Languages::where('is_default', true)->first();
      // $dataObject->where('language_id', (int) $defaultLocale->id);

      // EDIT: Якщо мова не вказана то вибираємо по активній локалізації.
      $activeLocale = Languages::where('locale', \LaravelLocalization::getCurrentLocale())->first();
      $dataObject = $dataObject->where('language_id', (int) $activeLocale->id);
    }

    $node = $dataObject->first();
    return $node;
  }

  public static function getList($class_shortname, $parent_id=false, $where_add=false, $order=false, $paginate=false, $lang_id=false) {
    $classes = new Classes;
    $fields = new Fields;
    $nodes = new Nodes;
    $currentClass = $classes->where('shortname', $class_shortname)->first();
    if(!$currentClass)
      return false;

    if($parent_id) {
      $nodes = $nodes->where('parent_id', $parent_id);
    }

    $nodes = $nodes->where('class_id', $currentClass->id);

    if($paginate) {
      $nodes = $nodes->paginate($paginate);
    }
    else {
      $nodes = $nodes->get();
    }

    $currentClassFields           = $fields->where('class_id', $currentClass->id)->get();
    $currentClassFillable         = [];
    foreach($currentClassFields as $f) { array_push($currentClassFillable, $f->shortname); }

    $dataObject = new Data;
    $dataObject->init($classes->prefix.$currentClass->shortname, $currentClassFillable);

    if($where_add) {
      foreach($where_add as $k=>$v) {
        if(is_array($v)) {
          $dataObject = $dataObject->where($k, $v[0], $v[1]);
        }
        else {
          $dataObject = $dataObject->where($k, $v);
        }

      }
    }

    $ids = [];
    foreach($nodes as $node) {
      array_push($ids, $node->id);
    }

    $dataObject = $dataObject->whereIn('node_id', $ids);

    // Якщо мова вказана явно, то вибираємо по ній
    if($lang_id) {
      $dataObject = $dataObject->where('language_id', (int) $lang_id);
    }
    else {
      // Ящо ж мова явно не вказана то вибираємо по дефолтовій локалізації
      // $defaultLocale = Languages::where('is_default', true)->first();
      // $dataObject = $dataObject->where('language_id', (int) $defaultLocale->id);

      // EDIT: Якщо мова не вказана то вибираємо по активній локалізації.
      $activeLocale = Languages::where('locale', \LaravelLocalization::getCurrentLocale())->first();
      $dataObject = $dataObject->where('language_id', (int) $activeLocale->id);
    }

    $dataObject = $dataObject->where('is_active', true);
    $dataObject = $dataObject->with('node');

    if($order) {
      $order = explode(' ', $order);
      $dataObject = $dataObject->orderBy($order[0], $order[1]);
    }

    if($paginate) {
      $data = $dataObject->paginate($paginate);
    }
    else {
      $data = $dataObject->get();
    }


    return $data;

  }

  public static function getU($class_name=false, $class_id=false) {
    $universalModel = false;
    if(!$class_name and $class_id) {
      $class = Classes::find($class_id);
      $class_name = $class->shortname;
    }
    $universalModel = new Universal('_class_'.$class_name);
    $universalModel = $universalModel->where('is_active', true)->where('language_id', PH::getActiveLocalId());
    return $universalModel;
  }



}
