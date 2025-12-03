<?php

namespace App\Livewire\Admin\Product;

use Livewire\Component;
use App\Models\Product;

class ProductsList extends Component
{
    public function render()
    {
        return view('livewire.admin.product.products-list', [
            'products' => Product::latest()->get()
        ]);
    }
}
