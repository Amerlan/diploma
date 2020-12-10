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
            $table->integer('id')->unsigned()->unique();
            $table->boolean('reason')->default(False);
            $table->boolean('new_fio')->default(False);
            $table->boolean('new_speciality')->default(False);
            $table->boolean('new_speciality_code')->default(False);
            $table->boolean('sum_of_return')->default(False);
            $table->boolean('new_university')->default(False);
            $table->boolean('academic_year')->default(False);
            $table->boolean('subject')->default(False);
            $table->boolean('midterm_grade')->default(False);
            $table->boolean('endterm_grade')->default(False);
            $table->boolean('exam_grade')->default(False);
            $table->boolean('teacher')->default(False);
            $table->boolean('semester')->default(False);
            $table->boolean('phone_number')->default(True);
            $table->boolean('attachments')->default(False);

            // FK
            $table->foreign('id')->references('id')->on('documents');
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
