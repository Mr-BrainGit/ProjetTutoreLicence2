<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDemandeHebergementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demande_hebergements', function (Blueprint $table) {
            $table->id("idDemandeH");
            $table->date("dateDemande");
            $table->string("motifSejour");
            $table->boolean("enseignement");
            $table->integer("volumeHoraireDispense");
            $table->string("disciplineEnseigne");
            $table->string("cadre");
            $table->boolean("participationJury");
            $table->string("departement");
            $table->date("dateSoutenance");
            $table->string("themeSoutenance");
            $table->string("autreMotif");
            $table->date("dateDebutSejour");
            $table->string("dateFinSejour");
            $table->string("nomPrenomRequerant");
            $table->string("titreRequerant");
            $table->string("fonctionRequerant");
            $table->unsignedBigInteger("idOccupant");
            $table->foreign("idOccupant")->references("idOccupant")->on("occupant_maisons")->onDelete("cascade")->onUpdate("cascade");
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('demande_hebergements');
    }
}
