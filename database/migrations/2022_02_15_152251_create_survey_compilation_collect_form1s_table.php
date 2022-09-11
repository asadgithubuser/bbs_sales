<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurveyCompilationCollectForm1sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survey_compilation_collect_form1s', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('survey_process_list_id')->nullable();
            $table->bigInteger('division_id')->nullable();
            $table->bigInteger('district_id')->nullable();
            $table->bigInteger('upazila_id')->nullable();
            $table->bigInteger('union_id')->nullable();
            $table->bigInteger('mouja_id')->nullable();
            $table->tinyInteger('food_type')->nullable()->comment('1=Agriculture, 2=Non-Agricultural');
            $table->string('farmers_name')->nullable();
            $table->string('farmers_mobile')->nullable();
            $table->tinyInteger('farmers_class_division_type')->nullable()->comment('1=Small, 2=Medium, 3=Big');
            $table->float('land_amount')->nullable();
            $table->string('sample_farmer_no')->nullable();
            $table->integer('created_by')->nullable();
            $table->integer('modified_by')->nullable();
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
        Schema::dropIfExists('survey_compilation_collect_form1s');
    }
}
