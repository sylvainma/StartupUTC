<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSuggestionsValueTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('suggestions_values', function($table){
        $table->increments('id');
        $table->integer('suggestion_id')->unsigned();
        $table->string('table');
        $table->integer('row');
        $table->string('column');
        $table->text('new_value');
        $table->timestamps();

        $table->foreign('suggestion_id')->references('id')->on('suggestions')->onDelete('cascade');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::drop('suggestions_values');
    }
}
