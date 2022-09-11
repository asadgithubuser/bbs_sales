<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrainingCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('training_courses', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->unsignedBigInteger('fiscal_year_id')->nullable();
            $table->foreign('fiscal_year_id')->references('id')->on('fiscal_years')->onDelete('cascade')->onUpdate('no action');
            $table->unsignedBigInteger('trainer_id')->nullable();
            $table->foreign('trainer_id')->references('id')->on('training_trainers')->onDelete('cascade')->onUpdate('no action');
            $table->bigInteger('course_director_id')->nullable();
            $table->bigInteger('course_coordinator_id')->nullable();
            $table->text('course_purpose')->nullable();
            $table->boolean('status')->default(false);

            // 0 = fresh, 1= approved , 2 = modify , 3 = pending
            $table->boolean('is_published')->default(false);
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
        Schema::dropIfExists('training_courses');
    }
}
