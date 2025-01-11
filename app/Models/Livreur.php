<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Livreur extends Authenticatable
{
    use Notifiable;

    protected $fillable = ['name', 'email', 'password'];
    
    protected $hidden = ['password'];
    
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }
    // Livreur.php
// Dans le modèle Livreur
public function commandes()
{
    return $this->hasMany('App\Models\Ccommande');
}


}
