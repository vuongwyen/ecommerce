<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;

class ProductQuickView extends Component
{
    public $product = null;
    public $show = false;

    protected $listeners = ['openQuickView'];

    public function openQuickView($productId)
    {
        $this->product = Product::findOrFail($productId);
        $this->show = true;
    }

    public function close()
    {
        $this->show = false;
    }

    public function render()
    {
        return view('livewire.product-quick-view');
    }
}
