<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventoryCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventory_carts', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('service_inventory_id')->nullable();
            $table->integer('sales_center_id')->nullable();
            $table->integer('quantity')->default(1);
            $table->integer('price')->nullable();
            $table->bigInteger('user_id)')->nullable();
            $table->bigInteger('customer_id)')->nullable();
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
        Schema::dropIfExists('inventory_carts');
    }
}
