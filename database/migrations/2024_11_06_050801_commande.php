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
        Schema ::create('commande' ,function(Blueprint $tables){
            $tables ->id('id_commande');
            $tables->string('durabilite'); //la fragilite et durabilite
            $tables->integer('poids_colis');
            $tables->string('description');
            $tables->date('date_de_livraison');
            $tables->time('heure_livraison');
           
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commande');
    }
};
