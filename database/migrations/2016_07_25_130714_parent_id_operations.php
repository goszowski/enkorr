<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Runsite\Classes;
use App\Runsite\Libraries\Node;

class ParentIdOperations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
      {
          $classes = Classes::all();
          if(count($classes)) {
            foreach($classes as $class) {
              $tablename = '_class_' . $class->shortname;
              $columns = Schema::getColumnListing($tablename);
              $column_exists = false;
              if($columns) {
                foreach($columns as $column) {
                  if($column == 'parent_id') {
                    $column_exists = true;
                  }
                }
              }
              if(! $column_exists) {
                Schema::table($tablename, function($table)
                {
                  $table->integer('parent_id');
                });
                $records = Node::getUniversal($class->shortname)->get();
                if(count($records)) {
                  foreach($records as $record) {
                    DB::table($tablename)
                         ->where('node_id', $record->node_id)
                         ->update(['parent_id' => $record->node->parent_id]);
                  }
                }
              }
            }
          }
      }

      /**
       * Reverse the migrations.
       *
       * @return void
       */
      public function down()
      {
        $classes = Classes::all();
        if(count($classes)) {
          foreach($classes as $class) {
            $tablename = '_class_' . $class->shortname;
            $columns = Schema::getColumnListing($tablename);
            $column_exists = false;
            if($columns) {
              foreach($columns as $column) {
                if($column == 'parent_id') {
                  $column_exists = true;
                }
              }
            }
            if($column_exists) {
              Schema::table($tablename, function($table)
              {
                $table->dropColumn('parent_id');
              });
            }
          }
        }
      }
}
