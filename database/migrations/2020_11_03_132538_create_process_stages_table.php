<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProcessStagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('process_stages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('process_id');
            $table->foreignId('current_role_id');
            $table->foreignId('signed_by')->nullable();
            $table->foreignId('returned_by')->nullable();
            $table->foreignId('rejected_by')->nullable();
            $table->dateTime('action_date', 0)->useCurrent();
            $table->text('comment')->nullable();

            $table->foreign('document_id')->references('document_id')->on('documents');
            $table->foreign('current_role_id')->references('id')->on('roles');
            $table->foreign('signed_by')->references('id')->on('users');
            $table->foreign('returned_by')->references('id')->on('users');
            $table->foreign('rejected_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('document_stages');
    }
}
