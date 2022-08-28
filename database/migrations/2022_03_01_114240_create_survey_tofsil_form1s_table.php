<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurveyTofsilForm1sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survey_tofsil_form1s', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('survey_process_list_id')->nullable()->default(0);
            $table->bigInteger('survey_notification_id')->nullable()->default(0);
            $table->bigInteger('division_id')->default(0);
            $table->bigInteger('district_id')->default(0);
            $table->bigInteger('upazila_id')->default(0);
            $table->bigInteger('bunch_stains_id')->default(1);
            $table->bigInteger('survey_episode')->comment('episode(1,2,3,4)');
            $table->string('land_identification_no')->nullable();
            $table->string('farmers_name')->nullable();
            $table->string('farmers_father_name')->nullable();
            $table->string('farmers_mobile')->nullable();
            $table->tinyInteger('use_land_type')->comment('1=Harvesable, 2=Non-Harvestable')->default(1);
            $table->bigInteger('crops_id');
            $table->float('land_amount')->default(0);
            $table->tinyInteger('cultivated_method')->comment('1=mechanical, 2=non mechenical')->default(1);
            $table->tinyInteger('irrigation_system')->default(0);
            $table->tinyInteger('how_many_irrigation_time')->comment('1=one time, 2=two time, 3=three time')->default(1);
            $table->tinyInteger('how_many_cultivated_time_yearly')->comment('1=One Harvestable, 2=Two Harvestbale, 3= THree Harvestable')->default(1);
            $table->integer('created_by')->nullable()->default(0);
            $table->integer('modified_by')->nullable()->default(0);
            $table->boolean('status')->nullable()->default(0);
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
        Schema::dropIfExists('survey_tofsil_form1s');
    }
}
