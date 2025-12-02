namespace App\Http\Livewire\Admin\Product;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductImage;

class Form extends Component
{
    use WithFileUploads;

    public ?Product $product;
    public $name, $slug, $description, $price, $stock, $category_id, $is_active = true;
    public $images = []; // temporary uploads

    protected function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:products,slug,'.($this->product->id ?? 'NULL'),
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'category_id' => 'nullable|exists:categories,id',
            'images.*' => 'image|max:2048',
        ];
    }

    public function mount($id = null)
    {
        $this->product = $id ? Product::findOrFail($id) : new Product();
        if ($this->product && $this->product->exists) {
            $this->fill($this->product->toArray());
        }
    }

    public function save()
    {
        $this->validate();

        $data = [
            'name' => $this->name,
            'slug' => $this->slug,
            'description' => $this->description,
            'price' => $this->price,
            'stock' => $this->stock,
            'category_id' => $this->category_id,
            'is_active' => $this->is_active,
        ];

        $this->product = Product::updateOrCreate(['id' => $this->product->id ?? null], $data);

        // handle uploaded images
        foreach ($this->images as $uploaded) {
            $path = $uploaded->store('products', 'public');
            ProductImage::create([
                'product_id' => $this->product->id,
                'path' => $path,
            ]);
        }

        session()->flash('success', 'Product saved.');
        return redirect()->route('admin.products.index');
    }

    public function render()
    {
        return view('livewire.admin.product.form', [
            'categories' => Category::orderBy('name')->get()
        ]);
    }
}
