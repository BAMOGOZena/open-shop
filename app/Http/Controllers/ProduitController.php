<?php

namespace App\Http\Controllers;

use auth;
use App\Models\User;
use App\Models\Produit;
use App\Models\Category;
use App\Mail\AjoutProduit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Notifications\NouveauProduit;
use App\Http\Requests\ProduitFormRequest;
use App\Http\Requests\ProduitAjoutFormRequest;
use App\Http\Requests\ProduitModifFormRequest;

class ProduitController extends Controller
{
    public function __contruct()
    {
        $this->midlleware(['auth', 'isAdmin'])->except(['index', 'show']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$produits = Produit::all();
        //$produits = Produit::orderByDesc('id')->paginate(15);
        $produits = Produit::paginate(15);

        return view('front-office.produits.index', ['produits' => $produits]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $produit = new Produit();
        return view('front-office.produits.create', compact('categories', 'produit'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProduitFormRequest $request)
    {

        // dd('test store');
        $imageName = "produit.png";
        if ($request->file('image')) {
            $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/produits', $imageName);
        }

        /* dd($request->file('image')->getClientOriginalName());

        $request->validate([
            "designation" => "required|min:5|max:50|unique:produits",
            "prix" => "required|numeric|between:1000,1000000",
            "quantite" => "required|numeric|between:5,5000",
            "description" => "nullable|max:255",
            "category_id" => "required|numeric",

        ]);*/
        //dd($request);
        // dd($request->all());
        // dd($request->designation, $request->prix, $request->quantite, $request->description);
        $produit = Produit::create([
            'designation' => $request->designation,
            'prix' => $request->prix,
            'category_id' => $request->category_id,
            'quantite' => $request->quantite,
            'description' => $request->description,
            'image' => $imageName,

        ]);

        $user = User::first();
        // $produit = Produit::orderByDesc('id')->first();
        Mail::to($user)->send(new AjoutProduit($produit));


        return redirect()->route('produits.show', $produit)->with("statut", "Votre nouveau produit a été bien ajouté");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Produit $Produit)
    {
        return view('front-office.produits.show', [
            "produit" => $Produit
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Produit $produit)
    {
        $categories = Category::all();
        return view('front-office.produits.edit', ['produit' => $produit, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProduitFormRequest $request, $id)
    {
        // $request->validate([
        //     "designation" => "required|min:5|max:50|unique:produits,designation," . $this->produit,
        //     // "designation" => "required|min:5|max:50|unique:produits",
        //     "prix" => "required|numeric|between:1000,1000000",
        //     "quantite" => "required|numeric|between:5,5000",
        //     "description" => "nullable|max:255",
        //     "category_id" => "required|numeric",

        // ]);

        Produit::where('id', $id)->update([
            'designation' => $request->designation,
            'prix' => $request->prix,
            'quantite' => $request->quantite,
            'description' => $request->description,
            'category_id' => $request->category_id,

        ]);

        $user = User::first();
        $produit = Produit::orderByDesc('id')->first();
        $user->notify(new NouveauProduit($produit));

        return redirect()->route("produits.show", $id)->with('statut', 'Votre produit à bien été modifié');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Produit::destroy($id);
        return redirect()->route('produits.index')->with('statut', 'Votre produit à bien été supprimé');
    }
}
