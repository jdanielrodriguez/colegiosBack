<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecommendationsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recommendations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable()->default(null);
            $table->string('description')->nullable()->default(null);
            $table->string('file')->nullable()->default(null);
            $table->string('file2')->nullable()->default(null);
            $table->timestamp('upload_date')->useCurrent();;
            $table->integer('examen')->default(0);
            $table->integer('state')->default(1);

            $table->integer('subject_student')->unsigned();
            $table->foreign('subject_student')->references('id')->on('subjects_students')->onDelete('cascade');

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
        Schema::dropIfExists('recommendations');
    }
}
