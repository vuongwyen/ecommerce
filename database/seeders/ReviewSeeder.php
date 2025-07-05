<?php

namespace Database\Seeders;

use App\Models\Review;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = Product::all();
        $users = User::all();

        if ($users->isEmpty()) {
            // Create some sample users if none exist
            $users = User::factory(10)->create();
        }

        $sampleReviews = [
            [
                'rating' => 5,
                'title' => 'Excellent Quality!',
                'comment' => 'This product exceeded my expectations. The quality is outstanding and it fits perfectly. Highly recommended!',
            ],
            [
                'rating' => 4,
                'title' => 'Great Product',
                'comment' => 'Very good quality and fast shipping. The design is exactly as shown in the pictures.',
            ],
            [
                'rating' => 5,
                'title' => 'Amazing!',
                'comment' => 'I love this product! The material is soft and comfortable. Will definitely buy again.',
            ],
            [
                'rating' => 4,
                'title' => 'Good Value',
                'comment' => 'Good quality for the price. The sizing is accurate and the color matches the description.',
            ],
            [
                'rating' => 5,
                'title' => 'Perfect Fit',
                'comment' => 'This fits perfectly and looks great! The quality is excellent and worth every penny.',
            ],
            [
                'rating' => 3,
                'title' => 'Decent Product',
                'comment' => 'The product is okay, but the shipping took longer than expected. Quality is acceptable.',
            ],
            [
                'rating' => 5,
                'title' => 'Love It!',
                'comment' => 'Absolutely love this product! The design is beautiful and the quality is top-notch.',
            ],
            [
                'rating' => 4,
                'title' => 'Satisfied Customer',
                'comment' => 'Good product overall. The material is nice and it arrived in perfect condition.',
            ],
        ];

        foreach ($products as $product) {
            // Create 3-8 reviews per product
            $numReviews = rand(3, 8);

            for ($i = 0; $i < $numReviews; $i++) {
                $review = $sampleReviews[array_rand($sampleReviews)];
                $user = $users->random();

                // Check if this user has already reviewed this product
                $existingReview = Review::where('user_id', $user->id)
                    ->where('product_id', $product->id)
                    ->first();

                if (!$existingReview) {
                    Review::create([
                        'user_id' => $user->id,
                        'product_id' => $product->id,
                        'rating' => $review['rating'],
                        'title' => $review['title'],
                        'comment' => $review['comment'],
                        'is_verified_purchase' => rand(0, 1), // Random verified purchase status
                        'is_approved' => true, // All seeded reviews are approved
                    ]);
                }
            }
        }
    }
}
