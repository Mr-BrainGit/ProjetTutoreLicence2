<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonnelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personnels', function (Blueprint $table) {
            $table->string("matricule")->primary();
            $table->string("nom");
            $table->string("prenom");
            $table->date("dateNaissance");
            $table->string("adresse");
            $table->string("sexe");
            $table->string("telephone");
            $table->string("email");
            $table->boolean("EnService");
            $table->string("diplome");
            $table->unsignedBigInteger("idFonction");
            $table->unsignedBigInteger("idCategorieP");
            $table->foreign("idFonction")->references("idFonction")->on("fonctions")->onDelete("cascade")->onUpdate("cascade");
            $table->foreign("idCategorieP")->references("idCategorieP")->on("categorie_personnels")->onDelete("cascade")->onUpdate("cascade");
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
        Schema::dropIfExists('personnels');
    }
}
