<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Color;
use App\Models\Brand;
use App\Models\Size;

class ProductController extends Controller
{
    public function index(Request $request, $categorySlug = null)
    {
        $query = Product::query();

        if ($categorySlug) {
            $category = Category::where('slug', $categorySlug)->firstOrFail();
            $query->where('category_id', $category->id);
        }

        // Filter by gender if present
        $gender = $request->get('gender');
        if ($gender) {
            $query->where('gender', $gender);
        }

        $products = $query->paginate(12);
        $colors = Color::all();
        $categories = Category::all();
        $sortBy = 'newest';
        $viewMode = 'grid';
        $showFilters = 'Hide';
        $search = '';
        $selectedCategory = '';
        $selectedBrand = '';
        $selectedColors = [];
        $selectedSizes = [];
        $priceRange = '';
        $ratingFilter = '';

        return view('livewire.product-list', compact(
            'products',
            'category',
            'categories',
            'colors',
            'sortBy',
            'viewMode',
            'showFilters',
            'search',
            'selectedCategory',
            'selectedBrand',
            'selectedColors',
            'selectedSizes',
            'priceRange',
            'ratingFilter'
        ));
    }
}
