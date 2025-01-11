<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiclesTable extends Migration
{
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('marque')->unique(); // Numéro d'immatriculation
            $table->string('modele');
            $table->string('numeroPlaque');
            $table->timestamps();
        });
    
    }

    public function down()
    {
        Schema::dropIfExists('vehicles');
    }
}
