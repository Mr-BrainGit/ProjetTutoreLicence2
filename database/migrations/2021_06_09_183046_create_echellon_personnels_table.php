<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEchellonPersonnelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('echellon_personnels', function (Blueprint $table) {
            $table->string("matricule");
            $table->unsignedBigInteger("idEchellon");
            $table->date("dateObtention");
            $table->foreign("matricule")->references("matricule")->on("personnels")->onDelete("cascade")->onUpdate("cascade");
            $table->foreign("idEchellon")->references("idEchellon")->on("echellons")->onDelete("cascade")->onUpdate("cascade");
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
        Schema::dropIfExists('echellon_personnels');
    }
}
