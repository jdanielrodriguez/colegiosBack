<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCyclesStudyingDaysGradesSubjectsTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cycles_studying_days_grades_subjects_teachers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('state')->default(1);
            $table->integer('csdgs')->unsigned();
            $table->foreign('csdgs')->references('id')->on('cycles_studying_days_grades_subjects')->onDelete('cascade');
            $table->integer('teacher')->unsigned();
            $table->foreign('teacher')->references('id')->on('teachers')->onDelete('cascade');
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
        Schema::dropIfExists('cycles_studying_days_grades_subjects_teachers');
    }
}
