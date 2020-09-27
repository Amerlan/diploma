<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->bigIncrements('document_id');
            $table->string('document_type', 100);
            $table->string('status', 25);
            $table->foreignId('executor_id');
            $table->boolean('is_rejected')->default(false);
            $table->dateTime('created_date', 0)->useCurrent();
            $table->dateTime('signed_date', 0)->nullable();
            $table->dateTime('last_change_date', 0)->useCurrent();
            $table->boolean('is_closed')->default(false);
            $table->foreignId('created_by');

            $table->foreign('document_type')->references('document_type')->on('document_types');
            $table->foreign('executor_id')->references('user_id')->on('users');
            $table->foreign('created_by')->references('user_id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('document_models');
    }
}
