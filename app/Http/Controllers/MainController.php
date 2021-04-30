<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Produit;
use Illuminate\Http\Request;

class MainController extends Controller
{
    //
    public function accueil()
    {
        # code...
        //dd('accueil');
        //$user = User::orderByDesc('id')->first();
        //dd($user->isAdmin());
        /* $collect1 = collect(["orange", "banane", "avocat", "mangue"]);
        dd($collect1);*/
        $produits = Produit::all();
        $produitsFiltres = $produits->filter(function ($produit, $key) {
            return $produit->prix > 100000 && $produit->prix < 500000;
        });

        // dd($produitsFiltres);

        $produits = Produit::orderByDesc('id')->take(9)->get();

        return view('welcome', ['produits' => $produits]);
    }
}
