<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\FormationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [MainController::class, 'accueil'])->name('accueil');
Route::get('index', [FormationController::class,'index']);
Route::get('update-produit', [FormationController::class,'updateProduit']);
//Route::get('update-produit-2/{id}', [FormationController::class, 'updateProduit2']);
Route::get('update-produit-2/{produit}', [FormationController::class, 'updateProduit2']);
Route::get('suppression-produit', [FormationController::class, 'suppressionProduit']);
Route::resource('produits', ProduitController::class);

Route::get('ajouter-produit', [FormationController::class, 'ajouterProduit']);
Route::get('ajouter-produit-2', [FormationController::class, 'ajouterProduit2']);
