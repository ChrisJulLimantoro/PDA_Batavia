<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\Vendor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => 'Kain Songket Aceh',
                'description' => 'Kain Songket Aceh adalah kain tradisional yang ditenun dengan benang emas atau perak, menciptakan pola yang indah dan berkilau.',
                'price' => json_encode(
                    [
                        [
                            'price' => 1000000,
                            'moq' => 1,
                        ],
                        [
                            'price' => 900000,
                            'moq' => 10,
                        ],
                        [
                            'price' => 800000,
                            'moq' => 50,
                        ],
                        [
                            'price' => 700000,
                            'moq' => 100,
                        ],
                    ]
                ),
                'image' => 'https://example.com/image1.jpg',
            ]
        ];
        foreach ($products as $product) {
            Product::create($product);
        }

        // Attach categories to products
        $product = Product::where('name', 'Kain Songket Aceh')->first();
        $categories = Category::whereIn('name', ['Tenun', 'Sumatera'])->get();
        $product->categories()->attach($categories->pluck('id'));
        $vendors = Vendor::where('address', 'like', '%Aceh%')->get();
        $product->vendors()->attach($vendors->pluck('id'));
    }
}
