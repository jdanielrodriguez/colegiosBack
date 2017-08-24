<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubjectsStudentstable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subjects_students', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('note')->default(0);
            $table->date('year');
            $table->integer('state')->default(1);
            $table->integer('cycle_study_day_grade_subject')->unsigned();
            $table->foreign('cycle_study_day_grade_subject')->references('id')->on('cycles_studying_days_grades_subjects')->onDelete('cascade');
            $table->integer('student')->unsigned();
            $table->foreign('student')->references('id')->on('students')->onDelete('cascade');
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
        Schema::dropIfExists('subjects_students');
    }
}
