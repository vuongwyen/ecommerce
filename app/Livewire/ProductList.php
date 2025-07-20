<?php

namespace App\Livewire;

use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Color;
use App\Models\Size;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class ProductList extends Component
{
    use WithPagination;

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
    public $gender = '';

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
        'gender' => ['except' => ''],
    ];

    public function mount($gender = null, $category = null)
    {
        if (request()->has('gender')) {
            $this->gender = request()->get('gender');
        } elseif ($gender) {
            $this->gender = $gender;
        }
        if (request()->has('category')) {
            $categorySlug = request()->get('category');
        } elseif ($category) {
            $categorySlug = $category;
        } else {
            $categorySlug = null;
        }
        if ($categorySlug) {
            $cat = \App\Models\Category::where('slug', $categorySlug)->first();
            if ($cat) {
                $this->selectedCategory = $cat->id;
            }
        }
    }

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
        $query = Product::query()
            ->with(['category', 'brand', 'colors', 'sizes'])
            ->where('is_active', true);

        // Apply search filter
        if ($this->search) {
            $query->where(function ($q) {
                $q->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('description', 'like', '%' . $this->search . '%');
            });
        }

        // Apply category filter
        if ($this->selectedCategory) {
            $query->where('category_id', $this->selectedCategory);
        }

        // Apply brand filter
        if ($this->selectedBrand) {
            $query->where('brand_id', $this->selectedBrand);
        }

        // Apply color filter
        if (!empty($this->selectedColors)) {
            $query->whereHas('colors', function ($q) {
                $q->whereIn('colors.id', $this->selectedColors);
            });
        }

        // Apply size filter
        if (!empty($this->selectedSizes)) {
            $query->whereHas('sizes', function ($q) {
                $q->whereIn('sizes.id', $this->selectedSizes);
            });
        }

        // Apply price range filter
        if ($this->priceRange) {
            switch ($this->priceRange) {
                case '0-50':
                    $query->whereBetween('price', [0, 50]);
                    break;
                case '50-100':
                    $query->whereBetween('price', [50, 100]);
                    break;
                case '100-200':
                    $query->whereBetween('price', [100, 200]);
                    break;
                case '200+':
                    $query->where('price', '>=', 200);
                    break;
            }
        } else {
            // Apply custom price range
            $query->whereBetween('price', [$this->minPrice, $this->maxPrice]);
        }

        // Apply rating filter with backend filtering
        if ($this->ratingFilter) {
            $minRating = (int) $this->ratingFilter;

            $query->leftJoin('reviews', function ($join) {
                $join->on('products.id', '=', 'reviews.product_id')
                    ->where('reviews.is_approved', true);
            })
                ->groupBy('products.id')
                ->havingRaw('AVG(reviews.rating) >= ?', [$minRating])
                ->orHavingRaw('COUNT(reviews.id) = 0'); // Include products with no reviews
        }

        // Apply sorting
        switch ($this->sortBy) {
            case 'price-low':
                $query->orderBy('price', 'asc');
                break;
            case 'price-high':
                $query->orderBy('price', 'desc');
                break;
            case 'name':
                $query->orderBy('name', 'asc');
                break;
            case 'rating':
                // Sort by average rating (products with no reviews will be last)
                $query->leftJoin('reviews as sort_reviews', function ($join) {
                    $join->on('products.id', '=', 'sort_reviews.product_id')
                        ->where('sort_reviews.is_approved', true);
                })
                    ->groupBy('products.id')
                    ->orderByRaw('AVG(sort_reviews.rating) DESC NULLS LAST')
                    ->orderBy('products.created_at', 'desc'); // Secondary sort by newest
                break;
            case 'newest':
            default:
                $query->orderBy('created_at', 'desc');
                break;
        }

        // Apply gender filter
        if ($this->gender) {
            $query->where('gender', $this->gender);
        }

        $products = $query->paginate(12);

        // Load average ratings for products
        $this->loadAverageRatings($products);

        $categories = Category::where('is_active', true)->get();
        $brands = Brand::where('is_active', true)->get();
        $colors = Color::where('is_active', true)->get();
        $sizes = Size::where('is_active', true)->get();

        return view('livewire.product-list', [
            'products' => $products,
            'categories' => $categories,
            'brands' => $brands,
            'colors' => $colors,
            'sizes' => $sizes,
        ]);
    }

    /**
     * Load average ratings for products to display in the UI
     */
    private function loadAverageRatings($products)
    {
        $productIds = $products->pluck('id');

        $averageRatings = DB::table('reviews')
            ->select(
                'product_id',
                DB::raw('AVG(rating) as average_rating'),
                DB::raw('COUNT(*) as review_count')
            )
            ->where('is_approved', true)
            ->whereIn('product_id', $productIds)
            ->groupBy('product_id')
            ->get()
            ->keyBy('product_id');

        // Add average rating data to each product
        foreach ($products as $product) {
            $ratingData = $averageRatings->get($product->id);
            $product->average_rating = $ratingData ? round($ratingData->average_rating, 1) : 0;
            $product->review_count = $ratingData ? $ratingData->review_count : 0;
        }
    }
}
