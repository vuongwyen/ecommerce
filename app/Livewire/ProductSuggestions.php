<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;

class ProductSuggestions extends Component
{
    public $product;

    public function mount(Product $product)
    {
        $this->product = $product;
    }

    public function render()
    {
        $suggested = $this->product->suggestedProducts()->with('category')->take(8)->get();
        return view('livewire.product-suggestions', compact('suggested'));
    }
}
