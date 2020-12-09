<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('document_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id')->unique();
            $table->Longtext('header');
            $table->string('title');
            $table->Longtext('body');
            $table->string('reason')->nullable();
            $table->string('new_fio')->nullable();
            $table->string('new_speciality')->nullable();
            $table->string('new_speciality_code')->nullable();
            $table->unsignedSmallInteger('sum_of_return')->nullable();
            $table->string('new_university')->nullable();
            $table->date('academic_year')->nullable();
            $table->string('subject')->nullable();
            $table->unsignedFloat('midterm_grade')->nullable();
            $table->unsignedFloat('endterm_grade')->nullable();
            $table->unsignedFloat('exam_grade')->nullable();
            $table->foreignId('teacher')->nullable();

            // FK
            $table->foreign('document_name')->references('document_name')->on('documents');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('document_details');
    }
}
