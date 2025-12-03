<?php

namespace App\Livewire\Admin\Category;

use App\Models\Category;
use Livewire\Component;

class Form extends Component
{
    public $categoryId; // for editing
    public $name;
    public $slug;
    public $description;
    public $parent_id;

    public $categories; // for parent dropdown

    protected $rules = [
        'name' => 'required|string|max:255',
        'slug' => 'required|string|max:255|unique:categories,slug',
        'description' => 'nullable|string',
        'parent_id' => 'nullable|exists:categories,id',
    ];

    public function mount($categoryId = null)
    {
        $this->categories = Category::all();

        if ($categoryId) {
            $this->categoryId = $categoryId;
            $category = Category::findOrFail($categoryId);

            $this->name = $category->name;
            $this->slug = $category->slug;
            $this->description = $category->description;
            $this->parent_id = $category->parent_id;

            // For update, allow slug of current category
            $this->rules['slug'] = 'required|string|max:255|unique:categories,slug,' . $categoryId;
        }
    }

    public function save()
    {
        $this->validate();

        $data = [
            'name' => $this->name,
            'slug' => $this->slug,
            'description' => $this->description,
            'parent_id' => $this->parent_id,
        ];

        if ($this->categoryId) {
            // Update existing category
            $category = Category::findOrFail($this->categoryId);
            $category->update($data);
            session()->flash('success', 'Category updated successfully.');
            return redirect()->route('admin.categories.index');
        } else {
            // Create new category
            Category::create($data);
            session()->flash('success', 'Category created successfully.');
              return redirect()->route('admin.categories.index');
        }

        // Reset form
        $this->resetForm();
    }

    public function resetForm()
    {
        $this->name = '';
        $this->slug = '';
        $this->description = '';
        $this->parent_id = null;
    }
    public function render()
    {
        return view('livewire.admin.category.form');
    }
}
