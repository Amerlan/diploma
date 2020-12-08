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
            $table->string('url');
            $table->date('dateOfBirth');
            $table->unsignedSmallInteger('course_number');
            $table->string('speciality_name');
            $table->string('speciality_code');
            $table->string('faculty_name'); // add facultets FK table
            $table->date('enrollment_date');
            $table->date('graduation_date');
//            $table->unsignedTinyInteger('department');
            $table->timestamps();

            # Foreign keys
            //$table->foreign('department')->references('dep_id')->on('departments');
//            $table->foreign('user_role')->references('id')->on('roles');
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
