<?php
namespace App\Livewire\Admin\Product;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductImage;

class Form extends Component
{
     use WithFileUploads;

    public $product;
    public $productId;

    public $name;
    public $slug;
    public $description;
    public $price;
    public $stock;
    public $category_id;
    public $is_active = true;

    public $categories;
    public $images = [];

    public function mount($productId = null)
    {
        $this->categories = Category::all();
        $this->productId = $productId;
        if ($productId) {
            $this->product = Product::findOrFail($productId);

            $this->name = $this->product->name;
            $this->slug = $this->product->slug;
            $this->description = $this->product->description;
            $this->price = $this->product->price;
            $this->stock = $this->product->stock;
            $this->category_id = $this->product->category_id;
            $this->is_active = $this->product->is_active;
        } else {
            $this->product = new Product();
        }
    }

    public function save()
    {
        $validated = $this->validate([
            'name' => 'required',
            'slug' => 'required|unique:products,slug,' . ($this->productId ?? 'NULL'),
            'description' => 'required',
            'price' => 'required|numeric|min:1',
            'stock' => 'required|integer|min:0',
            'category_id' => 'required',
            'is_active' => 'boolean',
        ]);

        $this->product->fill($validated);
        $this->product->save();

        session()->flash('success', 'Product saved successfully.');

        return redirect()->route('admin.products.index');
    }

    public function render()
    {
        return view('livewire.admin.product.form', [
        'categories' => Category::all(),
        'productId'=>$this->productId
    ]);
    }

}
