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
            $table->unsignedBigInteger('dl_id')->unique()->nullable();
            $table->string('dl_mail')->unique();
            $table->string('url')->nullable();
            $table->date('dateOfBirth')->nullable();
            $table->unsignedSmallInteger('course_number')->nullable();
            $table->string('group')->nullable();
            $table->string('speciality_name')->nullable();
            $table->string('speciality_code')->nullable();
            $table->string('faculty_name')->nullable(); // add facultets FK table
            $table->date('enrollment_date')->nullable();
            $table->date('graduation_date')->nullable();
            $table->string('phone_number')->nullable()->unique();
//            $table->unsignedTinyInteger('department');
            $table->timestamps();

            # Foreign keys
            //$table->foreign('department')->references('dep_id')->on('departments');
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
