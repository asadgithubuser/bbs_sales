<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrainingCourseDurationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('training_course_durations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('course_id')->nullable();
            $table->foreign('course_id')->references('id')->on('training_courses')->onDelete('cascade')->onChange('no action');
            $table->bigInteger('batch_no')->nullable();
            $table->string('course_hour')->nullable()->comment('Total course hour');
            $table->string('month')->nullable();
            $table->string('start_date')->nullable();
            $table->string('end_date')->nullable();
            $table->string('duration')->nullable()->comment('Course days');
            $table->integer('trainee_type')->nullable()->comment('1=kormochari, 2=kormokorta, 3=both');
            $table->bigInteger('total_trainees')->nullable();
            $table->integer('training_type')->nullable()->comment('1=resident, 2= non resident');
            $table->integer('total_trainer_allowance')->nullable();
            $table->integer('total_trainee_allowance')->nullable();
            $table->integer('status')->nullable();
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
        Schema::dropIfExists('training_course_durations');
    }
}
