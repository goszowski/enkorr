<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;
use App\Runsite\Nodes;
use App\Runsite\Data;

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
      $data->language_id = 1;
      $data->name = 'Назва сайту - головна сторінка';
      $data->title = 'The title';
      $data->keywords = 'The keywords';
      $data->description = 'The description';

      $data->save();

    }
}
