<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTableStartupsKeywords extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('keyword_startup', function($table) {

        // Relations n..n, utiliser les pivots Laravel:
        // http://laraveldaily.com/pivot-tables-and-many-to-many-relationships/

        $table->integer('keyword_id')->unsigned();
        $table->integer('startup_id')->unsigned();
        $table->timestamps();

        $table->foreign('keyword_id')->references('id')->on('keywords')->onDelete('cascade');
        $table->foreign('startup_id')->references('id')->on('startups')->onDelete('cascade');
        $table->primary(['keyword_id', 'startup_id']);
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::drop('keyword_startup');
    }
}
