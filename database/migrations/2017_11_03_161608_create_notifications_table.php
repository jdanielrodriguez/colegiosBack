<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('message');
            $table->integer('type')->default(1);
            $table->integer('acepted')->default(1);
            $table->integer('state')->default(3);
            $table->timestamp('date')->useCurrent();
            
            $table->integer('affected')->unsigned()->nullable()->default(null);
            $table->foreign('affected')->references('id')->on('students')->onDelete('cascade');
            $table->integer('receiver')->unsigned()->nullable()->default(null);
            $table->foreign('receiver')->references('id')->on('tutors')->onDelete('cascade');
            $table->integer('sender')->unsigned()->nullable()->default(null);
            $table->foreign('sender')->references('id')->on('teachers')->onDelete('cascade');

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
        Schema::dropIfExists('notifications');
    }
}
