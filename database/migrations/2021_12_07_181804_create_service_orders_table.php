<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_orders', function (Blueprint $table) {
            $table->id();
            $table->string('sales_center_id')->nullable();
            $table->decimal('total_quantity',10,2)->default(0);
            $table->decimal('total_price',10,2)->default(0);
            $table->decimal('paid_amount',10,2)->default(0);
            $table->decimal('due_amount',10,2)->default(0);
            $table->string('payment_status')->default('unpaid');
            $table->bigInteger('user_id')->nullable();
            $table->bigInteger('customer_id')->nullable();
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
        Schema::dropIfExists('service_orders');
    }
}
