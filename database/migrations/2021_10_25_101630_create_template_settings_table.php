<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTemplateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('template_settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigIncrements('service_item_id');
            $table->integer('service_id')->nullable();
            $table->string('type', 100)->nullable();
            $table->text('header')->nullable();
            $table->text('footer')->nullable();
            $table->text('body')->nullable();
            $table->boolean('status')->default(true);
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
        Schema::dropIfExists('template_settings');
    }
}
