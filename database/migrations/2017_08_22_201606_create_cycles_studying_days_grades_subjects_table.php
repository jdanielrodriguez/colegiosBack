<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCyclesStudyingDaysGradesSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cycles_studying_days_grades_subjects', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('state')->default(1);

            $table->integer('csdg')->unsigned();
            $table->foreign('csdg')->references('id')->on('cycles_studying_days_grades')->onDelete('cascade');
            $table->integer('subject')->unsigned();
            $table->foreign('subject')->references('id')->on('subjects')->onDelete('cascade');

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
        Schema::dropIfExists('cycles_studying_days_grades_subjects');
    }
}
