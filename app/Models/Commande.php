<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'produit',
        'livreur_id',
        'vehicule_id',
        'status',
    ];
    

    public function livreur()
    {
        return $this->belongsTo(Livreur::class);
    }

    public function vehicule()
    {
        return $this->belongsTo(Vehicle::class);
    }

    public function client()
    {
        return $this->belongsTo(User::class);
    }
    
}

