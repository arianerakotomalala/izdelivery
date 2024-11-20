<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use App\Models\Livreur;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class CommandeController extends Controller
{
    public function index()
    {
        $commandes = Commande::with('livreur', 'vehicule', 'client')->get();
        return view('commande.index', compact('commandes'));
    }

    public function assignerLivreurVehicule($id)
    {
        $commande = Commande::findOrFail($id);
        $livreurs = Livreur::all();
        $vehicules = Vehicle::all();
        return view('commande.assign', compact('commande', 'livreurs', 'vehicules'));
    }

    public function assignerLivreurVehiculeStore(Request $request, $id)
    {
        $request->validate([
            'livreur_id' => 'required|exists:livreurs,id',
            'vehicule_id' => 'required|exists:vehicules,id',
        ]);

        $commande = Commande::findOrFail($id);
        $commande->livreur_id = $request->livreur_id;
        $commande->vehicule_id = $request->vehicule_id;
        $commande->status = 'en cours';
        $commande->save();

        return redirect()->route('commande.index')->with('success', 'Livreur et véhicule assignés à la commande.');
    }
    public function createCommande()
    {
        Commande::create([
            'client_id' => 1, // Remplacez par un ID valide de client
            'produit' => 'Produit D',
            'livreur_id' => 2, // Remplacez par un ID valide de livreur
            'vehicule_id' => 1, // Remplacez par un ID valide de véhicule
            'status' => 'en attente',
        ]);

        return response()->json(['message' => 'Commande créée avec succès']);
    }
}
