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
            $table->string('document_name');
            $table->foreignId('created_by');
            $table->unsignedSmallInteger('current_stage')->default(1);
            $table->boolean('is_rejected')->default(false);
            $table->boolean('is_closed')->default(false);
            $table->dateTime('last_change_date', 0)->useCurrent();
            $table->dateTime('created_date', 0)->useCurrent();
            $table->dateTime('closed_date', 0)->nullable();

            # foreign keys
            $table->foreign('document_name')->references('document_name')->on('documents');
            $table->foreign('created_by')->references('id')->on('users');
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
