<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrainingCourseAttachmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('training_course_attachments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('course_id')->nullable();
            $table->foreign('course_id')->references('id')->on('training_courses')->onDelete('cascade')->onChange('no action');
            $table->unsignedBigInteger('curriculumn_id')->nullable();
            $table->foreign('curriculumn_id')->references('id')->on('training_course_curriculumns')->onDelete('cascade')->onChange('no action');
            $table->string('file')->nullable();
            $table->bigInteger('created_by')->nullable();
            $table->bigInteger('updated_by')->nullable();
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
        Schema::dropIfExists('training_course_attachments');
    }
}
