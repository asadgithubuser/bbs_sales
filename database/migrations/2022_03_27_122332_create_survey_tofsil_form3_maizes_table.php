<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurveyTofsilForm3MaizesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survey_tofsil_form3_maizes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('survey_process_list_id')->nullable();
            $table->bigInteger('survey_notification_id')->nullable();
            $table->bigInteger('division_id')->nullable();
            $table->bigInteger('district_id')->nullable();
            $table->bigInteger('upazila_id')->nullable();
            $table->bigInteger('union_id')->nullable();
            $table->bigInteger('mouza_id')->nullable();
            $table->bigInteger('crop_id')->nullable();
            $table->integer('season')->nullable()->comment('1 = রবি, 2 = খরিপ');
            $table->double('last_year_land_amount', 15, 8)->nullable();
            $table->double('last_year_land_producttion', 15, 8)->nullable();
            $table->double('current_year_land_amount', 15, 8)->nullable();
            $table->double('current_year_land_producttion', 15, 8)->nullable();
            $table->double('acre_reflection_rate', 15, 8)->nullable();
            $table->double('last_acre_reflection_rate', 15, 8)->nullable();
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
        Schema::dropIfExists('survey_tofsil_form3_maizes');
    }
}
