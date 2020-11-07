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
            $table->unsignedSmallInteger('stage_number');
            $table->string('status')->references('statuses')->on('status');;
            $table->foreignId('done_by')->nullable()->default(null);
            $table->dateTime('last_edited_date', 0)->useCurrent();
            $table->text('comment')->nullable();

            # foreign keys
            $table->foreign('process_id')->references('process_id')->on('processes');
            $table->foreign('done_by')->references('id')->on('users');
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
