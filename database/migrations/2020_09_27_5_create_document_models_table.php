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
            $table->string('reason')->nullable();
            $table->string('old_fio')->nullable();
            $table->string('new_fio')->nullable();
            $table->unsignedTinyInteger('semester')->nullable();

            # foreign keys
            $table->foreign('document_type')->references('document_type')->on('document_types');
        });
    }


    public function down()
    {
        Schema::dropIfExists('documents');
    }
}
