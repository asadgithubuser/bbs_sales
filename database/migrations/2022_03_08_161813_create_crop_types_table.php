<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCropTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crop_types', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('crop_id')->nullable();
            $table->string('crop_type_en')->nullable();
            $table->string('crop_type_bn')->nullable();
            $table->boolean('status')->default(1)->comment('0=inactive, 1=active');
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
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
        Schema::dropIfExists('crop_types');
    }
}
