<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
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

        $products = [
            [
                'name' => 'Batik Besurek',
                'description' => 'Besurek" means "with letters" or "written". This batik distinctively features Arabic calligraphy, often verses from the Quran (sometimes stylized to the point of abstraction), combined with local motifs like the Rafflesia Arnoldii flower (Bengkulu\'s iconic giant flower), birds, or geometric patterns. It represents the strong Islamic influence in the region blended with local identity. Traditionally used for customary ceremonies (upacara adat), religious events, and formal occasions. It\'s a symbol of Bengkulu\'s cultural heritage.',
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
                'image' => 'https://www.batikprabuseno.com/artikel/wp-content/uploads/2024/02/Batik-Arab-Bengkulu.jpg',
            ],
            [
                'name' => 'Batik Jambi',
                'description' => 'Jambi batik often features motifs inspired by local flora and fauna. The iconic Angso Duo (Two Swans) motif is linked to the legend of the founding of Jambi city, representing harmony, perseverance, and the journey of seeking knowledge or a new home. Other motifs include Durian Pecah (Split Durian) symbolizing abundance, and various plant motifs. Colors were traditionally subdued but now include brighter variations. Worn during traditional Jambi ceremonies, formal events, and sometimes incorporated into everyday wear or official attire in the province.',
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
                'image' => 'https://asset.kompas.com/crops/_8cyPl7Srn5yRULFg6UlPthMyCQ=/0x111:1440x1071/750x500/data/photo/2022/08/12/62f5ddd7eaba8.png',
            ],
            [
                'name' => 'Batik Tanah Liek',
                'description' => 'Unique for its traditional dyeing process using tanah liek (clay) which yields distinct earthy tones (browns, creams, greys). Motifs often draw from Minangkabau culture and nature, such as kaluak paku (fern tendrils, symbolizing resilience and community ties), pucuak rabuang (bamboo shoots, symbolizing usefulness from a young age), and motifs reflecting Rumah Gadang (traditional house) architecture. It represents the connection to the earth and Minangkabau adat (customary law). Primarily used for traditional Minangkabau ceremonies, worn by elders, community leaders (penghulu), or during significant cultural events like weddings.',
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
                'image' => 'https://rumpuntekno.com/assets/mitra/9/2016/06/batik.jpg',
            ],
            [
                'name' => 'Batik Madura',
                'description' => 'Known for its bold, expressive lines and vibrant, striking colors (often red, yellow, green, blue). Motifs are diverse, including flowers, birds (like the peacock), and abstract patterns, often with less adherence to strict rules compared to Central Javanese batik. Gentongan refers to a specific type where the fabric is soaked in large earthenware pots (gentong) for dyeing, giving unique, deep colors. It reflects the assertive and expressive character of the Madurese people. Widely used for both everyday wear and special occasions. Its bright colors make it popular for festive events.',
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
                'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTplb7BqNxon0TDapiEiVF2wHC8n5vbeFOupw&s',
            ],
            [
                'name' => 'Batik Tuban',
                'description' => 'Often characterized by darker, earthier colors like indigo blue, dark brown, black, and cream, reflecting ancient Javanese aesthetics. Motifs frequently show influences from Chinese culture (due to Tuban\'s history as a port), such as phoenix (lok can), dragon-like creatures, alongside Javanese motifs like birds and stylized plants. Gedog refers to the traditional hand-woven cotton fabric often used as the base. It represents Tuban\'s historical multicultural interactions. Often characterized by darker, earthier colors like indigo blue, dark brown, black, and cream, reflecting ancient Javanese aesthetics. Motifs frequently show influences from Chinese culture (due to Tuban\'s history as a port), such as phoenix (lok can), dragon-like creatures, alongside Javanese motifs like birds and stylized plants. Gedog refers to the traditional hand-woven cotton fabric often used as the base. It represents Tuban\'s historical multicultural interactions.',
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
                'image' => 'https://www.batikprabuseno.com/artikel/wp-content/uploads/2023/02/ss-01.png',
            ],
            [
                'name' => 'Batik Banyuwangi',
                'description' => 'The most famous motif is Gajah Oling, whose exact form is debated (sometimes seen as an elephant-like trunk, a mythical creature, or a specific flower pattern). It generally symbolizes greatness, remembrance of ancestors, and the unique identity of the Osing culture. Other Banyuwangi motifs include Kangkung Setingkes (bound water spinach) and Paras Gempal (solid rock). Integral to Osing traditional ceremonies, weddings, and cultural performances. It serves as a strong marker of Banyuwangi regional identity.',
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
                'image' => 'https://cdn.rri.co.id/berita/Jember/o/1729430617874-Motik_Batik_Gajah_Oling/soq21mp9c1mx2b7.jpeg',
            ],
            [
                'name' => 'Batik Parang',
                'description' => 'One of the oldest and most sacred motifs, characterized by diagonal rows of "S" shapes, resembling waves hitting rocks or a slanting knife (parang). Parang Rusak (Broken Knife) symbolizes the continuous struggle against evil or temptation and the need for wisdom and self-control. Traditionally reserved for royalty, it represents power, continuity, and nobility. Worn during specific court ceremonies and formal Javanese events like weddings (though certain variations like Parang Rusak were historically forbidden for the bride and groom). Still considered a very formal and classic pattern.',
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
                'image' => 'https://sonobudoyo.jogjaprov.go.id/resource/uploads/img/news/header_Screen_Shot_2024-10-06_at_18_37_53.png',
            ],
            [
                'name' => 'Batik Kawung',
                'description' => 'Features a pattern of intersecting circles or ovals, often said to represent the fruit of the aren palm tree or cross-sections of fruit like the kolang-kaling. It symbolizes purity, perfection, justice, power, and the hope that the wearer will be beneficial to society. It\'s another ancient motif once reserved for the royal family. Used for formal occasions and traditional Javanese ceremonies. It carries connotations of structure, order, and high status.',
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
                'image' => 'https://budaya.jogjaprov.go.id/view_image/view/4254/Filosofi_batik_kawung.width-800.jpg',
            ],
            [
                'name' => 'Batik Truntum',
                'description' => 'Characterized by small, repeating star-like or flower bud motifs scattered across the cloth (truntum means \'to sprout\' or \'blossom again\'). It symbolizes rekindled love, fertility, harmony, loyalty, and guidance. Legend states the Queen created it while feeling neglected, hoping to regain the King\'s affection. Famously worn by the parents of the bride and groom during traditional Javanese wedding ceremonies, symbolizing their enduring love and the hope that this love will "blossom" for the new couple.',
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
                'image' => 'https://www.batikprabuseno.com/artikel/wp-content/uploads/2022/12/wdwd-01.png',
            ],
            [
                'name' => 'Batik Cirebon',
                'description' => 'The iconic Mega Mendung (Cloudy Sky) motif shows clear Chinese influence, featuring stylized, layered cloud formations. Typically rendered in shades of blue or red against a contrasting background (white, cream, sometimes other colors). The clouds symbolize the heavens, transcendence, patience, and calmness. The seven layers sometimes seen represent the seven layers of the sky or earth. Extremely versatile; used for formal wear, traditional ceremonies, casual clothing, modern fashion, and decorative items. It\'s a major symbol of Cirebon.',
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
                'image' => 'https://static.cdntap.com/tap-assets-prod/wp-content/uploads/sites/24/2021/10/batik-tulis-com-2.jpg',
            ],
            [
                'name' => 'Batik Garutan',
                'description' => 'Known for its generally bright and cheerful color palettes, often using a cream or white background with vibrant motifs in colors like purple, green, orange, and red. Patterns frequently feature geometric shapes, diagonal compositions (lereng), and stylized local flora and fauna (e.g., Lereng Kangkung, bamboo). Reflects the natural beauty and Sundanese aesthetic of the Priangan region. Popular for semi-formal and everyday wear, often seen in women\'s kain (sarongs) and blouses. Valued for its elegance and brightness.',
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
                'image' => 'https://www.jelajahgarut.com/wp-content/uploads/2018/10/5-Motif-Batik-Garutan-bulu-Hayam.jpg',
            ],
            [
                'name' => 'Batik Tasikmalaya',
                'description' => 'Often features intricate details and motifs inspired by nature, such as birds (especially sparrows), butterflies, orchids, hibiscus, and landscapes, reflecting the Sundanese affinity with the natural world. Color palettes can range from softer, earthy tones similar to Central Java (browns, indigo, cream) to brighter Priangan colors. Batik Sukapura refers specifically to styles from this area. Used in traditional Sundanese clothing for ceremonies and formal events, as well as for everyday wear. Appreciated for its fine workmanship and nature-based designs.',
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
                'image' => 'https://batik-tulis.com/wp-content/uploads/2016/01/Batik-Sawoan-Motif-Parang-Sontak.jpg',
            ],
            [
                'name' => 'Batik Singa Barong',
                'description' => 'This batik prominently features the Singa Barong (Lion Barong), a mythical creature in Balinese Hinduism representing good spirits, protection, and righteousness. It\'s a symbol of strength and serves to ward off evil forces. While the Barong is purely Balinese, the batik technique itself was adopted and adapted. Often used in ceremonial attire, particularly for dancers or religious events involving the Barong. Also popular on decorative items and souvenirs reflecting Balinese spirituality.',
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
                'image' => 'https://batik-tulis.com/wp-content/uploads/2015/01/gambar-batik-cirebon-singa-barong-1200x849.jpg',
            ],
            [
                'name' => 'Batik Ulamsari Mas',
                'description' => 'Literally means "essence of golden fish/shrimp". The motif depicts fish (ulam) and shrimp or prawns (sari mas) often swimming amidst seaweed or water patterns. It represents prosperity, livelihood (especially for fishing communities), and the abundance of the sea surrounding Bali. Usually features bright, vivid colors. Popular for casual wear, beach attire, tablecloths, and souvenirs, reflecting Bali\'s island nature and connection to the ocean.',
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
                'image' => 'https://pdbifiles.nos.jkt-1.neo.id/files/2019/01/02/roro_ulamsari.png',
            ],
            [
                'name' => 'Batik Jagatan Pisang Bali',
                'description' => 'Features motifs inspired by the banana plant (pisang) - leaves, fruit bunches, or the heart/flower (jantung pisang). In Balinese culture, bananas are vital parts of religious offerings (banten). The motif can symbolize prosperity, fertility, life, and gratitude. Often combined with other Balinese elements like geometric patterns or small flowers. Used in fabrics for ceremonial purposes (e.g., as part of offerings, clothing for temple visits) and also adapted for everyday wear and decorative textiles. It connects to daily life and religious practice in Bali.',
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
                'image' => 'https://tjokrosuharto.com/19021-large_default/bbp-035-wiyar-yogya-kombinasi-printing-petilan-pisang-bali-bledak-sdi.jpg',
            ],
        ];
        foreach ($products as $product) {
            $prod = Product::create($product);
            

        // Attach random categories to the product
        $randomCategories = $faker->randomElements($categories, $faker->numberBetween(1, 2));
        $categoriesToAttach = Category::whereIn('name', $randomCategories)->get();
        $prod->categories()->attach($categoriesToAttach->pluck('id'));

        // Attach origin as a category too
        $randomOrigin = $faker->randomElement($origins);
        $originCategory = Category::where('name', $randomOrigin)->first();
        if ($originCategory) {
            $prod->categories()->attach($originCategory->id);
        }
    }
    }
}
