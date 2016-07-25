<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Runsite\Classes;
use App\Runsite\Libraries\Node;

class OrderbyOperations extends Migration
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
               if($column == 'orderby') {
                 $column_exists = true;
               }
             }
           }
           if(! $column_exists) {
             Schema::table($tablename, function($table)
             {
               $table->integer('orderby');
             });
             $records = Node::getUniversal($class->shortname)->get();
             if(count($records)) {
               foreach($records as $k=>$record) {
                 DB::table($tablename)
                      ->where('node_id', $record->node_id)
                      ->update(['orderby' => ++$k]);
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
               if($column == 'orderby') {
                 $column_exists = true;
               }
             }
           }
           if($column_exists) {
             Schema::table($tablename, function($table)
             {
               $table->dropColumn('orderby');
             });
           }
         }
       }
     }
}
