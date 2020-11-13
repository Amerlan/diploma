<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('secret_password');
            $table->rememberToken();
            $table->unsignedBigInteger('dl_id')->unique();
            $table->string('dl_mail')->unique();
            //$table->unsignedTinyInteger('department');
            $table->foreignId('user_role');
            $table->timestamps();

            # Foreign keys
            //$table->foreign('department')->references('dep_id')->on('departments');
            $table->foreign('user_role')->references('id')->on('roles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
