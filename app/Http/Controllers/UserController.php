<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Affiche la liste des utilisateurs
    public function index()
    {
        $users = User::all(); // Récupère tous les utilisateurs
        return view('users.index', compact('users'));
    }

    // Affiche le formulaire pour créer un nouvel utilisateur
    public function create()
    {
        return view('users.create');
    }

    // Enregistre un nouvel utilisateur
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed', // Confirmer le mot de passe
        ]);

        // Crée un nouvel utilisateur
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password), // Cryptage du mot de passe
        ]);

        return redirect()->route('users.index')->with('success', 'Utilisateur créé avec succès');
    }

    // Affiche les détails d'un utilisateur
    public function show($id)
    {
        $user = User::findOrFail($id); // Récupère un utilisateur par son ID
        return view('users.show', compact('user'));
    }

    // Valider un utilisateur
    public function validerClient($id)
    {
        $user = User::findOrFail($id);

        // Si l'utilisateur est déjà validé
        if ($user->is_valid) {
            return redirect()->route('users.index')->with('warning', 'Cet utilisateur est déjà validé.');
        }

        // Valider l'utilisateur
        $user->update(['is_valid' => true]);

        return redirect()->route('users.index')->with('success', 'Utilisateur validé avec succès.');
    }

    // Désactiver un utilisateur (par exemple, suspendre l'utilisateur)
    public function suspend($id)
    {
        $user = User::findOrFail($id);

        // Suspendre l'utilisateur (par exemple, le rendre inactif)
        $user->update(['is_valid' => false]);

        return redirect()->route('users.index')->with('success', 'Utilisateur suspendu avec succès.');
    }
}
