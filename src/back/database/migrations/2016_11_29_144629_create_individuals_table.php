<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIndividualsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('individuals', function($table){
      $table->increments('id');
      $table->string('first_name');
      $table->string('last_name');
      $table->string('email');
      $table->string('promo_utc');
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
    Schema::drop('individuals');
  }
}
