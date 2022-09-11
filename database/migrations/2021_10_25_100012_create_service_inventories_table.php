<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceInventoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_inventories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('sales_center_id')->nullable();
            $table->unsignedBigInteger('service_id')->nullable();
            $table->foreign('service_id')->references('id')->on('services')->onUpdate('no action')->onDelete('cascade');
            $table->bigInteger('service_item_id')->nullable();
            $table->string('title')->nullable();
            $table->string('sub_title')->nullable();
            $table->string('data_source')->nullable();
            $table->string('service_type')->nullable()->comment('survey data, census data');
            $table->date('publish_date')->nullable();
            $table->string('downloadable_link')->nullable();
            $table->integer('number_of_hard_copies')->nullable();
            $table->integer('number_of_complimentary_copies')->nullable();
            $table->integer('number_of_sale_copies')->nullable();
            $table->string('store_room')->nullable();
            $table->string('shelf_no')->nullable()->comment('shelf_no, almirah no');
            $table->string('rack_no')->nullable();
            $table->float('price')->nullable();
            $table->boolean('status')->default(1);
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
        Schema::dropIfExists('service_inventories');
    }
}
