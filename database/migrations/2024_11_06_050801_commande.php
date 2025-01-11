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
        Schema::create('commande', function (Blueprint $table) {
            $table->id('id_commande');
            $table->string('durabilite'); // la fragilité et durabilité
            $table->integer('poids_colis');
            $table->string('description');
            $table->date('date_de_livraison');
            $table->time('heure_livraison');
            $table->unsignedBigInteger('user_id'); // ID du client qui a créé la commande
            $table->unsignedBigInteger('vehicle_id')->nullable(); // ID du véhicule assigné
            $table->unsignedBigInteger('livreur_id')->nullable(); // ID du livreur assigné

            // Clés étrangères
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('vehicle_id')->references('id')->on('vehicles')->onDelete('set null');
            $table->foreign('livreur_id')->references('id')->on('livreurs')->onDelete('set null');
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

