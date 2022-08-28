<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDistrictsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('districts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('district_bbs_code', 2)->nullable();
            $table->unsignedBigInteger('division_id')->nullable();
            $table->string('division_bbs_code')->nullable();
            $table->string('name_en')->nullable();
            $table->string('name_bn')->nullable();
            $table->double('land_area')->default(0);
            $table->float('river_area')->default(0);
            $table->double('forest_area')->default(0);
            $table->integer('card_type')->default(0);
            $table->boolean('status')->default(1);

            $table->foreign('division_id')
                    ->references('id')
                    ->on('divisions')
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
        Schema::dropIfExists('districts');
    }
}
