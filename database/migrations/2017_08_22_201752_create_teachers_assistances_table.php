<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeachersAssistancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers_assistances', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('assistance')->default(true);
            $table->integer('studied')->default(1);
            $table->integer('state')->default(1);

            $table->integer('csdgst')->unsigned();
            $table->foreign('csdgst')->references('id')->on('cycles_studying_days_grades_subjects_teachers')->onDelete('cascade');

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
        Schema::dropIfExists('teachers_assistances');
    }
}
