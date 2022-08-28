<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceCartItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_cart_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('service_cart_id')->nullable();
            $table->foreign('service_cart_id')->references('id')->on('service_carts')->onUpdate('no action')->onDelete('cascade');
            $table->integer('service_id')->nullable();
            $table->integer('service_item_id')->nullable();
            $table->float('service_item_price')->nullable();
            $table->timestamps();

            // $table->foreign('service_cart_id')
            // ->references('id')->on('categories')
            // ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('service_cart_items');
    }
}
