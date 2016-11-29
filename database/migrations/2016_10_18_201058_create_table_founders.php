<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableFounders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('founders', function($table){
        $table->increments('id');
        $table->integer('individual_id')->unsigned();
        $table->integer('startup_id')->unsigned();
        $table->timestamps();

        // Clés étrangères
        $table->foreign('individual_id')->references('id')->on('Individuals');
        $table->foreign('startup_id')->references('id')->on('Startups');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::drop('founders');
    }
}
