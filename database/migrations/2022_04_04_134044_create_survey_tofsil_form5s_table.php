<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateSurveyTofsilForm5sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survey_tofsil_form5s', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('survey_process_list_id')->nullable();
            $table->bigInteger('survey_notification_id')->nullable();
            $table->bigInteger('division_id')->nullable();
            $table->bigInteger('district_id')->nullable();
            $table->bigInteger('upazila_id')->nullable();
            $table->bigInteger('union_id')->nullable();
            $table->bigInteger('mouza_id')->nullable();
            $table->bigInteger('cluster_id')->nullable();
            $table->bigInteger('farmer_id')->nullable();
            $table->string('crop_cutting_date')->nullable();
            $table->string('land_segment_signal')->nullable();
            $table->tinyInteger('in_cluster')->nullable()->comment('1=In Cluster, 2= Out cluster');
            $table->tinyInteger('potato_varieties')->nullable()->comment('1=Desi, 2=High Yielding, 3=Indian');
            $table->double('land_amount_of_plot')->nullable();
            $table->smallInteger('number_of_row')->nullable();
            $table->smallInteger('location_of_sample_row_1')->nullable();
            $table->smallInteger('location_of_sample_row_2')->nullable();
            $table->double('row_length_feet_1')->nullable();
            $table->double('row_length_feet_2')->nullable();
            $table->double('row_average_width_feet_1')->nullable();
            $table->double('row_average_width_feet_2')->nullable();
            $table->double('random_land_amount_of_plot')->nullable();
            $table->smallInteger('random_number_of_row')->nullable();
            $table->smallInteger('random_location_east_to_west')->nullable();
            $table->smallInteger('random_location_north_to_south')->nullable();
            $table->double('random_row_length_feet')->nullable();
            $table->double('random_row_average_width_feet')->nullable();
            $table->integer('random_number_row_cut')->nullable();
            $table->double('size_of_cut_row_squre_feet')->nullable();
            $table->double('size_of_cut_row_acre')->nullable();
            $table->double('amount_of_cut_potato_kg')->nullable();
            $table->double('production_per_acre')->nullable();
            $table->double('production_cost_per_acre')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
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
        Schema::dropIfExists('survey_tofsil_form5s');
    }
}