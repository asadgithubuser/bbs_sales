<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('sr_user_id');
            $table->integer('application_id')->nullable();
            $table->unsignedBigInteger('office_id')->nullable();
            $table->foreign('office_id')
                    ->references('id')
                    ->on('offices')
                    ->onDelete('no action')
                    ->onUpdate('no action');
            $table->integer('division_id')->nullable();
            $table->integer('district_id')->nullable();
            $table->integer('upazila_id')->nullable();
            $table->integer('union_id')->nullable();
            $table->integer('mouza_id')->nullable();
            $table->string('parent_name')->nullable();
            $table->integer('usage_type')->default(1)->comment('1=Organization, 2=Researcher, 3=Student');
            $table->string('organization_name', 100)->nullable();
            $table->string('organization_address', 255)->nullable();
            $table->string('organization_designation', 100)->nullable();
            $table->string('personal_occupation', 100)->nullable();
            $table->string('personal_institute', 100)->nullable();
            $table->string('attachment')->nullable();
            $table->integer('purpose_id')->nullable();
            $table->text('purpose_specify')->nullable();
            $table->string('application_sub')->nullable();
            $table->text('applicant_text')->nullable();
            $table->float('total_price')->nullable();
            $table->float('discount')->nullable();
            $table->float('final_total')->nullable();
            $table->integer('receiving_mode_hardcopy')->nullable()->comment('1=Physical, 2=Courier');
            $table->integer('receiving_mode_softcopy')->nullable()->comment('3=CD/DVD/Flash Drive, 4=Download_link');
            $table->text('courier_address')->nullable();
            $table->integer('current_sender_role_id',)->nullable();
            $table->integer('current_receiver_role_id',)->nullable();
            $table->integer('current_application_status_id',)->nullable();
            $table->text('terms')->nullable();
            $table->boolean('is_approved')->default(0)->comment('0=UnApproved, 1=Approved');
            $table->integer('status')->default(1)->comment('1=Pending, 2=Received, 3=Processing, 4=Approved, 5=Rejected');
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
        Schema::dropIfExists('applications');
    }
}
