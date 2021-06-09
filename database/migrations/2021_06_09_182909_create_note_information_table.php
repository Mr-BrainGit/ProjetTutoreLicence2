<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNoteInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('note_information', function (Blueprint $table) {
            $table->id("idNoteI");
            $table->string("destinataire");
            $table->text("description");
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
        Schema::dropIfExists('note_information');
    }
}
