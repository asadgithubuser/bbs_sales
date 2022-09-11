<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationServiceItemDownloadDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('application_service_item_download_details', function (Blueprint $table) {
            $table->id();
            $table->string('ip_address')->nullable();
            $table->integer('user_id')->nullable();
            $table->integer('application_id')->nullable();
            $table->integer('application_service_item_download_id')->nullable();
            $table->integer('download_quantity')->nullable();
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
        Schema::dropIfExists('application_service_item_download_details');
    }
}
