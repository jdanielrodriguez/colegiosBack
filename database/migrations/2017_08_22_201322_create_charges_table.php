<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChargesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('charges', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('tuition')->nullable()->default(null);
            $table->boolean('inscription')->nullable()->default(null);;
            $table->integer('defaulter')->default(0);
            $table->string('description')->nullable()->default(null);
            $table->date('charge_limit');
            $table->double('quantity');
            $table->double('increase');
            $table->tinyInteger('state')->default(1);

            $table->integer('idinscription')->unsigned();
            $table->foreign('idinscription')->references('id')->on('inscriptions')->onDelete('cascade');
            
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
        Schema::dropIfExists('charges');
    }
}
