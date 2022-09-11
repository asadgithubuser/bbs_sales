<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUpazilasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('upazilas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('upazila_bbs_code', 2)->nullable();
            $table->unsignedBigInteger('district_id')->nullable();
            $table->string('district_bbs_code', 2)->nullable();
            $table->integer('division_id')->unsigned()->nullable();
            $table->string('division_bbs_code')->nullable();
            $table->string('name_en')->nullable();
            $table->string('name_bn')->nullable();
            $table->double('land_area')->default(0);
            $table->double('river_area')->default(0);
            $table->double('forest_area')->default(0);
            $table->integer('card_type')->default(0);
            $table->integer('status')->default(1);

            $table->foreign('district_id')
                    ->references('id')
                    ->on('districts')
                    ->onUpdate('no action')
                    ->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('upazilas');
    }
}
