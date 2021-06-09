<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCongesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conges', function (Blueprint $table) {
            $table->id($colums = "idConge");
            $table->date("dateDebut");
            $table->date("dateFin");
            $table->unsignedBigInteger("idAnneScolaire");
            $table->string("matricule");
            $table->timestamps();
            $table->foreign("idAnneScolaire")->references("idAnneScolaire")->on("anne_scolaires")->onDelete("cascade")->onUpdate("cascade");
            $table->foreign("matricule")->references("matricule")->on("personnels")->onDelete("cascade")->onUpdate("cascade");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('conges');
    }
}
