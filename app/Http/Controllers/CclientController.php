<?php
namespace App\Http\Controllers;
use App\Http\Requests\CommandeRequest;
use App\Models\Commande;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class CclientController extends Controller
{
//acceuil 
    public function blade_acceuil():View {
    return view('client.acceuil');
}

//Commandes       
    public function blade_commander() {
        return view('client.commander');
    }

    public function action_commander(Request $request) {
        $nouveau_commmande= ([
            'durabilite' => $request['durabilite'],
            'poids_colis' => $request['poids_colis'],
            'description' => $request['description'],
            'date_de_livraison' => $request['date_de_livraison'],
            'heure_livraison' => $request['heure_livraison'],
            'type_colis' => $request['type_colis'],
            'lieu_livraison' => $request['lieu_livraison'],
        ]);
        
        Commande::create($nouveau_commmande);
        
        return redirect()->route('client.commander.form',['commandes'=>$nouveau_commmande])->with('success', 'Commande envoye avec succes, On arrive :)');
    }

//conditions de collaboration
    public function condition(){
        return view('client.condition');
    }


//a propos
    public function propos(){
        return view('client.propos');
    }
}
