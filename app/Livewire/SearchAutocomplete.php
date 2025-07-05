<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\Attributes\On;

class SearchAutocomplete extends Component
{
    public $query = '';
    public $showDropdown = false;
    public $products = [];
    public $selectedIndex = -1;

    protected $listeners = ['searchUpdated'];

    public function updatedQuery()
    {
        if (strlen($this->query) >= 2) {
            $this->searchProducts();
        } else {
            $this->products = [];
            $this->showDropdown = false;
        }
    }

    public function searchProducts()
    {
        $this->products = Product::where('name', 'LIKE', '%' . $this->query . '%')
            ->orWhere('description', 'LIKE', '%' . $this->query . '%')
            ->select('id', 'name', 'price', 'images', 'slug')
            ->limit(5)
            ->get()
            ->map(function ($product) {
                return [
                    'id' => $product->id,
                    'name' => $product->name,
                    'price' => $product->price,
                    'slug' => $product->slug,
                    'image' => $product->getImageUrl()
                ];
            })
            ->toArray();

        $this->showDropdown = count($this->products) > 0;
        $this->selectedIndex = -1;
    }

    public function selectProduct($productId)
    {
        $product = Product::find($productId);
        if ($product) {
            $this->query = $product->name;
            $this->showDropdown = false;
            $this->products = [];

            // Redirect to product detail page
            return redirect()->route('product-detail', $product->slug ?? $product->id);
        }
    }

    public function selectNext()
    {
        if ($this->selectedIndex < count($this->products) - 1) {
            $this->selectedIndex++;
        }
    }

    public function selectPrevious()
    {
        if ($this->selectedIndex > 0) {
            $this->selectedIndex--;
        } else {
            $this->selectedIndex = -1;
        }
    }

    public function handleKeydown($key)
    {
        switch ($key) {
            case 'ArrowDown':
                $this->selectNext();
                break;
            case 'ArrowUp':
                $this->selectPrevious();
                break;
            case 'Enter':
                if ($this->selectedIndex >= 0 && isset($this->products[$this->selectedIndex])) {
                    $this->selectProduct($this->products[$this->selectedIndex]['id']);
                }
                break;
            case 'Escape':
                $this->showDropdown = false;
                $this->selectedIndex = -1;
                break;
        }
    }

    public function render()
    {
        return view('livewire.search-autocomplete');
    }
}
