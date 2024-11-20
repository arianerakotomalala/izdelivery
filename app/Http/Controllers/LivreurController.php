<?php

namespace App\Http\Controllers;

use App\Models\Livreur;
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
}
