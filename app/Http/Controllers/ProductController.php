<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends BaseController
{
    public function __construct(\App\Models\Product $model)
    {
        parent::__construct($model);
    }

    public function index()
    {
        // Fetch categories excluding specific names
        $categories = Category::whereNotIn('name', ['Sumatera', 'Jawa', 'Bali', 'Kalimantan', 'Sulawesi', 'Papua', 'Nusa Tenggara', 'Maluku'])->get();

        // Fetch regions (Sumatera, Jawa, Bali, etc.)
        $origins = Category::whereIn('name', ['Sumatera', 'Jawa', 'Bali', 'Kalimantan', 'Sulawesi', 'Papua', 'Nusa Tenggara', 'Maluku'])->get();

        // Assuming you have a Product model to get the products
        $products = Product::all();

        // Calculate min and max prices from the first moq (price) in the array
        $prices = $products->map(function ($product) {
            // Decode the price JSON data
            $priceData = json_decode($product->price, true);

            // Get the first price based on the first MOQ value
            return $priceData[0]['price'] ?? null;
        });

        // Remove null values in case there's any product with no price
        $prices = $prices->filter();

        // Calculate the minimum and maximum price
        $minPrice = $prices->min();
        $maxPrice = $prices->max();

        // Debugging output
        // dd($categories, $origins, $minPrice, $maxPrice);

        return view('searchProduct', compact('categories', 'origins', 'minPrice', 'maxPrice'));
    }

    public function getProducts(Request $request)
    {
        // Get parameters from the request
        $search = $request->input('search');
        $categories = $request->input('categories'); // array of category ids
        $origins = $request->input('origins'); // array of vendor ids
        $maxPrice = $request->input('max_price'); // integer

        // Ambil semua produk
        $products = $this->getAll();

        // Filter by search (name)
        if ($search) {
            $products = $products->filter(function ($product) use ($search) {
                return stripos($product['name'], $search) !== false;
            });
        }

        // Filter by categories
        if ($categories) {
            $products = $products->filter(function ($product) use ($categories) {
                foreach ($product['categories'] as $category) {
                    if (in_array($category['id'], $categories)) {
                        return true;
                    }
                }
                return false;
            });
        }

        // Filter by origins (category id for origin)
        if ($origins) {
            $products = $products->filter(function ($product) use ($origins) {
                foreach ($product['categories'] as $origin) {
                    if (in_array($origin['id'], $origins)) {
                        return true;
                    }
                }
                return false;
            });
        }

        // Filter by max price
        if ($maxPrice) {
            $products = $products->filter(function ($product) use ($maxPrice) {
                $prices = json_decode($product['price'], true);
                if (is_array($prices)) {
                    foreach ($prices as $priceItem) {
                        if (isset($priceItem['price']) && $priceItem['price'] <= $maxPrice) {
                            return true;
                        }
                    }
                }
                return false;
            });
        }

        // Reset array keys
        $products = $products->values();

        return response()->json($products);
    }

}
