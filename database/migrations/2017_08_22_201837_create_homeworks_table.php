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
            $table->string('name')->nullable()->default(null);
            $table->string('description')->nullable()->default(null);
            $table->double('homework_note')->default(0);
            $table->double('student_note')->default(0);
            $table->date('date_begin')->nullable()->default(null);
            $table->date('date_end');
            $table->time('time_end')->nullable()->default(null);
            $table->date('set_date')->nullable()->default(null);
            $table->time('set_time')->nullable()->default(null);
            $table->integer('examen')->default(0);
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
