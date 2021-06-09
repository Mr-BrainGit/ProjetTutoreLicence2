<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDemandeAudiencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demande_audiences', function (Blueprint $table) {
            $table->id("idDemandeAudience");
            $table->date("dateDemande");
            $table->string("motif");
            $table->string("audienceAccorde");
            $table->date("dateAudience");
            $table->time("heureAudience");
            $table->unsignedBigInteger("idDemandeur");
            $table->timestamps();
            $table->foreign("idDemandeur")->references("idDemandeur")->on("demandeurs")->onDelete("cascade")->onUpdate("cascade");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('demande_audiences');
    }
}
