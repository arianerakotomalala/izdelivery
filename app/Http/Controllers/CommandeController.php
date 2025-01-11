<?php

namespace App\Http\Controllers;

use App\Models\Ccommande;
use App\Models\Vehicle;
use App\Models\Livreur;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CommandeController extends Controller
{
    // Voir toutes les commandes (admin)
    public function index()
    {
        // Récupérer toutes les commandes avec leurs relations
        $commandes = Ccommande::with(['user', 'vehicle', 'livreur'])->get();

        return view('commande.index', compact('commandes'));
    }

    // Afficher le formulaire pour assigner un véhicule et un livreur
    public function assignerLivreurVehicule($id)
    {
        // Récupérer la commande ou retourner une erreur 404 si non trouvée
        $commande = Ccommande::findOrFail($id);

        // Récupérer les véhicules et livreurs disponibles
        $vehicles = Vehicle::all();
        $livreurs = Livreur::all();

        return view('commande.assign', compact('commande', 'vehicles', 'livreurs'));
    }

    // Enregistrer l'affectation
    public function assignerLivreurVehiculeStore(Request $request, $id)
    {
        // Valider les données du formulaire
        $request->validate([
            'vehicle_id' => 'required|exists:vehicles,id', // Assurez-vous que le véhicule existe
            'livreur_id' => 'required|exists:livreurs,id', // Assurez-vous que le livreur existe
        ]);

        // Récupérer la commande ou retourner une erreur 404 si non trouvée
        $commande = Ccommande::findOrFail($id);

        // Affecter le véhicule et le livreur à la commande
        $commande->vehicle_id = $request->vehicle_id;
        $commande->livreur_id = $request->livreur_id;

        // Sauvegarder les modifications
        $commande->save();

        // Rediriger avec un message de succès
        return redirect()->route('commande.index')->with('success', 'Livreur et véhicule assignés avec succès.');
    }

    // Afficher les détails d'une commande
    public function show($id)
    {
        // Récupérer la commande avec ses relations ou retourner une erreur 404
        $commande = Ccommande::with(['user', 'livreur', 'vehicle'])->findOrFail($id);

        return view('commande.show', compact('commande'));
    }
    public function afficherEmploiDuTemps()
{
    $startDate = Carbon::now()->startOfWeek(); // Lundi de la semaine en cours
    $endDate = Carbon::now()->endOfWeek();    // Dimanche de la semaine en cours

    // Récupérer les commandes entre les dates, groupées par livreur, date, et heure
    $emploiDuTemps = Ccommande::with('livreur')
        ->whereBetween('date_de_livraison', [$startDate, $endDate])
        ->orderBy('date_de_livraison')
        ->orderBy('heure_livraison')
        ->get()
        ->groupBy(function ($commande) {
            return $commande->livreur_id . '|' . $commande->date_de_livraison;
        });

    return view('livreurs.emploi_du_temps', compact('emploiDuTemps', 'startDate', 'endDate'));
}

}
