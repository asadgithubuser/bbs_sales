<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationsProcessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications_processes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('application_id')->nullable();
            $table->foreign('application_id')->references('id')->on('applications')->onDelete('cascade')->onUpdate('no action');
            $table->integer('user_id')->nullable();
            $table->integer('sender_role_id')->nullable();
            $table->integer('receiver_role_id')->nullable();
            $table->integer('sender_designation_id')->nullable();
            $table->string('sender_signature')->nullable();
            $table->string('comment')->nullable();
            $table->boolean('status')->nullable();
            $table->string('receive_time')->nullable();
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
        Schema::dropIfExists('applications_processes');
    }
}
