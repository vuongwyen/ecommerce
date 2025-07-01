<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = Category::all();
        $brands = Brand::all();

        $products = [
            [
                'name' => 'Vintage Denim Jacket',
                'slug' => 'vintage-denim-jacket',
                'description' => 'Classic vintage denim jacket with a modern twist. Perfect for layering and creating that effortless streetwear look.',
                'price' => 89.99,
                'images' => [
                    'products/vintage-denim-jacket-1.jpg',
                    'products/vintage-denim-jacket-2.jpg'
                ],
                'category_id' => $categories->where('name', 'Streetwear')->first()->id,
                'brand_id' => $brands->where('name', 'Supreme')->first()->id,
                'is_active' => true,
                'is_featured' => true,
                'in_stock' => true,
                'on_sale' => true,
            ],
            [
                'name' => 'Retro Sneakers',
                'slug' => 'retro-sneakers',
                'description' => 'Comfortable retro sneakers with a bold design. Perfect for everyday wear and street style.',
                'price' => 149.99,
                'images' => [
                    'products/retro-sneakers-1.jpg',
                    'products/retro-sneakers-2.jpg'
                ],
                'category_id' => $categories->where('name', 'Sneakers')->first()->id,
                'brand_id' => $brands->where('name', 'Nike')->first()->id,
                'is_active' => true,
                'is_featured' => true,
                'in_stock' => true,
                'on_sale' => false,
            ],
            [
                'name' => 'Summer Dress',
                'slug' => 'summer-dress',
                'description' => 'Light and breezy summer dress perfect for warm days. Features a flattering cut and comfortable fabric.',
                'price' => 79.99,
                'images' => [
                    'products/summer-dress-1.jpg',
                    'products/summer-dress-2.jpg'
                ],
                'category_id' => $categories->where('name', 'Dresses')->first()->id,
                'brand_id' => $brands->where('name', 'Zara')->first()->id,
                'is_active' => true,
                'is_featured' => false,
                'in_stock' => true,
                'on_sale' => false,
            ],
            [
                'name' => 'Designer Watch',
                'slug' => 'designer-watch',
                'description' => 'Elegant designer watch with premium materials and precise craftsmanship. A timeless accessory.',
                'price' => 299.99,
                'images' => [
                    'products/designer-watch-1.jpg',
                    'products/designer-watch-2.jpg'
                ],
                'category_id' => $categories->where('name', 'Accessories')->first()->id,
                'brand_id' => $brands->where('name', 'Off-White')->first()->id,
                'is_active' => true,
                'is_featured' => true,
                'in_stock' => true,
                'on_sale' => false,
            ],
            [
                'name' => 'Graphic T-Shirt',
                'slug' => 'graphic-t-shirt',
                'description' => 'Comfortable cotton t-shirt with a bold graphic design. Perfect for casual wear.',
                'price' => 29.99,
                'images' => [
                    'products/graphic-tshirt-1.jpg',
                    'products/graphic-tshirt-2.jpg'
                ],
                'category_id' => $categories->where('name', 'Tops')->first()->id,
                'brand_id' => $brands->where('name', 'H&M')->first()->id,
                'is_active' => true,
                'is_featured' => false,
                'in_stock' => true,
                'on_sale' => true,
            ],
            [
                'name' => 'Cargo Pants',
                'slug' => 'cargo-pants',
                'description' => 'Stylish cargo pants with multiple pockets. Perfect for a utilitarian streetwear look.',
                'price' => 69.99,
                'images' => [
                    'products/cargo-pants-1.jpg',
                    'products/cargo-pants-2.jpg'
                ],
                'category_id' => $categories->where('name', 'Bottoms')->first()->id,
                'brand_id' => $brands->where('name', 'Uniqlo')->first()->id,
                'is_active' => true,
                'is_featured' => false,
                'in_stock' => true,
                'on_sale' => false,
            ],
            [
                'name' => 'Hoodie',
                'slug' => 'hoodie',
                'description' => 'Comfortable hoodie made from premium cotton. Perfect for layering in cooler weather.',
                'price' => 59.99,
                'images' => [
                    'products/hoodie-1.jpg',
                    'products/hoodie-2.jpg'
                ],
                'category_id' => $categories->where('name', 'Streetwear')->first()->id,
                'brand_id' => $brands->where('name', 'Adidas')->first()->id,
                'is_active' => true,
                'is_featured' => false,
                'in_stock' => true,
                'on_sale' => true,
            ],
            [
                'name' => 'Classic Vans',
                'slug' => 'classic-vans',
                'description' => 'Timeless Vans sneakers with a classic design. Perfect for skateboarding or casual wear.',
                'price' => 49.99,
                'images' => [
                    'products/classic-vans-1.jpg',
                    'products/classic-vans-2.jpg'
                ],
                'category_id' => $categories->where('name', 'Sneakers')->first()->id,
                'brand_id' => $brands->where('name', 'Vans')->first()->id,
                'is_active' => true,
                'is_featured' => false,
                'in_stock' => true,
                'on_sale' => false,
            ],
            [
                'name' => 'Evening Dress',
                'slug' => 'evening-dress',
                'description' => 'Elegant evening dress perfect for special occasions. Features a flattering silhouette and premium fabric.',
                'price' => 199.99,
                'images' => [
                    'products/evening-dress-1.jpg',
                    'products/evening-dress-2.jpg'
                ],
                'category_id' => $categories->where('name', 'Dresses')->first()->id,
                'brand_id' => $brands->where('name', 'Zara')->first()->id,
                'is_active' => true,
                'is_featured' => true,
                'in_stock' => true,
                'on_sale' => false,
            ],
            [
                'name' => 'Leather Bag',
                'slug' => 'leather-bag',
                'description' => 'Premium leather bag with multiple compartments. Perfect for everyday use and travel.',
                'price' => 129.99,
                'images' => [
                    'products/leather-bag-1.jpg',
                    'products/leather-bag-2.jpg'
                ],
                'category_id' => $categories->where('name', 'Accessories')->first()->id,
                'brand_id' => $brands->where('name', 'Off-White')->first()->id,
                'is_active' => true,
                'is_featured' => false,
                'in_stock' => true,
                'on_sale' => true,
            ],
            [
                'name' => 'Crop Top',
                'slug' => 'crop-top',
                'description' => 'Trendy crop top perfect for summer. Features a comfortable fit and stylish design.',
                'price' => 24.99,
                'images' => [
                    'products/crop-top-1.jpg',
                    'products/crop-top-2.jpg'
                ],
                'category_id' => $categories->where('name', 'Tops')->first()->id,
                'brand_id' => $brands->where('name', 'H&M')->first()->id,
                'is_active' => true,
                'is_featured' => false,
                'in_stock' => true,
                'on_sale' => false,
            ],
            [
                'name' => 'Jeans',
                'slug' => 'jeans',
                'description' => 'Classic jeans with a modern fit. Made from premium denim for comfort and durability.',
                'price' => 89.99,
                'images' => [
                    'products/jeans-1.jpg',
                    'products/jeans-2.jpg'
                ],
                'category_id' => $categories->where('name', 'Bottoms')->first()->id,
                'brand_id' => $brands->where('name', 'Uniqlo')->first()->id,
                'is_active' => true,
                'is_featured' => false,
                'in_stock' => true,
                'on_sale' => false,
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
