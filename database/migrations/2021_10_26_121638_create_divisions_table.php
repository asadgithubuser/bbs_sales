<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDivisionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('divisions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('division_bbs_code', 2)->nullable();
            $table->string('name_en')->nullable();
            $table->string('name_bn')->nullable();
            $table->double('land_area')->default(0);
            $table->double('river_area')->default(0);
            $table->double('forest_area')->default(0);
            $table->integer('card_type')->default(0);
            $table->integer('status')->default(1);
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('divisions');
    }
}
