<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('stagiaires', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenom');
            $table->string('cin');
            $table->string('etablissement');
            $table->string('filiere');
           
            
            $table->date('date_naissance');
            $table->string('telephone');
            $table->unsignedBigInteger('encadrent_id');
        $table->unsignedBigInteger('stage_id');
        $table->timestamps();

        // Define foreign key constraints
        $table->foreign('encadrent_id')->references('id')->on('encadrents')
            ->onDelete('cascade')->onUpdate('cascade');
        $table->foreign('stage_id')->references('id')->on('stages')
            ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_stagiaires');
    }
};
