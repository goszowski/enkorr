<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;
use App\Runsite\Classes;
use App\Runsite\Field_groups;
use App\Runsite\Fields;
use App\Runsite\Field_settings_default;
use App\Runsite\Field_settings;

class ClassesSeeder extends Seeder
{

    private $groups = [];

    private $structure = [

      // INDEX CLass
      0 => [
        'name'                      => 'Index'                  ,
        'name_more'                 => 'Index'                  ,
        'name_create'               => 'Index'                  ,
        'shortname'                 => 'index'                  ,
        'default_controller'        => 'HomeController@index'   ,
        'nodename_label'            => 'Website name'           ,
        'access_edit_name'          => true                     ,
        'access_edit_shortname'     => false                    ,
        'limited_users_can_create'  => false                    ,
        'limited_users_can_delete'  => false                    ,
        'show_in_admin_tree'        => true                     ,
        'cache'                     => true                     ,

        'groups' => [
          0 => [
            'name' => 'SEO',
          ],
        ],

        'fields' => [
          0 => [
            'type_id'              => 1                        ,
            'group_id'             => NULL                     ,
            'name'                 => 'Назва сайту'            ,
            'shortname'            => 'name'                   ,
            'required'             => true                     ,
            'shown'                => true                     ,
            'ignore_language'      => false                    ,
          ],

          1 => [
            'type_id'              => 7                        ,
            'group_id'             => NULL                     ,
            'name'                 => 'Активно'                ,
            'shortname'            => 'is_active'              ,
            'required'             => false                    ,
            'shown'                => true                     ,
            'ignore_language'      => true                     ,
          ],

          2 => [
            'type_id'              => 1                        ,
            'group_id'             => 0                        ,
            'name'                 => 'SEO Title'              ,
            'shortname'            => 'title'                  ,
            'required'             => false                    ,
            'shown'                => false                    ,
            'ignore_language'      => false                    ,
          ],

          3 => [
            'type_id'              => 1                        ,
            'group_id'             => 0                        ,
            'name'                 => 'SEO Keywords'           ,
            'shortname'            => 'keywords'               ,
            'required'             => false                    ,
            'shown'                => false                    ,
            'ignore_language'      => false                    ,
          ],

          4 => [
            'type_id'              => 1                        ,
            'group_id'             => 0                        ,
            'name'                 => 'SEO Description'        ,
            'shortname'            => 'description'            ,
            'required'             => false                    ,
            'shown'                => false                    ,
            'ignore_language'      => false                    ,
          ],
        ]
      ],
      // END INDEX Class





      // Admin Section CLass
      1 => [
        'name'                      => 'Admin Section'          ,
        'name_more'                 => 'Admin sections'         ,
        'name_create'               => 'Admin Section'          ,
        'shortname'                 => 'admin_section'          ,
        'default_controller'        => ''                       ,
        'nodename_label'            => 'Назва розділу'          ,
        'access_edit_name'          => true                     ,
        'access_edit_shortname'     => false                    ,
        'limited_users_can_create'  => false                    ,
        'limited_users_can_delete'  => false                    ,
        'show_in_admin_tree'        => true                     ,
        'cache'                     => true                     ,

        'groups' => false,

        'fields' => [
          0 => [
            'type_id'              => 1                        ,
            'group_id'             => NULL                     ,
            'name'                 => 'Назва розділу'          ,
            'shortname'            => 'name'                   ,
            'required'             => true                     ,
            'shown'                => true                     ,
            'ignore_language'      => true                     ,
          ],

        ]
      ],
      // END Admin Section Class





      // Section CLass
      2 => [
        'name'                      => 'Розділ'                 ,
        'name_more'                 => 'Розділи'                ,
        'name_create'               => 'Розділ'                 ,
        'shortname'                 => 'section'                ,
        'default_controller'        => 'SectionController@index',
        'nodename_label'            => 'Назва розділу'          ,
        'access_edit_name'          => true                     ,
        'access_edit_shortname'     => false                    ,
        'limited_users_can_create'  => true                     ,
        'limited_users_can_delete'  => true                     ,
        'show_in_admin_tree'        => true                     ,
        'cache'                     => true                     ,

        'groups' => [
          0 => [
            'name' => 'SEO',
          ],
        ],

        'fields' => [
          0 => [
            'type_id'              => 1                        ,
            'group_id'             => NULL                     ,
            'name'                 => 'Назва розділу'          ,
            'shortname'            => 'name'                   ,
            'required'             => true                     ,
            'shown'                => true                     ,
            'ignore_language'      => false                    ,
          ],

          1 => [
            'type_id'              => 7                        ,
            'group_id'             => NULL                     ,
            'name'                 => 'Активно'                ,
            'shortname'            => 'is_active'              ,
            'required'             => false                    ,
            'shown'                => true                     ,
            'ignore_language'      => true                     ,
          ],

          2 => [
            'type_id'              => 1                        ,
            'group_id'             => 0                        ,
            'name'                 => 'SEO Title'              ,
            'shortname'            => 'title'                  ,
            'required'             => false                    ,
            'shown'                => false                    ,
            'ignore_language'      => false                    ,
          ],

          3 => [
            'type_id'              => 1                        ,
            'group_id'             => 0                        ,
            'name'                 => 'SEO Keywords'           ,
            'shortname'            => 'keywords'               ,
            'required'             => false                    ,
            'shown'                => false                    ,
            'ignore_language'      => false                    ,
          ],

          4 => [
            'type_id'              => 1                        ,
            'group_id'             => 0                        ,
            'name'                 => 'SEO Description'        ,
            'shortname'            => 'description'            ,
            'required'             => false                    ,
            'shown'                => false                    ,
            'ignore_language'      => false                    ,
          ],
        ]
      ],
      // END Section Class


      // Page CLass
      3 => [
        'name'                      => 'Сторінка'               ,
        'name_more'                 => 'Сторінки'               ,
        'name_create'               => 'Сторінку'               ,
        'shortname'                 => 'page'                   ,
        'default_controller'        => 'PageController@index'   ,
        'nodename_label'            => 'Назва сторінки'         ,
        'access_edit_name'          => true                     ,
        'access_edit_shortname'     => false                    ,
        'limited_users_can_create'  => true                     ,
        'limited_users_can_delete'  => true                     ,
        'show_in_admin_tree'        => true                     ,
        'cache'                     => true                     ,

        'groups' => [
          0 => [
            'name' => 'SEO',
          ],
          1 => [
            'name' => 'Текст',
          ],
        ],

        'fields' => [
          0 => [
            'type_id'              => 1                        ,
            'group_id'             => NULL                     ,
            'name'                 => 'Назва сторінки'         ,
            'shortname'            => 'name'                   ,
            'required'             => true                     ,
            'shown'                => true                     ,
            'ignore_language'      => false                    ,
          ],

          1 => [
            'type_id'              => 7                        ,
            'group_id'             => NULL                     ,
            'name'                 => 'Активно'                ,
            'shortname'            => 'is_active'              ,
            'required'             => false                    ,
            'shown'                => true                     ,
            'ignore_language'      => true                     ,
          ],

          2 => [
            'type_id'              => 1                        ,
            'group_id'             => 0                        ,
            'name'                 => 'SEO Title'              ,
            'shortname'            => 'title'                  ,
            'required'             => false                    ,
            'shown'                => false                    ,
            'ignore_language'      => false                    ,
          ],

          3 => [
            'type_id'              => 1                        ,
            'group_id'             => 0                        ,
            'name'                 => 'SEO Keywords'           ,
            'shortname'            => 'keywords'               ,
            'required'             => false                    ,
            'shown'                => false                    ,
            'ignore_language'      => false                    ,
          ],

          4 => [
            'type_id'              => 1                        ,
            'group_id'             => 0                        ,
            'name'                 => 'SEO Description'        ,
            'shortname'            => 'description'            ,
            'required'             => false                    ,
            'shown'                => false                    ,
            'ignore_language'      => false                    ,
          ],

          4 => [
            'type_id'              => 4                        ,
            'group_id'             => 1                        ,
            'name'                 => 'Текст'                  ,
            'shortname'            => 'content'                ,
            'required'             => false                    ,
            'shown'                => false                    ,
            'ignore_language'      => false                    ,
          ],
        ]
      ],
      // END Section Class



      // Admin Section CLass
      4 => [
        'name'                      => 'Елемент меню'           ,
        'name_more'                 => 'Елементи меню'          ,
        'name_create'               => 'Елемент меню'           ,
        'shortname'                 => 'menu_item'              ,
        'default_controller'        => ''                       ,
        'nodename_label'            => 'Назва'                  ,
        'access_edit_name'          => true                     ,
        'access_edit_shortname'     => false                    ,
        'limited_users_can_create'  => true                     ,
        'limited_users_can_delete'  => true                     ,
        'show_in_admin_tree'        => true                     ,
        'cache'                     => true                     ,

        'groups' => false,

        'fields' => [
          0 => [
            'type_id'              => 1                        ,
            'group_id'             => NULL                     ,
            'name'                 => 'Назва'                  ,
            'shortname'            => 'name'                   ,
            'required'             => true                     ,
            'shown'                => true                     ,
            'ignore_language'      => false                    ,
          ],

          1 => [
            'type_id'              => 1                        ,
            'group_id'             => NULL                     ,
            'name'                 => 'Посилання'              ,
            'shortname'            => 'link'                   ,
            'required'             => false                    ,
            'shown'                => false                    ,
            'ignore_language'      => false                    ,
          ],

        ]
      ],
      // END Admin Section Class



    ];

