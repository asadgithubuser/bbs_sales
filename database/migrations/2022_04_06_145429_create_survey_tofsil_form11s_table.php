<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurveyTofsilForm11sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survey_tofsil_form11s', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('survey_process_list_id')->nullable();
            $table->bigInteger('survey_notification_id')->nullable();
            $table->bigInteger('division_id')->nullable();
            $table->bigInteger('district_id')->nullable();
            $table->bigInteger('upazila_id')->nullable();
            $table->bigInteger('union_id')->nullable();
            $table->bigInteger('crops_id')->nullable();
            $table->string('cause_of_loss')->nullable();
            $table->date('loss_period_start_date')->nullable();
            $table->date('loss_period_end_date')->nullable();
            $table->double('land_amound')->nullable();
            $table->double('partial_damage')->nullable();
            $table->integer('percentage_of_damage')->nullable();
            $table->double('partial_damage_to_total_damage')->nullable();
            $table->double('complete_damage')->nullable();
            $table->double('yield_per_desired_acre')->nullable();
            $table->double('estimated_amount_of_crop_loss')->nullable();
            $table->double('amount_of_crop_loss_tk')->nullable();
            $table->boolean('status')->default(0);
            $table->bigInteger('created_by')->nullable();
            $table->bigInteger('updated_by')->nullable();

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
        Schema::dropIfExists('survey_tofsil_form11s');
    }
}
