<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurveyTofsilForm5AllFarmersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survey_tofsil_form5_all_farmers', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('survey_process_list_id')->nullable();
            $table->integer('survey_tofsil_form5_id')->nullable();
            $table->bigInteger('farmer_id')->nullable();
            $table->string('farmers_father_name')->nullable();
            $table->double('last_year_land_amount')->nullable();
            $table->double('last_year_potato_producttion')->nullable();
            $table->double('current_year_land_amount')->nullable();
            $table->double('current_year_potato_producttion')->nullable();
            $table->double('average_yield_per_acre')->nullable();
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
        Schema::dropIfExists('survey_tofsil_form5_all_farmers');
    }
}
