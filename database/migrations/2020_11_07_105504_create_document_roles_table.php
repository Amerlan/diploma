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
            $table->string('document_name');
            $table->bigInteger('role_id')->references('id')->on('roles');;
            $table->unsignedSmallInteger('sign_order');

            # foreign keys
            $table->foreign('document_name')->references('document_name')->on('documents')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('document_roles');
    }
}
