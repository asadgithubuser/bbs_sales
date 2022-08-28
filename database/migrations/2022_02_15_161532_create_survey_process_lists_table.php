<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurveyProcessListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survey_process_lists', function (Blueprint $table) {
            $table->id();
            $table->integer('survey_form_id')->nullable();
            $table->bigInteger('survey_notification_id')->nullable();
            $table->integer('division_id')->nullable();
            $table->integer('district_id')->nullable();
            $table->integer('upazila_id')->nullable();
            $table->integer('union_id')->nullable();
            $table->integer('bunch_stains_id')->nullable();
            $table->integer('mouja_id')->nullable();
            $table->string('year')->nullable();
            $table->integer('survey_by')->nullable();
            $table->integer('survery_user_designation_id')->nullable();
            $table->string('survey_user_forward_date')->nullable();
            $table->integer('survery_approved_by')->nullable();
            $table->integer('survey_approved_user_designation')->nullable();
            $table->bigInteger('created_by')->nullable();
            $table->string('survey_approved_date')->nullable();
            $table->integer('status')->nullable()->comment('1=Field, 2=Upazila, 3=District, 4=Division, 5=BBS Head Office, 6=The Final');
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
        Schema::dropIfExists('survey_process_lists');
    }
}
