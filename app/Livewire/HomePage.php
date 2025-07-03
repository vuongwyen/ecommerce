<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Color;
use App\Models\Size;

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

        // Apply rating filter (simulated for now)
        if ($this->ratingFilter) {
            // This would need to be implemented with actual review system
            // For now, we'll just pass the filter
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
            case 'newest':
            default:
                $query->orderBy('created_at', 'desc');
                break;
        }

        $products = $query->paginate(12);
        $categories = Category::where('is_active', true)->get();
        $randomProducts = Product::inRandomOrder()->take(4)->get();
        $brands = Brand::where('is_active', true)->get();
        $colors = Color::where('is_active', true)->get();
        $sizes = Size::where('is_active', true)->get();

        return view('livewire.home-page', [
            'products' => $products,
            'randomProducts' => $randomProducts,
            'categories' => $categories,
            'brands' => $brands,
            'colors' => $colors,
            'sizes' => $sizes,
        ]);
    }
}
