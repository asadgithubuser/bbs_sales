<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurveyTofsilForm10sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survey_tofsil_form10s', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('survey_process_list_id')->nullable();
            $table->bigInteger('survey_notification_id')->nullable();
            $table->bigInteger('division_id')->nullable();
            $table->bigInteger('district_id')->nullable();
            $table->bigInteger('upazila_id')->nullable();
            $table->bigInteger('union_id')->nullable();
            $table->bigInteger('crops_id')->nullable();
            $table->integer('crop_varieties')->nullable()->comment('1=Desi, 2=Upashi');
            $table->date('collection_start_date')->nullable();
            $table->date('collection_end_date')->nullable();
            $table->double('temporary_crop_land_amound')->nullable();
            $table->integer('previous_year_land_amound_desi')->nullable();
            $table->integer('previous_year_land_amound_upashi')->nullable();
            $table->integer('current_year_land_amound_desi')->nullable();
            $table->integer('current_year_land_amound_upashi')->nullable();
            $table->integer('note_desi')->nullable();
            $table->integer('note_upashi')->nullable();
            $table->boolean('status')->nullable()->default(0);
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
        Schema::dropIfExists('survey_tofsil_form10s');
    }
}
