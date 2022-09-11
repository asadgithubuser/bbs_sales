<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceItemLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_item_locations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('service_item_id')->nullable();
            $table->unsignedBigInteger('division_id')->nullable();
            $table->unsignedBigInteger('district_id')->nullable();
            $table->unsignedBigInteger('upazila_id')->nullable();
            $table->unsignedBigInteger('union_id')->nullable();
            $table->unsignedBigInteger('mouza_id')->nullable();
            $table->unsignedBigInteger('village_id')->nullable();
            $table->unsignedBigInteger('ea_id')->nullable();
            $table->unsignedBigInteger('household_id')->nullable();
            $table->unsignedBigInteger('population_id')->nullable();
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
        Schema::dropIfExists('service_item_locations');
    }
}
