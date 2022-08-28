<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurveyTofsilForm10ProductionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survey_tofsil_form10_productions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('survey_process_list_id')->nullable();
            $table->bigInteger('survey_tofsil_form10_id')->nullable();
            $table->integer('crop_id')->nullable();
            $table->integer('area_type')->nullable();
            $table->double('previous_land_amound')->nullable();
            $table->double('previous_yield')->nullable();
            $table->double('previous_total_production')->nullable();
            $table->double('current_land_amound')->nullable();
            $table->double('current_yield')->nullable();
            $table->double('current_total_production')->nullable();
            $table->string('note')->nullable();

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
        Schema::dropIfExists('survey_tofsil_form10_productions');
    }
}
