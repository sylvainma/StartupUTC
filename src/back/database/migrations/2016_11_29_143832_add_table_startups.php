<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTableStartups extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('startups', function($table) {
        $table->increments('id');
        $table->string('name_official');                            // Nom officiel
        $table->string('name_commercial');                          // Dénomination officielle
        $table->date('foundation_date');                            // Date de création (~année)
        $table->integer('field_id')->unsigned()->nullable();        // Domaine d'activité économique
        $table->string('department_id');                            // Département GX
        $table->text('desc');                                       // Description de la startup
        $table->enum('status', [                                    // Statut
                                  'en cours de développement',
                                  'en activité',
                                  'abandonné',
                                  'faillite',
                                  'autre'
        ])->default('en activité');
        $table->integer('legal_status_id')->unsigned()->nullable(); // Forme juridique
        $table->string('NAF_code');                                 // Code NAF
        $table->string('SIREN');                                    // SIREN
        $table->string('SIRET');                                    // SIRET
        $table->integer('address_id')->unsigned()->nullable();      // Adresse
        $table->string('email');                                    // Email
        $table->string('phone');                                    // Email
        $table->string('url');                                      // Site officiel de la startup
        $table->string('facebook');                                 // Facebook de la startup
        $table->string('twitter');                                  // Twitter de la startup
        $table->string('linkedin');                                 // Linkedin de la startup
        $table->string('sources');                                  // Source des infos
        $table->timestamps();

        $table->foreign('field_id')->references('id')->on('fields')->onDelete('set null');
        $table->foreign('legal_status_id')->references('id')->on('legal_statuses')->onDelete('set null');
        $table->foreign('address_id')->references('id')->on('addresses')->onDelete('set null');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::drop('startups');
    }
}
