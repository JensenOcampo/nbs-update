<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['title', 'description', 'image', 'price', 'image', 'quantity', 'price', 'category_id'];

    public function index()
    {
        $products = Product::all(); // Fetch all products
        return view('guest.index', compact('products'));
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
