<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle;

class VehicleController extends Controller
{
    public function create()
    {
        return view('vehicles.create');
    }

    public function store(Request $request)
    {
        // Valider les données
        $request->validate([
            'marque' => 'required|max:255',
            'numeroPlaque' => 'required|unique:vehicles|max:255',
            'modele' => 'required|max:255'
        ]);

        // Créer un nouveau véhicule
        Vehicle::create($request->all());

        // Rediriger avec un message de succès
        return redirect()->route('vehicles.create')->with('success', 'Véhicule ajouté avec succès !');
    }
    public function index()
{
    // Récupérer tous les véhicules
    $vehicles = Vehicle::all();
    
    // Passer les véhicules à la vue
    return view('vehicles.index', compact('vehicles'));
}
public function edit($id)
{
    // Trouver le véhicule par son ID
    $vehicle = Vehicle::findOrFail($id);

    // Retourner la vue de modification avec les données du véhicule
    return view('vehicles.edit', compact('vehicle'));
}

public function update(Request $request, $id)
{
    // Valider les données
    $request->validate([
        'license_plate' => 'required|max:255|unique:vehicles,license_plate,' . $id,
        'model' => 'required|max:255',
        'brand' => 'required|max:255',
        'capacity' => 'required|integer',
        'description' => 'nullable'
    ]);

    // Récupérer le véhicule et mettre à jour ses informations
    $vehicle = Vehicle::findOrFail($id);
    $vehicle->update($request->all());

    // Rediriger avec un message de succès
    return redirect()->route('vehicles.index')->with('success', 'Véhicule mis à jour avec succès !');
}

}
