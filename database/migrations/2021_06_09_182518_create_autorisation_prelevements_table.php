<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAutorisationPrelevementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('autorisation_prelevements', function (Blueprint $table) {
            $table->id("idAutorisationP");
            $table->string("libelleAutorisation");
            $table->date("datePriseEffet");
            $table->date("dateEtablissement");
            $table->integer("montantChiffer");
            $table->string("montantLettre");
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
        Schema::dropIfExists('autorisation_prelevements');
    }
}
