<?php

namespace App\Models;

use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Produit extends Model
{
    public $fillable = ['designation', 'prix', 'description', 'quantite', 'image', 'category_id'];

    use HasFactory;

    public function category()
    {
        return $this->belongsTo(Category::class);
    }


    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
