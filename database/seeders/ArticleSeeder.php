<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ArticleSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::all();

        if ($users->isEmpty()) {
            // Create a default user if none exists
            $users = collect([User::factory()->create()]);
        }

        $articles = [
            [
                'title' => 'Spring Fashion Trends 2025: What to Wear This Season',
                'excerpt' => 'Discover the hottest spring fashion trends for 2025. From pastel colors to sustainable fashion, we\'ve got you covered with the latest styles and tips.',
                'content' => '<p>Spring 2025 brings a fresh wave of fashion trends that blend sustainability with style. This season, we\'re seeing a strong emphasis on eco-friendly materials, pastel color palettes, and versatile pieces that can transition from day to night.</p>
                
                <h2>Key Trends for Spring 2025</h2>
                <ul>
                    <li><strong>Pastel Power:</strong> Soft pinks, lavender, and mint green dominate the color palette</li>
                    <li><strong>Sustainable Fashion:</strong> More brands are embracing eco-friendly materials</li>
                    <li><strong>Versatile Pieces:</strong> Multi-functional clothing that works for various occasions</li>
                    <li><strong>Bold Accessories:</strong> Statement jewelry and bags to elevate any outfit</li>
                </ul>
                
                <p>Whether you\'re updating your wardrobe or just looking for inspiration, these trends offer something for everyone. Remember, the best fashion choice is one that makes you feel confident and comfortable.</p>',
                'meta_title' => 'Spring Fashion Trends 2025: Latest Styles & Tips | BEAUTIFY',
                'meta_description' => 'Discover the hottest spring fashion trends for 2025. Get expert tips on styling pastel colors, sustainable fashion, and versatile pieces for the new season.',
                'status' => 'published',
                'published_at' => now()->subDays(5),
            ],
            [
                'title' => 'How to Build a Capsule Wardrobe: 10 Essential Pieces',
                'excerpt' => 'Learn how to create a versatile capsule wardrobe with just 10 essential pieces. Mix and match to create countless outfits for any occasion.',
                'content' => '<p>A capsule wardrobe is a collection of versatile, timeless pieces that can be mixed and matched to create numerous outfits. The key is choosing high-quality items that work well together and suit your personal style.</p>
                
                <h2>The 10 Essential Pieces</h2>
                <ol>
                    <li><strong>Classic White T-Shirt:</strong> The foundation of any wardrobe</li>
                    <li><strong>Well-Fitted Jeans:</strong> A versatile bottom that works with everything</li>
                    <li><strong>Blazer:</strong> Perfect for both casual and professional settings</li>
                    <li><strong>Little Black Dress:</strong> Timeless and appropriate for any occasion</li>
                    <li><strong>White Sneakers:</strong> Comfortable and stylish for everyday wear</li>
                    <li><strong>Cardigan:</strong> Perfect for layering in any season</li>
                    <li><strong>Silk Blouse:</strong> Elegant and versatile for work or play</li>
                    <li><strong>Midi Skirt:</strong> Flattering and appropriate for various occasions</li>
                    <li><strong>Leather Jacket:</strong> Adds edge to any outfit</li>
                    <li><strong>Statement Accessory:</strong> A piece that reflects your personality</li>
                </ol>
                
                <p>Building a capsule wardrobe takes time and thought, but the result is a stress-free morning routine and a closet full of outfits you love.</p>',
                'meta_title' => 'Capsule Wardrobe Guide: 10 Essential Pieces | BEAUTIFY',
                'meta_description' => 'Learn how to build a versatile capsule wardrobe with 10 essential pieces. Create countless outfits with mix-and-match styling tips.',
                'status' => 'published',
                'published_at' => now()->subDays(10),
            ],
            [
                'title' => 'Sustainable Fashion: How to Shop Responsibly',
                'excerpt' => 'Discover how to make eco-friendly fashion choices without compromising on style. Learn about sustainable materials, ethical brands, and conscious shopping habits.',
                'content' => '<p>Sustainable fashion is more than just a trend—it\'s a movement towards a more responsible and ethical approach to clothing. As consumers become more aware of the environmental impact of fast fashion, many are seeking alternatives that align with their values.</p>
                
                <h2>What is Sustainable Fashion?</h2>
                <p>Sustainable fashion encompasses clothing that is designed, manufactured, distributed, and used in ways that are environmentally friendly and socially responsible.</p>
                
                <h2>How to Shop Sustainably</h2>
                <ul>
                    <li><strong>Choose Quality Over Quantity:</strong> Invest in well-made pieces that last longer</li>
                    <li><strong>Look for Sustainable Materials:</strong> Organic cotton, hemp, bamboo, and recycled fabrics</li>
                    <li><strong>Support Ethical Brands:</strong> Research companies that treat workers fairly</li>
                    <li><strong>Buy Second-Hand:</strong> Give pre-loved clothing a new life</li>
                    <li><strong>Care for Your Clothes:</strong> Proper maintenance extends garment life</li>
                </ul>
                
                <p>Making sustainable fashion choices doesn\'t mean sacrificing style. With the growing number of eco-friendly brands and options, it\'s easier than ever to look great while doing good for the planet.</p>',
                'meta_title' => 'Sustainable Fashion Guide: Shop Responsibly | BEAUTIFY',
                'meta_description' => 'Learn how to shop sustainably with our guide to eco-friendly fashion. Discover sustainable materials, ethical brands, and conscious shopping tips.',
                'status' => 'published',
                'published_at' => now()->subDays(15),
            ],
        ];

        foreach ($articles as $articleData) {
            Article::create([
                'title' => $articleData['title'],
                'slug' => Str::slug($articleData['title']),
                'excerpt' => $articleData['excerpt'],
                'content' => $articleData['content'],
                'featured_image' => 'articles/article-' . rand(1, 3) . '.jpg',
                'meta_title' => $articleData['meta_title'],
                'meta_description' => $articleData['meta_description'],
                'published_at' => $articleData['published_at'],
                'status' => $articleData['status'],
                'author_id' => $users->random()->id,
            ]);
        }
    }
}
