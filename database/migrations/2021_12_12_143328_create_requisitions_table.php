<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequisitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requisitions', function (Blueprint $table) {
            $table->id();
            $table->integer('requisition_number')->nullable();
            $table->string('organization_name')->nullable();
            $table->string('name')->nullable();
            $table->string('designation')->nullable();
            $table->string('phone')->nullable();
            $table->text('address')->nullable();
            $table->text('comment')->nullable();
            $table->boolean('status')->default(0)->comment('0=request, 1=approve by dg, 2=reject by dg, 3=delivered');
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
        Schema::dropIfExists('requisitions');
    }
}
