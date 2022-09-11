<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatatypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datatypes', function (Blueprint $table) {
            $table->id();
            $table->integer('service_item_type')->nullable()->comment('1=Survey, 2=Census');
            $table->string('name_en')->nullable();
            $table->string('name_bn')->nullable();
            $table->boolean('status')->nullable();
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
        Schema::dropIfExists('datatypes');
    }
}
