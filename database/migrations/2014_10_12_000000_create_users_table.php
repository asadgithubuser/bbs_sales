<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('role_id')->nullable();
            $table->integer('sales_center')->nullable();
            $table->integer('office_id')->nullable();
            $table->integer('designation_id')->nullable();
            $table->string('username');
            $table->string('password');
            $table->string('first_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('dob')->nullable();
            $table->text('present_address')->nullable();
            $table->text('permanent_address')->nullable();
            $table->string('nid_no', 100)->nullable();
            $table->string('birth_certificate_no', 100)->nullable();
            $table->integer('country_id')->nullable();
            $table->integer('division_id')->nullable();
            $table->integer('district_id')->nullable();
            $table->integer('upazila_id')->nullable();
            $table->integer('union_id')->nullable();
            $table->integer('mouza_id')->nullable();
            $table->integer('class')->nullable();
            $table->integer('level_id')->nullable();
            $table->string('postal_code', 10)->nullable();
            $table->string('photo', 40)->nullable();
            $table->string('mobile', 20)->nullable();
            $table->string('email', 100)->nullable();
            $table->string('signature')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->string('is_pass_changed')->nullable();
            $table->integer('subscribe_id')->nullable();
            $table->boolean('is_sr_user')->default(1);
            $table->boolean('notification_email')->default(1);
            $table->boolean('notification_sms')->default(1);
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
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
        Schema::dropIfExists('users');
    }
}
