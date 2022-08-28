<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgricultureSurveyNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agriculture_survey_notifications', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('receiver_user_id')->nullable()->default(12);
            $table->bigInteger('sender_user_id')->nullable()->default(12);
            $table->bigInteger('survey_form_id')->nullable();
            $table->string('survey_form')->nullable();
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
        Schema::dropIfExists('agriculture_survey_notifications');
    }
}
