<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurveyNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survey_notifications', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('survey_form_id')->nullable();
            $table->string('survey_for')->nullable();
            $table->bigInteger('division_id')->nullable();
            $table->bigInteger('district_id')->nullable();
            $table->bigInteger('upazila_id')->nullable();

            $table->bigInteger('crop_id')->nullable();
            $table->bigInteger('crop_type')->nullable();
            // "1"=দানা জাতীয়
            // "2"=ডাল জাতীয়
            // "3"=তৈল বীজ জাতীয়
            // "4"=আঁশ জাতীয়
            // "5"=সবজি জাতীয়
            // "6"=শাক জাতীয়
            // "7"=মসলা জাতীয়
            // "8"=চিনি জাতীয়
            // "9"=ফল জাতীয়
            // "10"=ফুল জাতীয়
            // "11"=নেশা জাতীয়
            // "12"=গো-খাদ্য ও জ্বালানী
            $table->string('scope_of_action_number')->nullable();
            $table->string('start_date_of_collection')->nullable();
            $table->string('end_date_of_collection')->nullable();

            $table->string('notification_start_data_field')->nullable(); // for field
            $table->string('notification_end_data_field')->nullable(); // for field

            $table->string('notification_start_data_upazila')->nullable(); // for upazila
            $table->string('notification_end_data_upazila')->nullable(); // for upazila
            
            $table->string('notification_start_data_zila')->nullable(); // for zila
            $table->string('notification_end_data_zila')->nullable(); // for zila

            $table->string('notification_start_data_division')->nullable(); // for division
            $table->string('notification_end_data_division')->nullable(); // for division

            $table->string('notification_start_data_head_office')->nullable(); // for head_office
            $table->string('notification_end_data_head_office')->nullable(); // for head_office

            $table->boolean('status')->default(false);
            $table->boolean('is_published')->default(false);
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
        Schema::dropIfExists('survey_notifications');
    }
}
