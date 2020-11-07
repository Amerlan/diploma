<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProcessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('processes', function (Blueprint $table) {
            $table->bigIncrements('process_id');
            $table->foreignId('document_id');
            $table->foreignId('executor_role_id');
            $table->foreignId('created_by');
            $table->smallInteger('current_stage')->default(1);
            $table->boolean('is_rejected')->default(false);
            $table->dateTime('last_change_date', 0)->useCurrent();
            $table->boolean('is_closed')->default(false);
            $table->dateTime('created_date', 0)->useCurrent();
            $table->dateTime('closed_date', 0)->nullable();

            $table->foreign('document_id')->references('document_id')->on('documents');
            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('executor_role_id')->references('executor_role')->on('document_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('processes');
    }
}
