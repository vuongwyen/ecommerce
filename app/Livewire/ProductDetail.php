<?php

namespace App\Livewire;

use App\Models\Product;
use App\Models\Size;
use App\Models\Color;
use Livewire\Component;
use Illuminate\Support\Facades\View;

class ProductDetail extends Component
{
    public Product $product;
    public $selectedImage = 0;
    public $quantity = 1;
    public $selectedSize = '';
    public $selectedColor = '';
    public $showZoom = false;
    public $zoomPosition = ['x' => 0, 'y' => 0];

    public function mount($slug)
    {
        $this->product = Product::where('slug', $slug)
            ->where('is_active', true)
            ->with(['category', 'brand', 'sizes', 'colors', 'reviews.user'])
            ->firstOrFail();

        // Set SEO metadata
        $this->setSeoMetadata();
    }

    public function setSeoMetadata()
    {
        $title = $this->generateSeoTitle();
        $description = $this->generateSeoDescription();
        $canonicalUrl = route('product-detail', $this->product->slug);
        $imageUrl = $this->product->getImageUrl();

        // Set meta tags
        View::share('seo', [
            'title' => $title,
            'description' => $description,
            'canonical' => $canonicalUrl,
            'og_title' => $title,
            'og_description' => $description,
            'og_image' => $imageUrl,
            'og_url' => $canonicalUrl,
            'twitter_card' => 'summary_large_image',
            'twitter_title' => $title,
            'twitter_description' => $description,
            'twitter_image' => $imageUrl,
        ]);

        // Generate schema markup
        $this->generateSchemaMarkup();
    }

    public function generateSeoTitle()
    {
        $title = $this->product->name;

        if ($this->product->brand) {
            $title .= ' by ' . $this->product->brand->name;
        }

        if ($this->product->category) {
            $title .= ' - ' . $this->product->category->name;
        }

        $title .= ' | BEAUTIFY';

        return $title;
    }

    public function generateSeoDescription()
    {
        $description = $this->product->description;

        if (strlen($description) > 160) {
            $description = substr($description, 0, 157) . '...';
        }

        if ($this->product->brand) {
            $description .= ' Shop ' . $this->product->brand->name . ' products at BEAUTIFY.';
        }

        return $description;
    }

    public function generateSchemaMarkup()
    {
        $schema = [
            '@context' => 'https://schema.org',
            '@type' => 'Product',
            'name' => $this->product->name,
            'description' => $this->product->description,
            'image' => $this->product->getImageUrl(),
            'url' => route('product-detail', $this->product->slug),
            'sku' => $this->product->id,
            'brand' => [
                '@type' => 'Brand',
                'name' => $this->product->brand ? $this->product->brand->name : 'BEAUTIFY'
            ],
            'category' => $this->product->category ? $this->product->category->name : 'Fashion',
            'offers' => [
                '@type' => 'Offer',
                'price' => $this->product->price,
                'priceCurrency' => 'USD',
                'availability' => $this->product->in_stock ? 'https://schema.org/InStock' : 'https://schema.org/OutOfStock',
                'url' => route('product-detail', $this->product->slug),
            ],
            'aggregateRating' => [
                '@type' => 'AggregateRating',
                'ratingValue' => number_format($this->product->average_rating, 1),
                'reviewCount' => $this->product->review_count,
                'bestRating' => '5',
                'worstRating' => '1'
            ]
        ];

        // Add product variants (sizes and colors)
        $variants = [];

        if ($this->product->sizes && $this->product->sizes->count() > 0) {
            foreach ($this->product->sizes as $size) {
                $variants[] = [
                    '@type' => 'Product',
                    'name' => $this->product->name . ' - ' . $size->name,
                    'sku' => $this->product->id . '-' . $size->id,
                    'additionalProperty' => [
                        '@type' => 'PropertyValue',
                        'name' => 'Size',
                        'value' => $size->name
                    ]
                ];
            }
        }

        if ($this->product->colors && $this->product->colors->count() > 0) {
            foreach ($this->product->colors as $color) {
                $variants[] = [
                    '@type' => 'Product',
                    'name' => $this->product->name . ' - ' . $color->name,
                    'sku' => $this->product->id . '-' . $color->id,
                    'additionalProperty' => [
                        '@type' => 'PropertyValue',
                        'name' => 'Color',
                        'value' => $color->name
                    ]
                ];
            }
        }

        if (!empty($variants)) {
            $schema['hasVariant'] = $variants;
        }

        // Add review schema if available
        $reviews = $this->getProductReviews();
        if (!empty($reviews)) {
            $schema['review'] = $reviews;
        }

        View::share('schema', json_encode($schema, JSON_UNESCAPED_SLASHES));
    }

    public function getProductReviews()
    {
        $reviews = $this->product->approvedReviews()->with('user')->limit(5)->get();

        return $reviews->map(function ($review) {
            return [
                '@type' => 'Review',
                'author' => [
                    '@type' => 'Person',
                    'name' => $review->user->name
                ],
                'reviewRating' => [
                    '@type' => 'Rating',
                    'ratingValue' => $review->rating,
                    'bestRating' => '5'
                ],
                'reviewBody' => $review->comment,
                'datePublished' => $review->created_at->format('Y-m-d')
            ];
        })->toArray();
    }

    public function selectImage($index)
    {
        $this->selectedImage = $index;
    }

    public function incrementQuantity()
    {
        if ($this->quantity < 10) {
            $this->quantity++;
        }
    }

    public function decrementQuantity()
    {
        if ($this->quantity > 1) {
            $this->quantity--;
        }
    }

    public function addToCart()
    {
        $this->validate([
            'quantity' => 'required|integer|min:1|max:10',
        ]);

        $cartService = app(\App\Services\CartService::class);
        $cartService->addToCart(
            $this->product->id,
            $this->quantity,
            $this->selectedSize,
            $this->selectedColor
        );

        session()->flash('success', 'Product added to cart successfully!');

        // Reset quantity
        $this->quantity = 1;
    }

    public function buyNow()
    {
        $this->addToCart();
        return redirect()->route('checkout.index');
    }

    public function getRelatedProducts()
    {
        return Product::where('category_id', $this->product->category_id)
            ->where('id', '!=', $this->product->id)
            ->where('is_active', true)
            ->with(['category', 'brand'])
            ->limit(4)
            ->get();
    }

    public function getTechnicalSpecifications()
    {
        $specs = [];

        if ($this->product->brand) {
            $specs['Brand'] = $this->product->brand->name;
        }

        if ($this->product->category) {
            $specs['Category'] = $this->product->category->name;
        }

        if ($this->product->gender) {
            $specs['Gender'] = ucfirst($this->product->gender);
        }

        if ($this->product->sizes && $this->product->sizes->count() > 0) {
            $specs['Available Sizes'] = $this->product->sizes->pluck('name')->implode(', ');
        }

        if ($this->product->colors && $this->product->colors->count() > 0) {
            $specs['Available Colors'] = $this->product->colors->pluck('name')->implode(', ');
        }

        $specs['SKU'] = 'SKU-' . $this->product->id;
        $specs['Condition'] = 'New';
        $specs['Availability'] = $this->product->in_stock ? 'In Stock' : 'Out of Stock';

        return $specs;
    }

    public function render()
    {
        $relatedProducts = $this->getRelatedProducts();
        $technicalSpecs = $this->getTechnicalSpecifications();

        return view('livewire.product-detail', compact('relatedProducts', 'technicalSpecs'));
    }
}
