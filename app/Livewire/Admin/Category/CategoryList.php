<?php

namespace App\Livewire\Admin\Category;

use Livewire\Component;
use App\Models\Category;

class CategoryList extends Component
{
    public $categories;

    protected $listeners = ['confirmDelete'];

    public function mount()
    {
        $this->loadCategories();
    }

    public function loadCategories()
    {
        $this->categories = Category::orderBy('id', 'desc')->get();
    }

    public function delete($id)
    {
        $this->dispatch('confirmDelete', id: $id);
    }

    public function confirmDelete($id)
    {
        Category::findOrFail($id)->delete();
        session()->flash('success', 'Category deleted successfully.');
        $this->loadCategories();
    }

    public function render()
    {
        return view('livewire.admin.category.category-list');
    }
}
