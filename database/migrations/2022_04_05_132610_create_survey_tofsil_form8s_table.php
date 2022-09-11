<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurveyTofsilForm8sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survey_tofsil_form8s', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('survey_process_list_id')->nullable();
            $table->bigInteger('survey_notification_id')->nullable();
            $table->bigInteger('division_id')->nullable();
            $table->bigInteger('district_id')->nullable();
            $table->bigInteger('upazila_id')->nullable();
            $table->bigInteger('cluster_id')->nullable();
            $table->string('month')->nullable();
            $table->string('year')->nullable();
            $table->integer('farmer_id')->nullable();
            $table->string('fathers_name')->nullable();
            $table->string('farmers_mobile')->nullable();
            $table->string('one_meal_male')->nullable();
            $table->string('one_meal_female')->nullable();
            $table->string('two_meal_male')->nullable();
            $table->string('two_meal_female')->nullable();
            $table->string('three_meal_male')->nullable();
            $table->string('three_meal_female')->nullable();
            $table->string('without_meal_male')->nullable();
            $table->string('without_meal_female')->nullable();
            $table->boolean('status')->default(0);
            $table->bigInteger('created_by')->nullable();
            $table->bigInteger('updated_by')->nullable();

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
        Schema::dropIfExists('survey_tofsil_form8s');
    }
}
