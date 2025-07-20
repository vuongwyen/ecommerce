<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Product;
use App\Models\Review;
use App\Models\User;
use App\Models\Category;
use App\Models\Brand;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductRatingFilterTest extends TestCase
{
    use RefreshDatabase;

    public function test_rating_filter_filters_products_by_average_rating()
    {
        // Create test data
        $user = User::factory()->create();
        $category = Category::factory()->create();
        $brand = Brand::factory()->create();

        // Create products with different average ratings
        $product1 = Product::factory()->create([
            'category_id' => $category->id,
            'brand_id' => $brand->id,
            'is_active' => true,
        ]);

        $product2 = Product::factory()->create([
            'category_id' => $category->id,
            'brand_id' => $brand->id,
            'is_active' => true,
        ]);

        $product3 = Product::factory()->create([
            'category_id' => $category->id,
            'brand_id' => $brand->id,
            'is_active' => true,
        ]);

        // Create reviews for product1 (average rating: 4.5)
        Review::factory()->create([
            'user_id' => $user->id,
            'product_id' => $product1->id,
            'rating' => 5,
            'is_approved' => true,
        ]);
        Review::factory()->create([
            'user_id' => $user->id,
            'product_id' => $product1->id,
            'rating' => 4,
            'is_approved' => true,
        ]);

        // Create reviews for product2 (average rating: 3.0)
        Review::factory()->create([
            'user_id' => $user->id,
            'product_id' => $product2->id,
            'rating' => 3,
            'is_approved' => true,
        ]);
        Review::factory()->create([
            'user_id' => $user->id,
            'product_id' => $product2->id,
            'rating' => 3,
            'is_approved' => true,
        ]);

        // Product3 has no reviews (average rating: 0)

        // Test filtering for 4+ stars
        $response = $this->get('/products?ratingFilter=4');

        $response->assertStatus(200);
        $response->assertSee($product1->name); // Should include product with 4.5 average
        $response->assertDontSee($product2->name); // Should exclude product with 3.0 average
        $response->assertDontSee($product3->name); // Should exclude product with no reviews

        // Test filtering for 3+ stars
        $response = $this->get('/products?ratingFilter=3');

        $response->assertStatus(200);
        $response->assertSee($product1->name); // Should include product with 4.5 average
        $response->assertSee($product2->name); // Should include product with 3.0 average
        $response->assertDontSee($product3->name); // Should exclude product with no reviews
    }

    public function test_rating_filter_includes_products_with_no_reviews()
    {
        // Create test data
        $user = User::factory()->create();
        $category = Category::factory()->create();
        $brand = Brand::factory()->create();

        // Create a product with no reviews
        $product = Product::factory()->create([
            'category_id' => $category->id,
            'brand_id' => $brand->id,
            'is_active' => true,
        ]);

        // Test that products with no reviews are included when no rating filter is applied
        $response = $this->get('/products');

        $response->assertStatus(200);
        $response->assertSee($product->name);
    }

    public function test_rating_sort_orders_products_by_average_rating()
    {
        // Create test data
        $user = User::factory()->create();
        $category = Category::factory()->create();
        $brand = Brand::factory()->create();

        // Create products with different average ratings
        $product1 = Product::factory()->create([
            'category_id' => $category->id,
            'brand_id' => $brand->id,
            'is_active' => true,
        ]);

        $product2 = Product::factory()->create([
            'category_id' => $category->id,
            'brand_id' => $brand->id,
            'is_active' => true,
        ]);

        $product3 = Product::factory()->create([
            'category_id' => $category->id,
            'brand_id' => $brand->id,
            'is_active' => true,
        ]);

        // Create reviews for product1 (average rating: 5.0)
        Review::factory()->create([
            'user_id' => $user->id,
            'product_id' => $product1->id,
            'rating' => 5,
            'is_approved' => true,
        ]);

        // Create reviews for product2 (average rating: 3.0)
        Review::factory()->create([
            'user_id' => $user->id,
            'product_id' => $product2->id,
            'rating' => 3,
            'is_approved' => true,
        ]);

        // Product3 has no reviews

        // Test sorting by rating
        $response = $this->get('/products?sortBy=rating');

        $response->assertStatus(200);

        // The response should show products in order: product1 (5.0), product2 (3.0), product3 (no reviews)
        $content = $response->getContent();
        $product1Pos = strpos($content, $product1->name);
        $product2Pos = strpos($content, $product2->name);
        $product3Pos = strpos($content, $product3->name);

        // Product1 should appear before product2
        $this->assertLessThan($product2Pos, $product1Pos);
    }
}
