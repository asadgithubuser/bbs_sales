<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClustersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clusters', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('district_id')->nullable();
            $table->unsignedBigInteger('division_id')->nullable();
            $table->unsignedBigInteger('upazila_id')->nullable();
            $table->string('union_id')->nullable();
            $table->string('mouza_id')->nullable();
            $table->string('name_en')->nullable();
            $table->string('name_bn')->nullable();
            $table->string('code')->nullable();
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
        Schema::dropIfExists('clusters');
    }
}
