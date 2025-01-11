<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('users', function (Blueprint $table) {
        $table->string('tel')->nullable(); // Numéro de téléphone
        $table->string('local')->nullable(); // Localisation
        $table->boolean('est_membre')->default(0); // Indicateur de membre
    });
}

public function down()
{
    Schema::table('users', function (Blueprint $table) {
        $table->dropColumn(['tel', 'local', 'est_membre']);
    });
}

};
