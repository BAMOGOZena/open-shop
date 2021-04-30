<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Produit;
use App\Models\Category;
use Illuminate\Http\Request;

class FormationController extends Controller
{
    public function index()
    {
        /*$produits = Produit::all();
        $produit= Produit::first();
        //$produit2 = Produit::where('id',2)->first(); id=2
        //$produit2 = Produit::where('prix',500000)->get(); prix=500000
       // $produit2 = Produit::where('prix','<', 500000)->get(); prix<500000
       //$produit2 = Produit::where(['prix'=>500000,'quantite'=>50])->get();
       $produit2 = Produit::where('prix','<', 500000)->where('quantite', '!=', 50)->get();
        dd($produit2);*/
       /* $produit1 = Produit::first();
        $category1 = Category::first();//on recupere notre premiere category
        $produit1->category_id = $category1->id;//on affecte une category a produit1
        $produit1->save();//et on enregistre
       // dd($produit1->category);
        dd($category1->produits);*/
         //$produit1 = Produit::all();
    //gestion des migration
    $produit1 = Produit::first();
    $user1 = User::first();
    $user1->produits()->attach($produit1);
    dd($produit1->users);
    dd($user1->produits);
    $categorie1 = Category::first();
    $produit1->categorie_id = $categorie1->id;
    //$produit2 = Produit::where(['prix'=>8000, 'quantite' => 50])->get();
    $produit1->save();
    dd($categorie1->produits);
    dd($produit1->categorie);
    }
    //
    public function ajouterProduit()
    {
        # code...
        $produit = new Produit();

        $produit->designation = 'Maxwell';
        $produit->prix = 8000;
        $produit ->description= "Maxwell c'est un super café!";
        $produit->quantite = 50;
        $produit->save();

        dd($produit);

    }
    public function ajouterproduit2()
    {
        # code...
        $produit = Produit::create([
            'designation'=>'ordinateur',
            'prix'=>500000,
            'description' => 'Une très bonne machine',
            'quantite' => 30,
        ]);

        dd($produit);
    }
    public function updateProduit()
    {
        $produit1 = Produit ::first();
        $produit1->designation = 'avovita';
        $produit1->prix = 1800;
        $produit1->description = 'pommade feminine';
        $produit1->quantite = 10;
        $produit1 ->save();

        dd($produit1);

    }
    /*public function updateProduit2()
    {
        $produit2 = Produit::find(2);
        dd($produit2);


    }*/
    /*public function updateProduit2($id)
    {
        $produit2 = Produit::findOrfail($id);
        dd($produit2);


    }*/
    public function updateProduit2(Produit $produit)
    {

        //dd($produit->designation);

        $result= Produit::where('id', $produit->id)->update([
            'designation'=>'Téléphone',
            'prix' => 50000,
            'description'=>'Ceci est la description de téléphone',
            'quantite' => 26,


        ]);
        dd($result, $produit->designation);

    }

    public function suppressionProduit()
    {
        $result = Produit::destroy(1);
        dd($result);
    }

}
