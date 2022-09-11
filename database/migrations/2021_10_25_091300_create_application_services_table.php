<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('application_services', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('application_id')->nullable();
            $table->foreign('application_id')->references('id')->on('applications')->onUpdate('no action')->onDelete('cascade');
            $table->integer('service_id')->nullable();
            $table->integer('service_item_id')->nullable();
            $table->float('service_item_price')->nullable();
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
        Schema::dropIfExists('application_services');
    }
}
