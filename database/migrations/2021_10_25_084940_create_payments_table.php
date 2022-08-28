<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('division_id')->nullable();
            $table->integer('district_id')->nullable();
            $table->integer('upazila_id')->nullable();
            $table->integer('office_id')->nullable();
            $table->bigInteger('application_id')->unsigned()->nullable();
            $table->bigInteger('sr_user_id')->unsigned()->nullable();
            $table->string('nid',20)->nullable();
            $table->date('dob')->nullable();
            $table->float('amount',11,2)->nullable();
            $table->float('fees',10,2)->nullable();
            $table->string('document_img')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('account_number')->nullable();
            $table->string('mobile_bank')->nullable();
            $table->string('request_id',100)->nullable();
            $table->string('transaction_id',100)->nullable();
            $table->string('certificate_document_no',50)->nullable();
            $table->integer('pg_id')->nullable();
            $table->boolean('is_app')->default(0);
            $table->string('challan_no',50)->nullable();
            $table->string('request_time')->nullable();
            $table->string('response_time')->nullable();
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
        Schema::dropIfExists('payments');
    }
}
