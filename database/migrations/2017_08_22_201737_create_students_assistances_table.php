<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsAssistancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students_assistances', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('assistance')->default(true);
            $table->integer('studied')->default(1);
            $table->integer('state')->default(1);
            $table->integer('subject_teacher')->unsigned();
            $table->foreign('subject_teacher')->references('id')->on('subjects_students')->onDelete('cascade');
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
        Schema::dropIfExists('students_assistances');
    }
}
