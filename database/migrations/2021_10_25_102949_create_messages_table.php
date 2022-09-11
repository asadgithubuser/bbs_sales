<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('application_id')->nullable();
            $table->integer('sr_user_id')->default(0)->nullable();
            $table->integer('sms_template_id')->nullable();
            $table->integer('office_id')->nullable();
            $table->integer('level_id')->nullable();

            $table->integer('division_id')->nullable();
            $table->integer('district_id')->nullable();
            $table->integer('upazila_id')->nullable();
            $table->string('content')->nullable();
            $table->boolean('is_sms')->default(0)->comment('0=unsend, 1=send');
            $table->boolean('is_email')->default(0)->comment('0=unsend, 1=send');
            $table->string('modified', 100)->nullable();
            $table->boolean('status')->default(1);
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
        Schema::dropIfExists('messages');
    }
}
