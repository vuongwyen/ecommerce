<?php

namespace Database\Seeders;

use App\Models\Size;
use App\Models\Category;
use Illuminate\Database\Seeder;

class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get all categories
        $categories = Category::all();

        // Clothing sizes
        $clothingSizes = ['XS', 'S', 'M', 'L', 'XL', 'XXL', 'XXXL'];

        // Shoe sizes
        $shoeSizes = ['36', '37', '38', '39', '40', '41', '42', '43', '44', '45', '46'];

        // Accessory sizes
        $accessorySizes = ['One Size', 'Small', 'Medium', 'Large'];

        foreach ($categories as $category) {
            $sizes = [];

            // Assign sizes based on category
            if (in_array($category->name, ['Streetwear', 'Dresses', 'Tops', 'Bottoms'])) {
                $sizes = $clothingSizes;
            } elseif ($category->name === 'Sneakers') {
                $sizes = $shoeSizes;
            } else {
                $sizes = $accessorySizes;
            }

            foreach ($sizes as $sizeName) {
                Size::create([
                    'name' => $sizeName,
                    'category_id' => $category->id,
                    'is_active' => true,
                ]);
            }
        }
    }
}
