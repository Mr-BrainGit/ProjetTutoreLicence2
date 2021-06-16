<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCertificatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('certificats', function (Blueprint $table) {
            $table->id("idCertificat");
            $table->string("fonctionPrecedente");
            $table->string("fonctionActuelle");
            $table->string("structurePrecedente");
            $table->string("structureActuelle");
            $table->string("decision");
            $table->date("date");
            $table->string("matricule");
            $table->unsignedBigInteger("idTypeCertificat");
            $table->foreign("matricule")->references("matricule")->on("personnels")->onDelete("cascade")->onUpdate("cascade");
            $table->foreign("idTypeCertificat")->references("idTypeCertificat")->on("type_certificats")->onDelete("cascade")->onUpdate("cascade");
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('certificats');
    }
}
