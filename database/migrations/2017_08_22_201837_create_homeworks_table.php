<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHomeworksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('homeworks', function (Blueprint $table) {
            $table->increments('id');
            $table->double('homework_note')->default(0);
            $table->double('student_note')->default(0);
            $table->date('date_begin');
            $table->date('date_end');
            $table->time('time_end');
            $table->date('set_date');
            $table->time('set_time');
            $table->integer('examen')->default(1);
            $table->integer('state')->default(1);

            $table->integer('subject_teacher')->unsigned();
            $table->foreign('subject_teacher')->references('id')->on('subjects_students')->onDelete('cascade');

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
        Schema::dropIfExists('homeworks');
    }
}
