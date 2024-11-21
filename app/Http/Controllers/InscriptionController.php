<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use  App\Models\User;
use Illuminate\Support\Facades\Hash;

class InscriptionController extends Controller
{
    public function blade_inscription(){
        return view('client.inscription');
    }
    public function inscrire(Request $request){
        $user = ([
            'name' => $request['nom'],
            'prenom' => $request['prenom'],
            'email' => $request['email'],
            'tel' => $request['tel'],
            'local' => $request['local'],
            'password' => Hash::make($request['password']),
            'est_membre' => false,
        ]);
        DB::connection('mysql')->table('users')->insert($user);
        // User::create($user);
        return redirect()->route('inscrire.blade',['user'=>$user])->with('success', 'Nous avons recu vos demande ,on vous enverra un mail pour la confirmation de l\'inscription');
    }
}
