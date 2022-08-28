<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationsForwardMapsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications_forward_maps', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('sender_role_id')->nullable();
            $table->integer('forward_role_id')->nullable();
            $table->integer('level_id')->nullable();
            $table->integer('department_id')->nullable();
            $table->integer('district_id')->nullable();
            $table->integer('division_id')->nullable();
            $table->integer('upazila_id')->nullable();
            $table->integer('office_id')->nullable();
            $table->boolean('is_approved_person')->default(0)->comment('0=Non Approved Person, 1=Approved Person');
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
        Schema::dropIfExists('applications_forward_maps');
    }
}
