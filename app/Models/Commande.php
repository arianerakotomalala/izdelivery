<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;
    protected $table='commande';
    protected $fillable=[
        'type_colis',
        'durabilite',
        'poids_colis',
        'description',
        'date_de_livraison',
        'heure_livraison',
        'lieu_livraison'
    ];
}
