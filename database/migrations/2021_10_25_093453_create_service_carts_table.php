<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_carts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('sr_user_id')->unsigned()->nullable();
            $table->integer('office_id')->nullable();
            $table->integer('level_id')->nullable();

            $table->integer('division_id')->nullable();
            $table->integer('district_id')->nullable();
            $table->integer('upazila_id')->nullable();

            $table->integer('usage_type')->nullable();
                // 1= Organization, 2= personal
            $table->string('organization_name',100)->nullable();

            $table->string('organization_address',100)->nullable();

            $table->string('organization_designation',100)->nullable();

            $table->string('personal_occupation',100)->nullable();

            $table->string('personal_institute',100)->nullable();
            $table->integer('purpose_id')->nullable();
            $table->integer('receiving_mode_hardcopy')->nullable()->comment('1=Physical, 2=Courier');
            $table->integer('receiving_mode_softcopy')->nullable()->comment('3=CD/DVD/Flash Drive, 4=Download_link');
            $table->text('courier_address')->nullable();
            $table->text('terms')->nullable();
            $table->boolean('status')->nullable();
                // 1=draft, 2=send application, 3= received,
                // 4= processing, 5= approved, 6= canceled
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
        Schema::dropIfExists('service_carts');
    }
}
