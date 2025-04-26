<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Batik',
                'description' => 'Batik is a traditional Indonesian cloth that is made using a wax-resist dyeing technique. It is known for its intricate patterns and vibrant colors, and is often used to make clothing, accessories, and home decor items.',
            ],
            [
                'name' => 'Tenun',
                'description' => 'Tenun is a traditional Indonesian weaving technique that produces intricate and colorful textiles. It is often used to make clothing, accessories, and home decor items, and is known for its unique patterns and textures.',
            ],
            [
                'name' => 'Sulam',
                'description' => 'Sulam is a traditional Indonesian embroidery technique that involves stitching intricate designs onto fabric. It is often used to embellish clothing, accessories, and home decor items, and is known for its vibrant colors and detailed patterns.',
            ],
            [
                'name' => 'Tritik',
                'description' => 'Tritik is a traditional Indonesian textile technique that involves tying and dyeing fabric to create intricate patterns. It is often used to make clothing, accessories, and home decor items, and is known for its unique textures and colors.',
            ],
            [
                'name' => 'Sumatera',
                'description' => 'Sumatera is an island in Indonesia known for its rich cultural heritage and diverse textile traditions.'
            ],
            [
                'name' => 'Jawa',
                'description' => 'Jawa is an island in Indonesia known for its rich cultural heritage and diverse textile traditions.'
            ],
            [
                'name' => 'Bali',
                'description' => 'Bali is an island in Indonesia known for its rich cultural heritage and diverse textile traditions.'
            ],
            [
                'name' => 'Kalimantan',
                'description' => 'Kalimantan is an island in Indonesia known for its rich cultural heritage and diverse textile traditions.'
            ],
            [
                'name' => 'Sulawesi',
                'description' => 'Sulawesi is an island in Indonesia known for its rich cultural heritage and diverse textile traditions.'
            ],
            [
                'name' => 'Papua',
                'description' => 'Papua is an island in Indonesia known for its rich cultural heritage and diverse textile traditions.'
            ],
            [
                'name' => 'Nusa Tenggara',
                'description' => 'Nusa Tenggara is a group of islands in Indonesia known for its rich cultural heritage and diverse textile traditions.'
            ],
            [
                'name' => 'Maluku',
                'description' => 'Maluku is a group of islands in Indonesia known for its rich cultural heritage and diverse textile traditions.'
            ],
            ];
        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
