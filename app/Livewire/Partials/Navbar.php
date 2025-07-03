<?php

namespace App\Livewire\Partials;

use Livewire\Component;
use Illuminate\Support\Facades\Session;
use App\Models\Category;

class Navbar extends Component
{
    public $categories = [];

    public function mount()
    {
        $this->categories = Category::where('is_active', true)->get();
    }

    public function getCartCountProperty()
    {
        $cart = Session::get('cart', []);
        return array_sum(array_column($cart, 'quantity'));
    }

    public function render()
    {
        return view('livewire.partials.navbar', [
            'categories' => $this->categories,
        ]);
    }
}
