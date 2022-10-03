<?php

namespace App\Http\Controllers;

use App\Models\voitures;
use Illuminate\Http\Request;

class VoituresController extends Controller
{
    public function Voitures(){
        $voitures = Voitures::all();
        $voitureCheap = Voitures::where("prix", "<=","4000")->get();
        $voitureChere = Voitures::where("prix", ">=","4000")->get();
        return view('home', compact('voitures', 'voitureCheap', 'voitureChere'));
    }

    public function store(Request $request){
        $voiture = new Voitures;
        $voiture -> marque = $request -> marque;
        $voiture -> annee = $request -> annee;
        $voiture -> couleur = $request -> couleur;
        $voiture -> prix = $request -> prix;
        $voiture -> reduction = $request -> reduction;
        $voiture -> save();
        return redirect('/');

    }

    public function destroy($id){
        $destroy = Voitures::find($id);
        $destroy -> delete();
        return redirect()-> back();
    }
}
