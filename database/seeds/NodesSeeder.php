<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;
use App\Runsite\Nodes;
use App\Runsite\Data;
use App\Runsite\Node_dependencies;

class NodesSeeder extends Seeder
{

    public function run()
    {
      $node = Nodes::create([
        'parent_id'         => 0,
        'class_id'          => 1,
        'subtree_order'     => 1,
        'shortname'         => 'index',
        'absolute_path'     => '/',
        'controller'        => 'HomeController@index',
      ]);

      $data = new Data;
      $data->init('_class_index', [
        'node_id',
        'language_id',
        'name',
        'title',
        'keywords',
        'description',
      ]);

      $data->node_id = 1;
      $data->orderby = 1;
      $data->parent_id = 0;
      $data->language_id = 1;
      $data->name = 'Назва сайту - головна сторінка';
      $data->title = 'The title';
      $data->keywords = 'The keywords';
      $data->description = 'The description';
      $data->is_active = true;

      $data->save();


      Node_dependencies::create([
          'node_id' => $node->id,
          'subclass_id' => 2,
      ]);



      // ---



    //   $data = new Data;
    //   $data->init('_class_index', [
    //     'node_id',
    //     'language_id',
    //     'name',
    //     'title',
    //     'keywords',
    //     'description',
    //   ]);
      //
    //   $data->node_id = 1;
    //   $data->orderby = 1;
    //   $data->parent_id = 0;
    //   $data->language_id = 2;
    //   $data->name = 'Website name - main page';
    //   $data->title = 'The title';
    //   $data->keywords = 'The keywords';
    //   $data->description = 'The description';
    //   $data->is_active = true;
      //
    //   $data->save();




      //////////////////////////





      $node = Nodes::create([
        'parent_id'         => 1,
        'class_id'          => 2,
        'subtree_order'     => 1,
        'shortname'         => 'settings',
        'absolute_path'     => '/settings',
        'controller'        => '',
      ]);

      $data = new Data;
      $data->init('_class_admin_section', [
        'node_id',
        'language_id',
        'name',
        'is_active',
      ]);

      $data->node_id = $node->id;
      $data->orderby = 1;
      $data->parent_id = 1;
      $data->language_id = 1;
      $data->name = 'Налаштування';
      $data->is_active = true;

      $data->save();

      Node_dependencies::create([
          'node_id' => $node->id,
          'subclass_id' => 2,
      ]);



      //////////////////////////





      $node = Nodes::create([
        'parent_id'         => 2,
        'class_id'          => 2,
        'subtree_order'     => 1,
        'shortname'         => 'navigation',
        'absolute_path'     => '/settings/navigation',
        'controller'        => '',
      ]);

      $data = new Data;
      $data->init('_class_admin_section', [
        'node_id',
        'language_id',
        'name',
        'is_active',
      ]);

      $data->node_id = $node->id;
      $data->orderby = 1;
      $data->parent_id = 2;
      $data->language_id = 1;
      $data->name = 'Навігація';
      $data->is_active = true;

      $data->save();

      Node_dependencies::create([
          'node_id' => $node->id,
          'subclass_id' => 2,
      ]);




      /////////////////////////




      $node = Nodes::create([
        'parent_id'         => 3,
        'class_id'          => 2,
        'subtree_order'     => 1,
        'shortname'         => 'main-menu',
        'absolute_path'     => '/settings/navigation/main-menu',
        'controller'        => '',
      ]);

      $data = new Data;
      $data->init('_class_admin_section', [
        'node_id',
        'language_id',
        'name',
        'is_active',
      ]);

      $data->node_id = $node->id;
      $data->orderby = 1;
      $data->parent_id = 3;
      $data->language_id = 1;
      $data->name = 'Головне меню';
      $data->is_active = true;

      $data->save();

      Node_dependencies::create([
          'node_id' => $node->id,
          'subclass_id' => 5,
      ]);





      /////////////////////////




      $node = Nodes::create([
        'parent_id'         => 3,
        'class_id'          => 2,
        'subtree_order'     => 1,
        'shortname'         => 'social-menu',
        'absolute_path'     => '/settings/navigation/social-menu',
        'controller'        => '',
      ]);

      $data = new Data;
      $data->init('_class_admin_section', [
        'node_id',
        'language_id',
        'name',
        'is_active',
      ]);

      $data->node_id = $node->id;
      $data->orderby = 1;
      $data->parent_id = 3;
      $data->language_id = 1;
      $data->name = 'Соціальні мережі';
      $data->is_active = true;

      $data->save();

      Node_dependencies::create([
          'node_id' => $node->id,
          'subclass_id' => 5,
      ]);








        /////////////////////////




        $node = Nodes::create([
          'parent_id'         => 4,
          'class_id'          => 5,
          'subtree_order'     => 1,
          'shortname'         => 'main',
          'absolute_path'     => '/settings/navigation/main-menu/main',
          'controller'        => '',
        ]);

        $data = new Data;
        $data->init('_class_menu_item', [
          'node_id',
          'language_id',
          'name',
          'is_active',
          'link',
        ]);

        $data->node_id = $node->id;
        $data->orderby = 1;
        $data->parent_id = 4;
        $data->language_id = 1;
        $data->name = 'Головна';
        $data->is_active = true;
        $data->link = '/';

        $data->save();




        ///////////////////////




        $node = Nodes::create([
          'parent_id'         => 5,
          'class_id'          => 5,
          'subtree_order'     => 1,
          'shortname'         => 'facebook',
          'absolute_path'     => '/settings/navigation/social-menu/facebook',
          'controller'        => '',
        ]);

        $data = new Data;
        $data->init('_class_menu_item', [
          'node_id',
          'language_id',
          'name',
          'is_active',
          'link',
        ]);

        $data->node_id = $node->id;
        $data->orderby = 1;
        $data->parent_id = 5;
        $data->language_id = 1;
        $data->name = 'Facebook';
        $data->is_active = true;
        $data->link = 'https://facebook.com';

        $data->save();




        ////////////////////////




        $node = Nodes::create([
          'parent_id'         => 5,
          'class_id'          => 5,
          'subtree_order'     => 2,
          'shortname'         => 'twitter',
          'absolute_path'     => '/settings/navigation/social-menu/twitter',
          'controller'        => '',
        ]);

        $data = new Data;
        $data->init('_class_menu_item', [
          'node_id',
          'language_id',
          'name',
          'is_active',
          'link',
        ]);

        $data->node_id = $node->id;
        $data->orderby = 2;
        $data->parent_id = 5;
        $data->language_id = 1;
        $data->name = 'Twitter';
        $data->is_active = true;
        $data->link = 'https://twitter.com';

        $data->save();




        ////////////////////////




        $node = Nodes::create([
          'parent_id'         => 5,
          'class_id'          => 5,
          'subtree_order'     => 3,
          'shortname'         => 'google-plus',
          'absolute_path'     => '/settings/navigation/social-menu/google-plus',
          'controller'        => '',
        ]);

        $data = new Data;
        $data->init('_class_menu_item', [
          'node_id',
          'language_id',
          'name',
          'is_active',
          'link',
        ]);

        $data->node_id = $node->id;
        $data->orderby = 3;
        $data->parent_id = 5;
        $data->language_id = 1;
        $data->name = 'Google Plus';
        $data->is_active = true;
        $data->link = 'https://plus.google.com';

        $data->save();





    }
}
