<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableStartups extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Startups', function($table){
          $table->increments('id');
          $table->string('name');
          $table->string('official_name');
          $table->date('foundation_date');
          $table->string('department');
          $table->string('field');
          $table->string('type');
          $table->text('desc');
          $table->integer('nb_employees')->unsigned();
          $table->string('keywords');
          $table->string('url');
          $table->string('status');
          $table->string('owner');
          $table->integer('capital_stock');
          $table->string('legal_status');
          $table->string('NAF_code');
          $table->string('SIREN');
          $table->string('SIRET');
          $table->string('adress_adress');
          $table->string('adress_city');
          $table->string('adress_cp');
          $table->string('adress_country');
          $table->string('infogreffe_fr');
          $table->string('societe_com');
          $table->string('source');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('Startups');
    }
}
