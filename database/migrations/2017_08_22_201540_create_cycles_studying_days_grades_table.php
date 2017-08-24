<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCyclesStudyingDaysGradesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cycles_studying_days_grades', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('state')->default(1);

            $table->integer('cycle_study_day')->unsigned();
            $table->foreign('cycle_study_day')->references('id')->on('cycles_studying_days')->onDelete('cascade');
            $table->integer('grade')->unsigned();
            $table->foreign('grade')->references('id')->on('grades')->onDelete('cascade');

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
        Schema::dropIfExists('cycles_studying_days_grades');
    }
}
