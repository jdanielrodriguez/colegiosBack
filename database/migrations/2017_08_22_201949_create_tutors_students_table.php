<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTutorsStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tutors_students', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('parents')->default(true);
            $table->integer('state')->default(1);

            $table->integer('tutor')->unsigned();
            $table->foreign('tutor')->references('id')->on('tutors')->onDelete('cascade');
            $table->integer('student')->unsigned();
            $table->foreign('student')->references('id')->on('students')->onDelete('cascade');

            $table->softDeletes();
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
        Schema::dropIfExists('tutors_students');
    }
}
