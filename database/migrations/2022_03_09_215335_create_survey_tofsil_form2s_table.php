<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurveyTofsilForm2sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survey_tofsil_form2s', function (Blueprint $table) {
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
            $table->string('cluster_area_acre')->nullable();
            $table->bigInteger('crop_id')->nullable();
            $table->integer('crop_type_code')->nullable()->comment('8=Deshi, 9=HYV, 10=Hybrid');
            $table->integer('in_cluster')->nullable()->comment('1=In Cluster, 2=Out Cluster');
            $table->string('plot_corner_point_1')->nullable();
            $table->string('point_1_number')->nullable();
            $table->string('point_1_random')->nullable();
            $table->string('plot_corner_point_2')->nullable();
            $table->string('point_2_number')->nullable();
            $table->string('point_2_random')->nullable();
            $table->integer('type_of_cultivation')->nullable()->comment('6=Bona, 7=Ropa');
            $table->double('amount_of_land')->nullable();
            $table->double('after_harvesting_paddy_kg')->nullable();
            $table->double('after_harvesting_wheat_kg')->nullable();
            $table->double('after_harvesting_jute_kg')->nullable();
            $table->string('paddy_moisture')->nullable();
            $table->integer('water_irrigation')->nullable()->comment('1=Yes, 2=No');
            $table->integer('source_of_water')->nullable()->comment('1=Natural, 2=Mechanical, 3=Both');
            $table->integer('is_water_irrigation_both')->nullable()->comment('1=Adequate, 2= Medium, 3=Inadequate');
            $table->integer('has_used_fertilizer')->nullable()->comment('1=Yes, 2=No');
            $table->integer('what_type_fertilizer')->nullable()->comment('1=Chemical, 2=Organic');
            $table->integer('what_used_fertilizer')->nullable()->comment('1=Urea, 2=TSP, 3=Potash, 4=DAP, 5= Zinc, 6=Organic');
            $table->double('fertilizer_amound')->nullable();
            $table->integer('is_used_pesticide')->nullable()->comment('1=Yes, 2=No');
            $table->integer('what_type_pesticide')->nullable()->comment('1=Natural, 2=Mechanical, 3=Both');
            $table->double('pesticide_amound')->nullable();
            $table->text('agricultural_officer_info')->nullable();
            $table->boolean('status')->default(false);
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
        Schema::dropIfExists('survey_tofsil_form2s');
    }
}
