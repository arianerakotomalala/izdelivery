<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommandeRequest;
use App\Models\Ccommande;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CclientController extends Controller
{
    // Accueil
    public function blade_acceuil(): View
    {
        return view('client.acceuil');
    }

    // Commandes
    public function blade_commander()
    {
        return view('client.commander');
    }

    public function action_commander(Request $request)
    {
        if (!auth('web')->check()) {
            return redirect()->route('login')->with('error', 'Vous devez être connecté pour passer une commande.');
        }
        // Validation des données du formulaire
        $validator = Validator::make($request->all(), [
            'type_colis' => 'required|string|max:255',
            'durabilite' => 'required|numeric',
            'description' => 'required|string|max:255',
            'date_de_livraison' => 'required|date',
            'heure_livraison' => 'required|string|max:255',
            'poids_colis' => 'required|string|max:255',
            'lieu_livraison' => 'required|string|max:255',
        ]);
        
    
        // Si la validation échoue, renvoyer les erreurs à la vue
        if ($validator->fails()) {
            return redirect()->route('client.commander.form')
                ->withErrors($validator)
                ->withInput();
        }
    
        // Insertion dans la base de données
        $commande = new Ccommande();
        $commande->user_id = auth('web')->user()->id; // Utiliser le guard 'web' pour récupérer l'ID
        $commande->type_colis = $request->input('type_colis');
        $commande->durabilite = $request->input('durabilite');
        $commande->description = $request->input('description');
        $commande->date_de_livraison = $request->input('date_de_livraison');
        $commande->heure_livraison = $request->input('heure_livraison');
        $commande->poids_colis = $request->input('poids_colis');
        $commande->lieu_livraison = $request->input('lieu_livraison');
        $commande->save();
    
        // Redirection après l'insertion
        return redirect()->route('client.commander.form')->with('success', 'Commande enregistrée avec succès.');
    }
    
    // Conditions de collaboration
    public function condition()
    {
        return view('client.condition');
    }

    // À propos
    public function propos()
    {
        return view('client.propos');
    }
}
