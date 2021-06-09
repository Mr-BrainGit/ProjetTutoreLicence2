<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAutorisationAbsencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('autorisation_absences', function (Blueprint $table) {
            $table->id("idAutorisationAb");
            $table->string("motifAbsence");
            $table->date("dateDepart");
            $table->date("dateRetour");
            $table->string("matricule");
            $table->timestamps();
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
        Schema::dropIfExists('autorisation_absences');
    }
}
