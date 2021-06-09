<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNoteServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('note_services', function (Blueprint $table) {
            $table->id("idNoteS");
            $table->string("libelleNoteS");
            $table->text("corpsNoteS");
            $table->unsignedBigInteger("idSignataire");
            $table->timestamps();
            $table->foreign("idSignataire")->references("idSignataire")->on("signataires")->onDelete("cascade")->onUpdate("cascade");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('note_services');
    }
}
