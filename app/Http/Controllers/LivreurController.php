<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\Livreur;
use App\Models\Ccommande;
use Illuminate\Http\Request;

class LivreurController extends Controller
{
    public function index()
    {
        $livreurs = Livreur::all();
        return view('livreurs.index', compact('livreurs'));
    }

    public function create()
    {
        return view('livreurs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:livreurs',
            'password' => 'required|string|min:8',
        ]);

        livreur::create($request->only('name', 'email', 'password'));
        
        return redirect()->route('livreurs.index')->with('success', 'Livreur ajouté avec succès');
    }

    public function edit(Livreur $livreurs)
    {
        return view('livreurs.edit', compact('livreurs'));
    }

    public function update(Request $request, Livreur $livreurs)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:livreurs,email,' . $livreurs->id,
        ]);

        if ($request->filled('password')) {
            $livreurs->password = bcrypt($request->password);
        }

        $livreurs->update($request->only('name', 'email'));
        
        return redirect()->route('livreurs.index')->with('success', 'Livreur mis à jour avec succès');
    }

    public function destroy(Livreur $livreurs)
    {
        $livreurs->delete();
        return redirect()->route('livreurs.index')->with('success', 'Livreur supprimé avec succès');
    }
    public function listeLivreurs()
    {
        // Charger les livreurs avec leurs commandes
        $livreurs = Livreur::with('commandes')->get();

        return view('livreurs.liste', compact('livreurs'));
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
public function afficherCommandes()
{
    // Récupérer les commandes avec les informations du livreur, triées par date et heure
    $commandes = Ccommande::with('livreur')
                          ->orderBy('date_de_livraison', 'asc')
                          ->orderBy('heure_livraison', 'asc')
                          ->get();

    // Passer les commandes à la vue
    return view('livreurs.commandes', compact('commandes'));
}
public function emploiDuTemps()
{
    // Charger toutes les commandes avec les livreurs associés
    $commandes = Ccommande::with('livreur')->orderBy('date_de_livraison')->orderBy('heure_livraison')->get();

    // Regrouper les commandes par date
    $emploiDuTemps = $commandes->groupBy('date_de_livraison');

    return view('livreurs.emploi_du_temps', compact('emploiDuTemps'));
}


}
