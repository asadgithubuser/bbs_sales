<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventoryUpdateHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventory_update_histories', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('service_inventory_id')->nullable();
            $table->bigInteger('added_by')->nullable();
            $table->integer('number_of_hard_copies')->nullable();
            $table->integer('number_of_complimentary_copies')->nullable();
            $table->integer('number_of_sale_copies')->nullable();
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
        Schema::dropIfExists('inventory_update_histories');
    }
}
