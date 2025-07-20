<?php

namespace App\Livewire;

use Livewire\Component;

class WishlistPage extends Component
{
    public function render()
    {
        $products = auth()->user()->wishlist()->with('category')->paginate(12);
        return view('livewire.wishlist-page', compact('products'));
    }
}
