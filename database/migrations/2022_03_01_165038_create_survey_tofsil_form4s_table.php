<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurveyTofsilForm4sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survey_tofsil_form4s', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('survey_process_list_id')->nullable();
            $table->bigInteger('survey_notification_id')->nullable();
            $table->bigInteger('division_id')->nullable();
            $table->bigInteger('district_id')->nullable();
            $table->bigInteger('upazila_id')->nullable();
            $table->bigInteger('union_id')->nullable();
            $table->bigInteger('mouza_id')->nullable();
            $table->bigInteger('farmer_id')->nullable();
            $table->string('farmers_name')->nullable();
            $table->string('farmers_mobile')->nullable();
            $table->bigInteger('crops_id')->nullable();
            $table->integer('total_trees')->nullable();
            $table->integer('total_fruity_trees_in_garden')->nullable();
            $table->integer('total_fruity_scattered_trees')->nullable();
            $table->integer('total_fruity_trees')->nullable();
            $table->double('land_amount_under_the_fruitly_trees')->nullable();
            $table->double('last_land_amount_under_the_fruitly_trees')->nullable();
            $table->double('average_yield_per_tree')->nullable();
            $table->double('total_production')->nullable();
            $table->double('last_total_production')->nullable();
            $table->integer('total_fruitless_trees')->nullable();
            $table->double('land_amount_under_the_fruitless_trees')->nullable();
            $table->double('last_land_amount_under_the_fruitless_trees')->nullable();
            $table->double('total_land_amount_under_the_trees')->nullable();
            $table->boolean('status')->default(false);
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
        Schema::dropIfExists('survey_tofsil_form4s');
    }
}
