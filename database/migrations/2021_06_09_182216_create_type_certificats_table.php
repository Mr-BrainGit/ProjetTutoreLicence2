<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTypeCertificatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('type_certificats', function (Blueprint $table) {
            $table->id("idTypeCertificat");
            $table->string("libelleTypeCertificat");
            $table->string("fonctionSignataire");
            $table->string("idSignataire");


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('type_certificats');
    }
}
