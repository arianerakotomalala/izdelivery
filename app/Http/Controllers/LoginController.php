<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommandeRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
        //affichage de la form blades connexion
        public function blade_login(){
            return view('client.login');
        }

        //connexion
        public function login(Request $request)
        {
            $credentials = $request->validate([
                'email' => 'required|email',
                'password' => 'required|string'
            ]);
            //authentification donne
            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
                return redirect()->intended(route('client.acceuil'))->with('success', 'Bienvenue chez IZ\'DELIVERY');
            }
    
            // refa tsy mety ilay login
            return back()->withErrors([
                'email' => 'les informations que vous avez entrees sont incorectes.',
            ])->onlyInput('email');
        }
    
        //deconnexion
        public function deconnexion(Request $request)
        {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
    
            return redirect('/login')->with('success', 'Vous etes deconnecte !!');
        }
    }
    
