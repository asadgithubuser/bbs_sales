<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurveyTofsilForm2AllFarmersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survey_tofsil_form2_all_farmers', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('survey_process_list_id')->nullable();
            $table->bigInteger('survey_tofsil_form2_id')->nullable();
            $table->bigInteger('farmer_int_id')->nullable();
            $table->string('fathers_name')->nullable();
            $table->double('last_year_land_amount')->nullable();
            $table->double('last_year_land_producttion')->nullable();
            $table->double('current_year_land_amount')->nullable();
            $table->double('current_year_land_producttion')->nullable();
            $table->integer('comments')->nullable()->comment('1=Good, 2=Bad')->default(1);
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('survey_tofsil_form2_all_farmers');
    }
}
