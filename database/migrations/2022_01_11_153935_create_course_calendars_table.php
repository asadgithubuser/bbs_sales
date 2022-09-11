<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseCalendarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_calendars', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('fiscal_year_id')->nullable();
            $table->unsignedBigInteger('course_id')->nullable();
            $table->boolean('status')->default(false);
            // 0 = pending, 1 = approve, 2 = modified
            $table->integer('forward')->nullable();
            $table->boolean('is_approved')->nullable();
            $table->text('comment')->nullable();
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
        Schema::dropIfExists('course_calendars');
    }
}
