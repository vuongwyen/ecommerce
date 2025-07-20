<?php

namespace App\Livewire\Partials;

use Livewire\Component;
use Illuminate\Support\Facades\Session;
use App\Models\Category;
use App\Services\CartService;

class Navbar extends Component
{
    public $categories = [];

    public function mount()
    {
        $this->categories = Category::where('is_active', true)->get();
    }

    public function getCartCountProperty()
    {
        $cartService = app(CartService::class);
        return $cartService->getCartCount();
    }

    public function render()
    {
        return view('livewire.partials.navbar', [
            'categories' => $this->categories,
        ]);
    }
}
