<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGenerateSurveyNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('generate_survey_notifications', function (Blueprint $table) {
            $table->id();
            $table->integer('receiver_id')->nullable();
            $table->integer('receiver_designation_id')->nullable();
            $table->integer('survey_notification_id')->nullable();
            $table->string('data')->nullable();
            $table->integer('sender_id')->nullable();
            $table->string('goto_url')->nullable();
            $table->integer('survey_form_id')->nullable();
            $table->integer('read_status')->nullable()->comment('0=unread, 1=read');
            $table->integer('status')->nullable()->comment('1=active, 0=expired');
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
        Schema::dropIfExists('generate_survey_notifications');
    }
}
