<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurveyProcessForwardingLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survey_process_forwarding_logs', function (Blueprint $table) {
            $table->id();
            $table->integer('survey_process_list_id')->nullable();
            $table->string('comment')->nullable();
            $table->integer('forward_by')->nullable();
            $table->integer('forward_to')->nullable();
            $table->string('forward_date')->nullable();
            $table->tinyInteger('office_level')->nullable()->comment('1=BBS Head Office, 2=Division Office, 3=District Office, 4=Upazila Office, 5=Field survey user');
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
        Schema::dropIfExists('survey_process_forwarding_logs');
    }
}
