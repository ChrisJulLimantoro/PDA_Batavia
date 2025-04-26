<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

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

        // dd($categories->toArray());
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

    public function show($id)
    {
        $product = Product::findOrFail($id);


        $productPrice = json_decode($product->price, true);

        // dd($productPrice);

        return view('productDetail', compact('product', 'productPrice'));
    }

    // RETURN CATEGORY
    public function searchByImage(Request $request)
    {
        $image = $request->file('image');

        // Validate the image
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Fetch API
        $result = Http::attach('file', file_get_contents($image), 'image.jpg')
            ->post('http://0.0.0.0:8000/predict');
        $response = json_decode($result->body(), true);
        return response()->json(['query' => $response['predicted_class']]);
    }

    // Return PRODUCT ID
    public function searchByGemini(Request $request)
    {
        $search = $request->input('search');
        $apiKey = env('GEMINI_API_KEY'); // Save your API Key in .env file
        $endpoint = "https://generativelanguage.googleapis.com/v1beta/models/gemini-2.0-flash:generateContent?key=".$apiKey;

        // Validate the search input
        $request->validate([
            'search' => 'required|string|max:255',
        ]);
        $products = $this->model->select('id', 'name', 'description')->get();
        $products = $products->map(function ($product) {
            return [
                'id' => $product->id,
                'name' => $product->name,
                'description' => $product->description,
            ];
        });

        $prompt = "
        I will provide a list of item names and descriptions for different kinds of batik, a
            traditional cloth from Indonesia. I will also provide a prompt containing what a
            user would like to create using the app. Based on those 2 prompts, give me a
            json list of ids of items that might suit the user's needs. [ONLY RETURN THE LIST OF IDS, DO NOT RETURN ANY OTHER TEXT, ATLEAST RETURN 1 ID CLOSEST TO THE PROMPT]
            Below is the dataset:
            ".json_encode($products)."

            Here is the prompt:
            ".$search;
        dd($prompt);

        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
        ])->post($endpoint, [
            'contents' => [
                [
                    'parts' => [
                        [
                            'text' => $prompt
                        ]
                    ]
                ]
            ]
        ]);
        $responseBody = json_decode($response->body(), true);

        // Access the candidates and the text field containing the JSON
        $jsonString = $responseBody['candidates'][0]['content']['parts'][0]['text'];

        // Remove the triple backticks (if necessary)
        $jsonString = trim($jsonString, "```");

        // Decode the JSON string
        $decodedJson = json_decode($jsonString, true);
        // Fetch the products based on the decoded JSON
        if($decodedJson){
            $res = $this->model
            ->with(['categories'])
            ->whereIn('id', $decodedJson)->get();
            return response()->json($res);
        }else{
            return response()->json([]);
        }
    }
}
