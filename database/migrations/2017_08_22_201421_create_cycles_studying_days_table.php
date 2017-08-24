<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCyclesStudyingDaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cycles_studying_days', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('state')->default(1);
            $table->date('year');
            $table->date('begin');
            $table->date('end');
            $table->integer('cycle')->unsigned();
            $table->foreign('cycle')->references('id')->on('cycles')->onDelete('cascade');
            $table->integer('study_day')->unsigned();
            $table->foreign('study_day')->references('id')->on('studying_days')->onDelete('cascade');
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
        Schema::dropIfExists('cycles_studying_days');
    }
}
