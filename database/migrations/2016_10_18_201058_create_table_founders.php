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
        Schema::create('Founders', function($table){
          $table->integer('individual_id')->unsigned();
          $table->integer('startup_id')->unsigned();
          $table->foreign('individual_id')->references('id')->on('Individuals');
          $table->foreign('startup_id')->references('id')->on('Startups');
          $table->primary(['individual_id', 'startup_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('Founders');
    }
}
