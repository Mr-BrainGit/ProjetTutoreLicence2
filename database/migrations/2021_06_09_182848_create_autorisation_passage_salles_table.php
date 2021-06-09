<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAutorisationPassageSallesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('autorisation_passage_salles', function (Blueprint $table) {
            $table->id("idAutorisationPS");
            $table->date("dateDemande");
            $table->string("motif");
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
        Schema::dropIfExists('autorisation_passage_salles');
    }
}
