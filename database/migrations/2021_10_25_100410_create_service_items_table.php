<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('service_id')->nullable();
            $table->unsignedBigInteger('division_id')->nullable();
            $table->unsignedBigInteger('district_id')->nullable();
            $table->unsignedBigInteger('upazila_id')->nullable();
            $table->unsignedBigInteger('union_id')->nullable();
            $table->unsignedBigInteger('mouza_id')->nullable();
            $table->unsignedBigInteger('village_id')->nullable();
            $table->unsignedBigInteger('ea_id')->nullable();
            $table->unsignedBigInteger('household_id')->nullable();
            $table->unsignedBigInteger('population_id')->nullable();
            $table->integer('data_type')->nullable()->comment('1 = Hard Copy, 2 = Soft Copy');
            $table->foreign('service_id')->references('id')->on('services')->onUpdate('no action')->onDelete('cascade');
            $table->string('item_name_en', 100)->nullable();
            $table->string('item_name_bn', 100)->nullable();
            $table->float('price_bdt_personal')->nullable();
            $table->float('price_bdt_org')->nullable();
            $table->float('price_usd_personal')->nullable();
            $table->float('price_usd_org')->nullable();
            $table->text('description')->nullable();
            $table->string('file_type')->nullable();
            $table->string('sample_attachment')->nullable();
            $table->string('attachment')->nullable();
            $table->boolean('status')->default(1);
            $table->integer('ordering')->nullable();
            $table->integer('service_item_type')->nullable()->comment('1=Survey, 2=Census');
            $table->integer('data_subcategory_id')->nullable();
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
        Schema::dropIfExists('service_items');
    }
}
