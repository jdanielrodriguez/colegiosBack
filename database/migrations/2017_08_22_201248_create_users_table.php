<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('username')->unique();
            $table->string('password');
            $table->string('email')->unique();
            $table->string('firstname')->nullable()->default(null);
            $table->string('lastname')->nullable()->default(null);
            $table->string('privileges');
            $table->tinyInteger('state')->default(1);

            $table->integer('student')->unsigned()->nullable()->default(null);
            $table->foreign('student')->references('id')->on('students')->onDelete('cascade');
            $table->integer('teacher')->unsigned()->nullable()->default(null);
            $table->foreign('teacher')->references('id')->on('teachers')->onDelete('cascade');
            $table->integer('tutor')->unsigned()->nullable()->default(null);
            $table->foreign('tutor')->references('id')->on('tutors')->onDelete('cascade');

            $table->integer('type')->unsigned();
            $table->foreign('type')->references('id')->on('users_types')->onDelete('cascade');

            $table->rememberToken();
            $table->timestamps();
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
