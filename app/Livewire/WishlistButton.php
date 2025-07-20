<?php

namespace App\Livewire;

use Livewire\Component;

class WishlistButton extends Component
{
    public $product;

    public function toggleWishlist()
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }
        $user = auth()->user();
        if ($user->wishlist()->where('product_id', $this->product->id)->exists()) {
            $user->wishlist()->detach($this->product->id);
        } else {
            $user->wishlist()->attach($this->product->id);
        }
    }

    public function render()
    {
        $inWishlist = auth()->check() && auth()->user()->wishlist->contains($this->product->id);
        return view('livewire.wishlist-button', compact('inWishlist'));
    }
}
