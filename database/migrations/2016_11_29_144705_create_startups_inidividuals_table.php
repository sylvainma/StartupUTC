<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStartupsInidividualsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('individual_startup', function($table){
      $table->integer('individual_id')->unsigned();
      $table->integer('startup_id')->unsigned();
      $table->timestamps();

      $table->foreign('individual_id')->references('id')->on('individuals')->onDelete('cascade');;
      $table->foreign('startup_id')->references('id')->on('startups')->onDelete('cascade');;
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
    Schema::drop('individual_startup');
  }
}
