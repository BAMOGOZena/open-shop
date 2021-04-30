<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       Category::create([
           "libelle" => "Materiels Electroniques",
           'description'=>'Ceci est la description des Matériels Electroniques',
       ]);

       Category::create([
        "libelle" => " Vetements",
        'description'=>'Ceci est la description des vêtements',
    ]);

    Category::create([
        "libelle" => "Cosmetiques",
        'description'=>'Ceci est la description de cosmétiques',
    ]);
    }
}
