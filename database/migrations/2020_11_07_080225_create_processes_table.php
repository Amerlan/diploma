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
//            $table->Longtext('header');
//            $table->string('title');
//            $table->Longtext('body');
            $table->string('reason')->nullable();
            $table->string('new_fio')->nullable();
            $table->string('new_speciality')->nullable();
            $table->string('new_speciality_code')->nullable();
            $table->unsignedSmallInteger('sum_of_return')->nullable();
            $table->string('new_university')->nullable();
            $table->unsignedSmallInteger('academic_year')->nullable();
            $table->string('subject')->nullable();
            $table->unsignedFloat('midterm_grade')->nullable();
            $table->unsignedFloat('endterm_grade')->nullable();
            $table->unsignedFloat('exam_grade')->nullable();
            $table->foreignId('teacher')->nullable();
            $table->unsignedTinyInteger('semester')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('process_token')->nullable()->unique();


            $table->boolean('draft')->default(true);

            $table->boolean('is_rejected')->default(false);
            $table->boolean('is_closed')->default(false);
            $table->dateTime('last_change_date', 0)->useCurrent();
            $table->dateTime('created_date', 0)->useCurrent();
            $table->dateTime('closed_date', 0)->nullable();
            $table->longText('body')->nullable();
            $table->longText('header')->nullable();

            # foreign keys
            $table->foreign('document_name')->references('document_name')->on('documents')->onDelete('cascade');
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('teacher')->references('id')->on('users')->onDelete('cascade');
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
