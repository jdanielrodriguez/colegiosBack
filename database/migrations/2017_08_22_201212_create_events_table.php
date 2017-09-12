<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->string('description');
            $table->date('begindate')->nullable()->default(null);
            $table->date('finishdate')->nullable()->default(null);
            $table->string('comment')->nullable()->default(null);
            $table->tinyInteger('state')->default(1);

            $table->integer('type')->unsigned();
            $table->foreign('type')->references('id')->on('events_types')->onDelete('cascade');
            
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
        Schema::dropIfExists('events');
    }
}
