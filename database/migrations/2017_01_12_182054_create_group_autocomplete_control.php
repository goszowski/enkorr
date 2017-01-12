<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\Runsite\Field_types;
use Carbon\Carbon;

class CreateGroupAutocompleteControl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      $fieldType = Field_types::where('input_controller', 'link_group')->first();
      $date = Carbon::now();

      DB::table('field_html_control_types')->insert([
          'type_id' => $fieldType->id,
          'type_variant' => 'autocomplite',
          'created_at' => $date,
          'updated_at' => $date,
      ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
