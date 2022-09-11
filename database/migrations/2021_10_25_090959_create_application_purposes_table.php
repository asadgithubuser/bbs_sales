<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationPurposesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('application_purposes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name_en', 100)->nullable();
            $table->string('name_bn')->nullable();
            $table->boolean('status')->default(1);
            $table->integer('ordering')->default(1);
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
        Schema::dropIfExists('application_purposes');
    }
}
