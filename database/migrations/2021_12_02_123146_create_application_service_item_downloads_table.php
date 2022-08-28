<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationServiceItemDownloadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('application_service_item_downloads', function (Blueprint $table) {
            $table->id();
            $table->integer('application_id')->nullable();
            $table->integer('service_id')->nullable();
            $table->integer('service_item_id')->nullable();
            $table->string('file_path')->nullable();
            $table->string('link')->nullable();
            $table->integer('total_download')->nullable();
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
        Schema::dropIfExists('application_service_item_downloads');
    }
}
