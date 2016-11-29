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
        $table->string('name');                                     // Nom
        $table->string('official_name');                            // Dénomination officielle
        $table->date('foundation_date');                            // Date de création (~année)
        $table->integer('field_id')->unsigned()->nullable();        // Domaine d'activité économique
        $table->integer('department_id')->unsigned()->nullable();   // Domaine UTC (quel GX)
        $table->enum('type', ['service', 'produit', 'autre']);      // Type de valeur: service ou produit
        $table->text('desc');                                       // Description de la startup
        $table->integer('nb_employees')->unsigned();                // Nombre d'employés (tranche) -> penser à transformer l'affiche en forme d'intervalle dans le model Startup avec un mutator
        $table->string('url');                                      // Site officiel de la startup
        $table->enum('status', [                                    // Statut
                                  'en cours de développement',
                                  'en activité',
                                  'abandonné',
                                  'faillite',
                                  'autre'
        ]);
        $table->integer('owner')->unsigned()->nullable();           // Entreprise qui a racheté
        $table->integer('capital_stock');                           // Capital social
        $table->integer('legal_status_id')->unsigned()->nullable(); // Forme juridique
        $table->string('NAF_code');                                 // Code NAF
        $table->string('SIREN');                                    // SIREN
        $table->string('SIRET');                                    // SIRET
        $table->integer('address_id')->unsigned()->nullable();      // Adresse
        $table->string('infogreffe_fr');                            // Lien infogreffe.fr
        $table->string('societe_com');                              // Lien societe.com
        $table->string('source');                                   // Source des infos
        $table->timestamps();

        $table->foreign('field_id')->references('id')->on('fields')->onDelete('set null');
        $table->foreign('department_id')->references('id')->on('fields')->onDelete('set null');
        $table->foreign('owner')->references('id')->on('companies')->onDelete('set null');
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
