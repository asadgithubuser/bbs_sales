<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('division_id')->nullable();
            $table->unsignedBigInteger('district_id')->nullable();
            $table->unsignedBigInteger('upazila_id')->nullable();
            $table->integer('division_bbs_code')->default(0);
            $table->string('district_bbs_code', 2)->nullable();
            $table->string('city_bbs_code', 2)->nullable();
            $table->string('upazila_bbs_code', 2)->nullable();
            $table->string('municipality_bbs_code', 2)->nullable();
            $table->string('nunion_bbs_code', 3)->nullable();
            $table->string('union_bbs_code', 2)->nullable();
            $table->string('name_en')->nullable();
            $table->string('name_bn')->nullable();
            $table->integer('rmo')->default(0);
            $table->integer('total_part')->default(0)->comment('how many has split this area');
            $table->integer('part_no')->default(0)->comment('put a part number of total split number');
            $table->double('land_area')->default(0);
            $table->double('river_area')->default(0);
            $table->double('forest_area')->default(0);
            $table->integer('card_type', 2)->nullable();
            $table->string('status', 2)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('unions');
    }
}
