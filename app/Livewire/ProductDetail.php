<?php

namespace App\Livewire;

use App\Models\Product;
use App\Models\Size;
use App\Models\Color;
use Livewire\Component;

class ProductDetail extends Component
{
    public Product $product;
    public $selectedImage = 0;
    public $quantity = 1;
    public $selectedSize = '';
    public $selectedColor = '';

    public function mount($slug)
    {
        $this->product = Product::where('slug', $slug)
            ->where('is_active', true)
            ->with(['category', 'brand', 'sizes', 'colors'])
            ->firstOrFail();
    }

    public function selectImage($index)
    {
        $this->selectedImage = $index;
    }

    public function incrementQuantity()
    {
        $this->quantity++;
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

        $cart = session()->get('cart', []);
        $productId = $this->product->id;

        // Check if product already exists in cart
        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] += $this->quantity;
        } else {
            $cart[$productId] = [
                'quantity' => $this->quantity,
                'size' => $this->selectedSize,
                'color' => $this->selectedColor,
            ];
        }

        session()->put('cart', $cart);
        session()->flash('success', 'Product added to cart successfully!');

        // Reset quantity
        $this->quantity = 1;
    }

    public function render()
    {
        return view('livewire.product-detail');
    }
}
