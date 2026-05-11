<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        Category::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        $categories = [
            [
                'name'        => 'Main Course',
                'slug'        => 'main',
                'description' => 'Hearty Indonesian main dishes — slow-cooked meats, grilled skewers, and savory classics.',
                'icon'        => null,
                'sort_order'  => 1,
                'is_active'   => true,
            ],
            [
                'name'        => 'Rice & Grains',
                'slug'        => 'rice',
                'description' => 'Iconic rice dishes from across the archipelago, from fragrant tumpeng to wok-fried kampung rice.',
                'icon'        => null,
                'sort_order'  => 2,
                'is_active'   => true,
            ],
            [
                'name'        => 'Sweet Archives',
                'slug'        => 'sweet',
                'description' => 'Traditional Indonesian sweets and desserts, preserving the flavors of ancestral kitchens.',
                'icon'        => null,
                'sort_order'  => 3,
                'is_active'   => true,
            ],
            [
                'name'        => 'Condiments',
                'slug'        => 'condiment',
                'description' => 'Heritage sambals and condiments crafted with age-old recipes to elevate every meal.',
                'icon'        => null,
                'sort_order'  => 4,
                'is_active'   => true,
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