    // public function createClass($name, $shortname, $default_controller, $nodename_label, $access_edit_name, $access_edit_shortname, $limited_users_can_create, $limited_users_can_delete, $show_in_admin_tree, $cache) {
    //   return Classes::create([
    //     'name'                      => 'Index'                  ,
    //     'shortname'                 => 'index'                  ,
    //     'default_controller'        => 'HomeController@index'   ,
    //     'nodename_label'            => 'Website name'           ,
    //     'access_edit_name'          => true                     ,
    //     'access_edit_shortname'     => false                    ,
    //     'limited_users_can_create'  => false                    ,
    //     'limited_users_can_delete'  => false                    ,
    //     'show_in_admin_tree'        => true                     ,
    //     'cache'                     => true                     ,
    //   ]);
    // }
    //
    // public function createField($type_id, $class_id, ) {
    //   return Fields::create([
    //     'type_id' => 1,
    //     'class_id' => $class->id,
    //     'group_id' => 0,
    //     'name' => 'Name',
    //     'shortname' => 'name',
    //     'required' => true,
    //     'shown' => true,
    //     'sort' => 1,
    //     'ignore_language' => false,
    //   ]);
    // }


    public function run()
    {

      foreach($this->structure as $class) {

        // Створення класу
        $newClass = Classes::create([
            'name'                      => $class['name']                       ,
            'name_more'                 => $class['name_more']                  ,
            'name_create'               => $class['name_create']                ,
            'shortname'                 => $class['shortname']                  ,
            'default_controller'        => $class['default_controller']         ,
            'nodename_label'            => $class['nodename_label']             ,
            'access_edit_name'          => $class['access_edit_name']           ,
            'access_edit_shortname'     => $class['access_edit_shortname']      ,
            'limited_users_can_create'  => $class['limited_users_can_create']   ,
            'limited_users_can_delete'  => $class['limited_users_can_delete']   ,
            'show_in_admin_tree'        => $class['show_in_admin_tree']         ,
            'cache'                     => $class['cache']                      ,
          ]);

        // Створення груп
        if(isset($class['groups']) and $class['groups'] !== false and count($class['groups'])) {
          foreach($class['groups'] as $gkey => $group) {
            $this->groups[$gkey] = Field_groups::create([
              'class_id' => $newClass->id   ,
              'name'     => $group['name']  ,
            ]);
          }
        }

        // Створення філдів
        if(isset($class['fields']) and $class['fields'] !== false and count($class['fields'])) {
          foreach($class['fields'] as $fkey => $field) {
            $newField = Fields::create([
              'type_id' => $field['type_id'],
              'class_id' => $newClass->id,
              'group_id' => ($field['group_id'] !== NULL) ? $this->groups[$field['group_id']]->id : 0,
              'name' => $field['name'],
              'shortname' => $field['shortname'],
              'required' => $field['required'],
              'shown' => $field['shown'],
              'sort' => (++$fkey),
              'ignore_language' => $field['ignore_language'],
            ]);

            // Створення дефолтових налаштувань
            $field_settings_default = new Field_settings_default;
            $field_settings = new Field_settings;
            $default_settings = $field_settings_default->prepare($newField->type_id);
            $field_settings->store($default_settings, $newField->id, $newClass->id);
          }
        }

        $class_fields = $class['fields'];

        \Schema::dropIfExists('_class_'.$newClass->shortname);
        \Schema::create('_class_'.$newClass->shortname, function(Blueprint $table) use($class_fields)
        {

            if(isset($class_fields) and count($class_fields)) {

              $table->increments('id');
              $table->integer('node_id');
              $table->integer('parent_id');
              $table->integer('orderby');
              $table->integer('language_id');

              foreach($class_fields as $fkey => $field) {
                $field_settings_default = new Field_settings_default;
                $field_settings = new Field_settings;
                $default_settings = $field_settings_default->prepare($field['type_id']);
                if($default_settings) {
                  $table->{$default_settings['db_field_type']['_value']}("{$field['shortname']}");
                }
              }

              $table->dateTime('created_at');
              $table->dateTime('updated_at');
            }


        });
      }







      // # ======================================================================
      // # Створення класу індексу
      // $classIndex = $this->createClass('Index', 'index', 'HomeController@index', 'Назва сайту', true, false, false, false, true, true);
      // # Створення SEO групи індексу
      // $classIndexSeoGroup = Field_groups::create(['class_id' => $classIndex->id,'name' => 'SEO']);
      // # Створення філдів індексу
      // $sortInc = 1;
      //
      // $classIndexFields[] = $this->createField([1, $classIndex->id, 0, 'Назва', 'name', true, true, $sortInc, false]);
      // $sortInc++;
      //
      // $classIndexFields[] = $this->createField([1, $classIndex->id, 0, 'Активно', 'isactive', false, true, $sortInc, true]);
      // $sortInc++;
      //
      //
      //
      //
      // $class_fields = Fields::create([
      //   'type_id' => 1,
      //   'class_id' => $class->id,
      //   'group_id' => 0,
      //   'name' => 'Name',
      //   'shortname' => 'name',
      //   'required' => true,
      //   'shown' => true,
      //   'sort' => 1,
      //   'ignore_language' => false,
      // ]);
      //
      // $class_fields = Fields::create([
      //   'type_id' => 7,
      //   'class_id' => $class->id,
      //   'group_id' => 0,
      //   'name' => 'Активно',
      //   'shortname' => 'isactive',
      //   'required' => false,
      //   'shown' => true,
      //   'sort' => 2,
      //   'ignore_language' => true,
      // ]);
      //
      // $field_settings_default = new Field_settings_default;
      // $field_settings = new Field_settings;
      // $default_settings = $field_settings_default->prepare(1);
      // $field_settings->store($default_settings, $class_fields->id, $class->id);
      //
      //
      //
      // $class_fields = Fields::create([
      //   'type_id' => 1,
      //   'class_id' => $class->id,
      //   'group_id' => $SEO_group->id,
      //   'name' => 'SEO Title',
      //   'shortname' => 'title',
      //   'required' => false,
      //   'shown' => false,
      //   'sort' => 3,
      //   'ignore_language' => false,
      // ]);
      //
      // $field_settings_default = new Field_settings_default;
      // $field_settings = new Field_settings;
      // $default_settings = $field_settings_default->prepare(1);
      // $field_settings->store($default_settings, $class_fields->id, $class->id);
      //
      //
      //
      // $class_fields = Fields::create([
      //   'type_id' => 1,
      //   'class_id' => $class->id,
      //   'group_id' => $SEO_group->id,
      //   'name' => 'SEO Keywords',
      //   'shortname' => 'keywords',
      //   'required' => false,
      //   'shown' => false,
      //   'sort' => 4,
      //   'ignore_language' => false,
      // ]);
      //
      // $field_settings_default = new Field_settings_default;
      // $field_settings = new Field_settings;
      // $default_settings = $field_settings_default->prepare(1);
      // $field_settings->store($default_settings, $class_fields->id, $class->id);
      //
      //
      //
      //
      // $class_fields = Fields::create([
      //   'type_id' => 1,
      //   'class_id' => $class->id,
      //   'group_id' => $SEO_group->id,
      //   'name' => 'SEO Description',
      //   'shortname' => 'description',
      //   'required' => false,
      //   'shown' => false,
      //   'sort' => 5,
      //   'ignore_language' => false,
      // ]);
      //
      // $field_settings_default = new Field_settings_default;
      // $field_settings = new Field_settings;
      // $default_settings = $field_settings_default->prepare(1);
      // $field_settings->store($default_settings, $class_fields->id, $class->id);
      //
      //
      //
      //
      // \Schema::dropIfExists('_class_'.$class->shortname);
      // \Schema::create('_class_'.$class->shortname, function(Blueprint $table)
      // {
      //     $table->increments('id');
      //     $table->integer('node_id');
      //     $table->integer('language_id');
      //
      //     $table->string('name');
      //     $table->string('title');
      //     $table->string('keywords');
      //     $table->string('description');
      //
      //     $table->dateTime('created_at');
      //     $table->dateTime('updated_at');
      // });
      //
      //
      //
      //
      //
      //
      //
      //
      //
      //
      //
      //
      //
      //
      //
      //
      //
      //
      //
      //
      //
      //
      //
      //
      //
      //
      //
      //
      //
      //
      //
      //
      //
      //
      //
      // $class = Classes::create([
      //   'name'                      => 'Розділ'                 ,
      //   'name_more'                 => 'Розділи'                ,
      //   'shortname'                 => 'section'                  ,
      //   'default_controller'        => 'SectionController@show'   ,
      //   'nodename_label'            => 'Website name'           ,
      //   'access_edit_name'          => true                     ,
      //   'access_edit_shortname'     => false                    ,
      //   'limited_users_can_create'  => false                    ,
      //   'limited_users_can_delete'  => false                    ,
      //   'show_in_admin_tree'        => true                     ,
      //   'cache'                     => true                     ,
      // ]);
      //
      // $SEO_group = Field_groups::create([
      //   'class_id'                  => $class->id               ,
      //   'name'                      => 'SEO'                    ,
      // ]);
      //
      // $class_fields = Fields::create([
      //   'type_id' => 1,
      //   'class_id' => $class->id,
      //   'group_id' => 0,
      //   'name' => 'Назва розділу',
      //   'shortname' => 'name',
      //   'required' => true,
      //   'shown' => true,
      //   'sort' => 1,
      //   'ignore_language' => false,
      // ]);
      //
      // $field_settings_default = new Field_settings_default;
      // $field_settings = new Field_settings;
      // $default_settings = $field_settings_default->prepare(1);
      // $field_settings->store($default_settings, $class_fields->id, $class->id);
      //
      //
      //
      // $class_fields = Fields::create([
      //   'type_id' => 1,
      //   'class_id' => $class->id,
      //   'group_id' => $SEO_group->id,
      //   'name' => 'SEO Title',
      //   'shortname' => 'title',
      //   'required' => false,
      //   'shown' => false,
      //   'sort' => 2,
      //   'ignore_language' => false,
      // ]);
      //
      // $field_settings_default = new Field_settings_default;
      // $field_settings = new Field_settings;
      // $default_settings = $field_settings_default->prepare(1);
      // $field_settings->store($default_settings, $class_fields->id, $class->id);
      //
      //
      //
      // $class_fields = Fields::create([
      //   'type_id' => 1,
      //   'class_id' => $class->id,
      //   'group_id' => $SEO_group->id,
      //   'name' => 'SEO Keywords',
      //   'shortname' => 'keywords',
      //   'required' => false,
      //   'shown' => false,
      //   'sort' => 3,
      //   'ignore_language' => false,
      // ]);
      //
      // $field_settings_default = new Field_settings_default;
      // $field_settings = new Field_settings;
      // $default_settings = $field_settings_default->prepare(1);
      // $field_settings->store($default_settings, $class_fields->id, $class->id);
      //
      //
      //
      //
      // $class_fields = Fields::create([
      //   'type_id' => 1,
      //   'class_id' => $class->id,
      //   'group_id' => $SEO_group->id,
      //   'name' => 'SEO Description',
      //   'shortname' => 'description',
      //   'required' => false,
      //   'shown' => false,
      //   'sort' => 4,
      //   'ignore_language' => false,
      // ]);
      //
      // $field_settings_default = new Field_settings_default;
      // $field_settings = new Field_settings;
      // $default_settings = $field_settings_default->prepare(1);
      // $field_settings->store($default_settings, $class_fields->id, $class->id);
      //
      //
      //
      //
      // \Schema::dropIfExists('_class_'.$class->shortname);
      // \Schema::create('_class_'.$class->shortname, function(Blueprint $table)
      // {
      //     $table->increments('id');
      //     $table->integer('node_id');
      //     $table->integer('language_id');
      //
      //     $table->string('name');
      //     $table->string('title');
      //     $table->string('keywords');
      //     $table->string('description');
      //
      //     $table->dateTime('created_at');
      //     $table->dateTime('updated_at');
      // });







    }
}
