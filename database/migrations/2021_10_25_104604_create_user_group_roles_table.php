<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserGroupRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_group_roles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_group_id')->nullable();
            $table->integer('component_id')->nullable();
            $table->integer('module_id')->nullable();
            $table->integer('task_id')->nullable();
            $table->boolean('task_index')->nullable();
            $table->boolean('task_view')->nullable();
            $table->boolean('task_add')->nullable();
            $table->boolean('task_edit')->nullable();
            $table->boolean('task_delete')->nullable();
            $table->boolean('task_report')->nullable();
            $table->boolean('task_print')->nullable();
            $table->boolean('status')->default(1);
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
        Schema::dropIfExists('user_group_roles');
    }
}
