<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Ccommande extends Model
{
    use HasFactory;

    // Table associée
    protected $table = 'commande';

    // Clé primaire
    protected $primaryKey = 'id_commande'; // Si la clé primaire est 'id_commande' au lieu de 'id'

    public $incrementing = true; // La clé primaire est auto-incrémentée
    protected $keyType = 'int'; // Type de la clé primaire

    // Connexion à la base de données
    protected $connection = 'mysql';

    // Colonnes modifiables
    protected $fillable = [
        'type_colis',
        'durabilite',
        'poids_colis',
        'description',
        'date_de_livraison',
        'heure_livraison',
        'lieu_livraison',
        'user_id',    // Client associé à la commande
        'vehicle_id', // Véhicule assigné
        'livreur_id', // Livreur assigné
    ];

    // Relations
    /**
     * Relation avec le modèle User (Client).
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id'); // 'id' correspond à la clé primaire du modèle User
    }

    /**
     * Relation avec le modèle Vehicle.
     */
    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class, 'vehicle_id', 'id'); // 'id' correspond à la clé primaire du modèle Vehicle
    }

    /**
     * Relation avec le modèle Livreur.
     */
    public function livreur()
    {
        return $this->belongsTo(Livreur::class, 'livreur_id', 'id'); // 'id' correspond à la clé primaire du modèle Livreur
    }
   

}
