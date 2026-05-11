<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        Product::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        $products = [
            // === SIGNATURE / FEATURED ===
            [
                'name' => 'Rendang Daging Sapi',
                'slug' => 'rendang-daging-sapi',
                'subtitle' => 'The Crown Jewel of Minangkabau Cuisine',
                'description' => 'Our signature Rendang is slow-cooked for eight hours in a rich blend of coconut milk and 21 aromatic spices. Each piece of prime beef tenderloin is caramelized to perfection, achieving a dark, tender, and intensely flavorful finish that stays true to its West Sumatran roots.',
                'heritage_narrative' => "Originating from the Minangkabau highlands of West Sumatra, Rendang is more than just a dish; it is a symbol of patience, wisdom, and communal heritage. Traditionally prepared for grand ceremonies and honoring distinguished guests, its preparation reflects the philosophy of \"Musyawarah\" (consensus building).\n\nThe dark color comes from the caramelization of coconut milk, a process called 'maillard reaction' that transforms liquid ivory into a complex, savory nectar. Our recipe has been passed down through four generations of the Dapoer Nusantara family, using specific varieties of galangal and lemongrass sourced directly from local Indonesian farmers.",
                'price' => 145000,
                'original_price' => 185000,
                'category' => 'main',
                'region' => 'West Sumatra',
                'heat_level' => 'Medium Spicy',
                'cook_time' => '8-Hour Slow Cook',
                'key_ingredients' => ['Wagyu Beef Shank', 'Thick Coconut Cream', 'Red Bird\'s Eye Chili', 'Toasted Desiccated Coconut', '12-Spice Blend'],
                'image' => null,
                'is_featured' => true,
            ],
            [
                'name' => 'Sate Ayam Madura',
                'slug' => 'sate-ayam-madura',
                'subtitle' => 'Legendary Satay from the Island of Madura',
                'description' => 'Sate ayam khas Madura dengan bumbu kacang legendaris dan kecap manis berkualitas. Empuk dan kaya aroma.',
                'heritage_narrative' => 'Madura Island is famous throughout Indonesia for its legendary satay. Tender chicken skewers grilled over coconut shell charcoal, served with a rich peanut sauce made from freshly ground roasted peanuts, kecap manis, and a blend of aromatic spices.',
                'price' => 85000,
                'original_price' => null,
                'category' => 'main',
                'region' => 'Central Java',
                'heat_level' => 'Mild',
                'cook_time' => '45-Minute Grill',
                'key_ingredients' => ['Free-Range Chicken', 'Roasted Peanuts', 'Kecap Manis', 'Coconut Sugar', 'Lemongrass'],
                'image' => null,
                'is_featured' => true,
            ],

            // === RICE & GRAINS ===
            [
                'name' => 'Nasi Goreng Kampung',
                'slug' => 'nasi-goreng-kampung',
                'subtitle' => 'Village-Style Fried Rice',
                'description' => 'Nasi goreng gurih bumbu rempah tradisional dengan aroma terasi yang menggoda. Disajikan dengan telur mata sapi dan kerupuk.',
                'heritage_narrative' => 'A beloved staple of Indonesian village kitchens, this kampung-style fried rice is made with aromatic shrimp paste, garlic, and a medley of traditional spices.',
                'price' => 65000,
                'original_price' => null,
                'category' => 'rice',
                'region' => 'Java',
                'heat_level' => 'Medium',
                'cook_time' => '20-Minute Wok',
                'key_ingredients' => ['Jasmine Rice', 'Shrimp Paste', 'Free-Range Egg', 'Shallots', 'Chili'],
                'image' => null,
                'is_featured' => false,
            ],
            [
                'name' => 'Nasi Kuning Tumpeng',
                'slug' => 'nasi-kuning-tumpeng',
                'subtitle' => 'Sacred Cone of Golden Turmeric Rice',
                'description' => 'Nasi kuning gurih beraroma rempah dengan aneka lauk pendamping tradisional lengkap. Pilihan tepat untuk santap siang yang spesial.',
                'heritage_narrative' => 'Tumpeng is Indonesia\'s most iconic ceremonial dish — golden turmeric rice shaped into a mountain cone, symbolizing gratitude and prosperity.',
                'price' => 75000,
                'original_price' => null,
                'category' => 'rice',
                'region' => 'Java',
                'heat_level' => 'Mild',
                'cook_time' => '1-Hour Tradition',
                'key_ingredients' => ['Jasmine Rice', 'Turmeric', 'Coconut Milk', 'Bay Leaves', 'Lemongrass'],
                'image' => null,
                'is_featured' => false,
            ],
            [
                'name' => 'Nasi Uduk Betawi',
                'slug' => 'nasi-uduk-betawi',
                'subtitle' => 'Betawi Coconut Steamed Rice',
                'description' => 'Sajian klasik nasi uduk khas Betawi yang gurih dan pulen. Lengkap dengan lauk tradisional dan sambal kacang yang menggoda selera.',
                'heritage_narrative' => 'Nasi Uduk is the soul food of Betawi — Jakarta\'s indigenous people. Fluffy rice steamed in fragrant coconut milk, served with traditional Betawi accompaniments.',
                'price' => 70000,
                'original_price' => null,
                'category' => 'rice',
                'region' => 'Betawi / Jakarta',
                'heat_level' => 'Mild',
                'cook_time' => '30-Minute Steam',
                'key_ingredients' => ['Jasmine Rice', 'Coconut Milk', 'Pandan Leaves', 'Lemongrass', 'Kaffir Lime'],
                'image' => null,
                'is_featured' => false,
            ],

            // === SWEET ARCHIVES ===
            [
                'name' => 'Es Campur Nusantara',
                'slug' => 'es-campur-nusantara',
                'subtitle' => 'A Symphony of Archipelago Flavors',
                'description' => 'Kombinasi harmonis antara buah-buahan tropis, tape singkong, dan jeli mutiara dalam balutan kuah santan manis yang ringan dan menyegarkan.',
                'heritage_narrative' => 'Es Campur is Indonesia\'s answer to the perfect tropical refreshment — a beautiful chaos of flavors and textures that reflects the diversity of the archipelago.',
                'price' => 45000,
                'original_price' => null,
                'category' => 'sweet',
                'region' => 'Nusantara',
                'heat_level' => 'None',
                'cook_time' => 'Served Chilled',
                'key_ingredients' => ['Coconut Milk', 'Palm Sugar', 'Jackfruit', 'Tape Singkong', 'Pearl Jelly'],
                'image' => null,
                'is_featured' => true,
            ],
            [
                'name' => 'Klepon Pandan',
                'slug' => 'klepon-pandan',
                'subtitle' => 'Jade Pearls of Palm Sugar',
                'description' => 'Bola-bola ketan lembut yang diberi warna alami daun suji dan pandan, diisi dengan cairan gula merah asli.',
                'heritage_narrative' => 'Klepon is one of Indonesia\'s most beloved traditional sweets — jade-green rice cake balls filled with liquid palm sugar, rolled in freshly grated coconut.',
                'price' => 35000,
                'original_price' => null,
                'category' => 'sweet',
                'region' => 'Java',
                'heat_level' => 'None',
                'cook_time' => 'Handcrafted Daily',
                'key_ingredients' => ['Glutinous Rice', 'Pandan Leaf', 'Palm Sugar', 'Coconut', 'Suji Leaf'],
                'image' => null,
                'is_featured' => false,
            ],
            [
                'name' => 'Dadar Gulung',
                'slug' => 'dadar-gulung',
                'subtitle' => 'Rolled Pandan Crepes with Coconut',
                'description' => 'Kue dadar tipis berpori dengan aroma pandan yang wangi, berisi "Unti" (campuran kelapa parut dan gula merah).',
                'heritage_narrative' => 'Dadar Gulung is a traditional Indonesian rolled pancake scented with pandan, filled with a sweet mixture of grated coconut and palm sugar.',
                'price' => 30000,
                'original_price' => null,
                'category' => 'sweet',
                'region' => 'Java & Bali',
                'heat_level' => 'None',
                'cook_time' => 'Freshly Rolled',
                'key_ingredients' => ['Rice Flour', 'Pandan Extract', 'Grated Coconut', 'Palm Sugar', 'Coconut Milk'],
                'image' => null,
                'is_featured' => false,
            ],

            // === CONDIMENTS ===
            [
                'name' => 'Sambal Bajak Heritage',
                'slug' => 'sambal-bajak-heritage',
                'subtitle' => 'The Ancient Ploughing Chili Paste',
                'description' => 'Sambal bajak khas yang dimasak lama dengan bumbu rempah pilihan. Cita rasa yang kaya dan kompleks, sempurna sebagai pelengkap hidangan.',
                'heritage_narrative' => 'Sambal Bajak is one of Java\'s oldest cooked sambal varieties, named after the "bajak" (plow), associated with the agricultural rituals of Javanese farmers.',
                'price' => 45000,
                'original_price' => null,
                'category' => 'condiment',
                'region' => 'Java',
                'heat_level' => 'Hot',
                'cook_time' => '2-Hour Slow Cook',
                'key_ingredients' => ['Bird\'s Eye Chili', 'Shrimp Paste', 'Palm Sugar', 'Galangal', 'Shallots'],
                'image' => null,
                'is_featured' => false,
            ],

            // === ADDITIONAL MAIN COURSES ===
            [
                'name' => 'Gado Gado',
                'slug' => 'gado-gado',
                'subtitle' => 'Indonesian Peanut Sauce Salad',
                'description' => 'A refreshing medley of blanched local vegetables, tofu, and lontong rice cakes.',
                'heritage_narrative' => 'Gado Gado is Indonesia\'s national salad — a vibrant ensemble of cooked and raw vegetables, tofu, tempeh, and boiled eggs, all united by a rich peanut sauce.',
                'price' => 65000,
                'original_price' => null,
                'category' => 'main',
                'region' => 'Betawi / Jakarta',
                'heat_level' => 'Mild',
                'cook_time' => '25-Minute Prep',
                'key_ingredients' => ['Mixed Vegetables', 'Tofu', 'Tempeh', 'Roasted Peanuts', 'Kecap Manis'],
                'image' => null,
                'is_featured' => false,
            ],
            [
                'name' => 'Nasi Goreng Java',
                'slug' => 'nasi-goreng-java',
                'subtitle' => 'The Ultimate Javanese Comfort Rice',
                'description' => 'The ultimate comfort food. Jasmine rice wok-fried with shrimp paste, chili, and sweet soy.',
                'heritage_narrative' => 'Nasi Goreng Jawa is distinct from its kampung cousin with the addition of sweet kecap manis and the subtle heat of Javanese chili blend.',
                'price' => 95000,
                'original_price' => null,
                'category' => 'main',
                'region' => 'Central Java',
                'heat_level' => 'Medium Spicy',
                'cook_time' => '20-Minute Wok',
                'key_ingredients' => ['Jasmine Rice', 'Kecap Manis', 'Shrimp Paste', 'Chicken', 'Javanese Chili Blend'],
                'image' => null,
                'is_featured' => false,
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
