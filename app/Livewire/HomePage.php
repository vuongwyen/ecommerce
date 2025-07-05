<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Color;
use App\Models\Size;
use App\Models\Article;
use App\Models\Review;
use Illuminate\Support\Facades\View;

class HomePage extends Component
{
    public $search = '';
    public $selectedCategory = '';
    public $selectedBrand = '';
    public $selectedColors = [];
    public $selectedSizes = [];
    public $priceRange = '';
    public $minPrice = 0;
    public $maxPrice = 1000;
    public $ratingFilter = '';
    public $sortBy = 'newest';
    public $viewMode = 'grid'; // 'grid' or 'list'
    public $showFilters = false;

    protected $queryString = [
        'search' => ['except' => ''],
        'selectedCategory' => ['except' => ''],
        'selectedBrand' => ['except' => ''],
        'selectedColors' => ['except' => []],
        'selectedSizes' => ['except' => []],
        'priceRange' => ['except' => ''],
        'minPrice' => ['except' => 0],
        'maxPrice' => ['except' => 1000],
        'ratingFilter' => ['except' => ''],
        'sortBy' => ['except' => 'newest'],
        'viewMode' => ['except' => 'grid'],
    ];

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function updatedSelectedCategory()
    {
        $this->resetPage();
    }

    public function updatedSelectedBrand()
    {
        $this->resetPage();
    }

    public function updatedSelectedColors()
    {
        $this->resetPage();
    }

    public function updatedSelectedSizes()
    {
        $this->resetPage();
    }

    public function updatedPriceRange()
    {
        $this->resetPage();
    }

    public function updatedMinPrice()
    {
        $this->resetPage();
    }

    public function updatedMaxPrice()
    {
        $this->resetPage();
    }

    public function updatedRatingFilter()
    {
        $this->resetPage();
    }

    public function updatedSortBy()
    {
        $this->resetPage();
    }

    public function toggleViewMode()
    {
        $this->viewMode = $this->viewMode === 'grid' ? 'list' : 'grid';
    }

    public function clearFilters()
    {
        $this->reset([
            'search',
            'selectedCategory',
            'selectedBrand',
            'selectedColors',
            'selectedSizes',
            'priceRange',
            'minPrice',
            'maxPrice',
            'ratingFilter',
            'sortBy'
        ]);
        $this->resetPage();
    }

    public function render()
    {
        // SEO Data
        $seo = [
            'title' => 'BEAUTIFY - Premium Fashion & Beauty Products | Free Shipping',
            'description' => 'Discover the latest trends in fashion, beauty, and lifestyle. Shop premium products with free shipping, easy returns, and exceptional customer service. Join thousands of satisfied customers.',
            'keywords' => 'fashion, beauty, clothing, accessories, makeup, skincare, lifestyle, online shopping, free shipping',
            'canonical' => url('/'),
            'og_title' => 'BEAUTIFY - Premium Fashion & Beauty Products',
            'og_description' => 'Discover the latest trends in fashion, beauty, and lifestyle. Shop premium products with free shipping and easy returns.',
            'og_image' => asset('images/og-homepage.jpg'),
            'og_url' => url('/'),
            'twitter_card' => 'summary_large_image',
            'twitter_title' => 'BEAUTIFY - Premium Fashion & Beauty Products',
            'twitter_description' => 'Discover the latest trends in fashion, beauty, and lifestyle. Shop premium products with free shipping.',
            'twitter_image' => asset('images/og-homepage.jpg'),
        ];

        // Schema.org Website markup
        $schema = [
            '@context' => 'https://schema.org',
            '@type' => 'WebSite',
            'name' => 'BEAUTIFY',
            'url' => url('/'),
            'description' => 'Premium fashion and beauty products online store',
            'potentialAction' => [
                '@type' => 'SearchAction',
                'target' => url('/products?search={search_term_string}'),
                'query-input' => 'required name=search_term_string'
            ],
            'sameAs' => [
                'https://facebook.com/beautify',
                'https://twitter.com/beautify',
                'https://instagram.com/beautify',
                'https://pinterest.com/beautify'
            ]
        ];

        // Featured Categories
        $featuredCategories = Category::where('is_active', true)
            ->withCount('products')
            ->orderBy('products_count', 'desc')
            ->take(6)
            ->get();

        // Featured Products
        $featuredProducts = Product::where('is_featured', true)
            ->where('is_active', true)
            ->with(['category', 'brand', 'reviews'])
            ->take(8)
            ->get();

        // New Arrivals (Latest Products)
        $newArrivals = Product::where('is_active', true)
            ->with(['category', 'brand', 'reviews'])
            ->orderBy('created_at', 'desc')
            ->take(8)
            ->get();

        // Products on Sale
        $saleProducts = Product::where('on_sale', true)
            ->where('is_active', true)
            ->with(['category', 'brand', 'reviews'])
            ->take(6)
            ->get();

        // Latest Articles
        $latestArticles = Article::where('status', 'published')
            ->where('published_at', '<=', now())
            ->with('author')
            ->orderBy('published_at', 'desc')
            ->take(3)
            ->get();

        // Customer Reviews (Featured)
        $featuredReviews = Review::where('is_approved', true)
            ->where('is_verified_purchase', true)
            ->with(['user', 'product'])
            ->orderBy('rating', 'desc')
            ->take(6)
            ->get();

        // Statistics
        $stats = [
            'total_products' => Product::where('is_active', true)->count(),
            'total_categories' => Category::where('is_active', true)->count(),
            'total_reviews' => Review::where('is_approved', true)->count(),
            'avg_rating' => Review::where('is_approved', true)->avg('rating') ?? 4.5,
        ];

        // Pass SEO data to the layout
        View::share('seo', $seo);
        View::share('schema', json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE));

        return view('livewire.home-page', compact(
            'featuredCategories',
            'featuredProducts',
            'newArrivals',
            'saleProducts',
            'latestArticles',
            'featuredReviews',
            'stats'
        ));
    }
}
