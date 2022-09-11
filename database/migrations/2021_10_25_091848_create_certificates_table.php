<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCertificatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('certificates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('application_id')->nullable();
            $table->unsignedBigInteger('sr_user_id')->default(0);
            $table->integer('service_item_id', 50)->nullable();
            $table->string('certificate_no', 50)->nullable();
            $table->string('certificate_date', 100)->nullable();
            $table->text('content')->nullable();
            $table->integer('template_id')->nullable();
            $table->integer('office_id')->nullable();
            $table->integer('level_id')->nullable();
            $table->integer('division_id')->nullable();
            $table->integer('district_id')->nullable();
            $table->integer('upazila_id')->nullable();
            $table->integer('created_by')->nullable();
            $table->string('created_by_signature')->nullable();
            $table->integer('created_by_designation')->nullable();
            $table->string('modified', 100)->nullable();
            $table->integer('counter')->nullable();
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
        Schema::dropIfExists('certificates');
    }
}
