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
            $table->integer('id')->unsigned()->autoIncrement();
            $table->string('document_name', 100)->unique();
            $table->string('document_type', 100);
            $table->unsignedSmallInteger('stageCount');
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
//            $table->string('new_university_speciality')->nullable();
//            $table->string('new_university_speciality_code')->nullable();

            $table->unsignedTinyInteger('semester')->nullable();

            # foreign keys
            $table->foreign('document_type')->references('document_type')->on('document_types');
            $table->foreign('teacher')->references('id')->on('users');
        });
    }


    public function down()
    {
        Schema::dropIfExists('documents');
    }
}
