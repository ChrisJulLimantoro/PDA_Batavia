<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends BaseController
{
    public function __construct(Product $model)
    {
        parent::__construct($model);
    }

    public function index()
    {
        // Fetch categories excluding specific ones
        $categories = Category::whereNotIn('name', ['Sumatera', 'Jawa', 'Bali', 'Kalimantan', 'Sulawesi', 'Papua', 'Nusa Tenggara', 'Maluku'])->get();

        // Fetch regions (Sumatera, Jawa, Bali, etc.)
        $origins = Category::whereIn('name', ['Sumatera', 'Jawa', 'Bali', 'Kalimantan', 'Sulawesi', 'Papua', 'Nusa Tenggara', 'Maluku'])->get();

        // Fetch products (if needed)
        $products = Product::orderBy('created_at', 'desc')->take(3)->get();
        $products->each(function ($product) {
            $product->price = json_decode($product->price, true);  // Assuming it's a JSON array
        });


        return view('home', compact('categories', 'origins', 'products'));
    }
}
