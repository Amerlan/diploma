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
    /*public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('user_id');
            $table->string('user_name');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->unsignedBigInteger('dl_id')->unique();
            $table->string('dl_mail')->unique();
            //$table->unsignedTinyInteger('department');
            $table->unsignedTinyInteger('user_priority')->default(5);
            //$table->unsignedTinyInteger('user_role');
            $table->timestamps();
            //$table->foreign('department')->references('dep_id')->on('departments');
            //$table->foreign('user_role')->references('role_id')->on('roles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    /*public function down()
    {
        Schema::dropIfExists('users');
    }*/
}
