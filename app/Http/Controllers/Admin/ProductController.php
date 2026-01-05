<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        return view('admin.products.index');
    }

  public function create()
{
    return view('admin.products.create');
}


   public function edit($id)
{
    $product = Product::findOrFail($id);
    return view('admin.products.edit', [
        'productId' => $product->id
    ]);
}

public function destroy($id){
    $product = Product::findOrFail($id);
    $product->delete();
    
}

}
 