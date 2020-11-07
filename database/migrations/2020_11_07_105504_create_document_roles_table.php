<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('document_roles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('document_name');
            $table->foreignId('role_id');
            $table->unsignedSmallInteger('sign_order');

            # foreign keys
            $table->foreign('document_name')->references('documents')->on('document_name');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('document_roles');
    }
}
