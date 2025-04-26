<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\Vendor;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Example categories and origins
        $categories = ['Batik', 'Tenun', 'Sulam', 'Tritik'];
        $origins = ['Sumatera', 'Jawa', 'Bali', 'Kalimantan', 'Nusa Tenggara', 'Sulawesi', 'Maluku', 'Papua'];

        // Seed multiple products
        foreach (range(1, 50) as $index) {
            $productName = $faker->word . ' ' . $faker->word;
            $priceOptions = [
                [
                    'price' => $faker->numberBetween(100000, 500000),
                    'moq' => 1,
                ],
                [
                    'price' => $faker->numberBetween(800000, 1200000),
                    'moq' => 10,
                ],
                [
                    'price' => $faker->numberBetween(1500000, 2000000),
                    'moq' => 50,
                ],
                [
                    'price' => $faker->numberBetween(3000000, 5000000),
                    'moq' => 100,
                ],
            ];

            // Insert product into the database
            $product = Product::create([
                'name' => $productName,
                'description' => $faker->sentence(10),
                'price' => json_encode($priceOptions),
                'image' => 'https://via.placeholder.com/150?text=Product+' . $index,
            ]);

            // Attach random categories to the product
            $randomCategories = $faker->randomElements($categories, $faker->numberBetween(1, 2));
            $categoriesToAttach = Category::whereIn('name', $randomCategories)->get();
            $product->categories()->attach($categoriesToAttach->pluck('id'));

            // Attach origin as a category too
            $randomOrigin = $faker->randomElement($origins);
            $originCategory = Category::where('name', $randomOrigin)->first();
            if ($originCategory) {
                $product->categories()->attach($originCategory->id);
            }
        }
    }
}
