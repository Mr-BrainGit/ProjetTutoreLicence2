<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSignatairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('signataires', function (Blueprint $table) {
            $table->id("idSignataire");
            $table->string("nomCompletSignataire");
            $table->string("distinctionSignataire");
            $table->unsignedBigInteger("idFonctionSignataire");
            $table->timestamps();
            $table->foreign("idFonctionSignataire")->references("idFonction")->on("fonctions")->onDelete("cascade")->onUpdate("cascade");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('signataires');
    }
}
