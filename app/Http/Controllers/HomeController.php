<?php
namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query();

        // Search
        if ($request->search) {
            $query->where('name', 'like', "%{$request->search}%");
        }

        // Category filter
        if ($request->category) {
            $query->where('category_id', $request->category);
        }

        $products = $query->latest()->paginate(12);
        $categories = Category::all();

        return view('welcome', compact('products', 'categories'));
    }

   public function show($slug)
{
    $product = Product::where('slug', $slug)->firstOrFail();
    return view('products.show', compact('product'));
}

}
