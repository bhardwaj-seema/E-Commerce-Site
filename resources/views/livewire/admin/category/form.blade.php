<div class="max-w-3xl mx-auto bg-white shadow rounded p-6">

    {{-- Header --}}
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-semibold text-gray-800">
            {{ $categoryId ? 'Edit Category' : 'Create Category' }}
        </h2>
        <a href="{{ route('admin.categories.index') }}"
               class="px-4 py-2 text-sm bg-gray-200 hover:bg-gray-300 rounded-md font-medium">
                Back
            </a>
    </div>

    {{-- Success Message --}}
    @if (session()->has('success'))
        <div class="bg-green-100 text-green-700 px-4 py-2 mb-4 rounded">
            {{ session('success') }}
        </div>
    @endif

    {{-- Form --}}
    <form wire:submit.prevent="save" class="space-y-4">

        {{-- Name --}}
        <div>
            <label class="block text-gray-700 font-medium mb-1">Name</label>
            <input type="text" wire:model="name" class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">
            @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        {{-- Slug --}}
        <div>
            <label class="block text-gray-700 font-medium mb-1">Slug</label>
            <input type="text" wire:model="slug" class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">
            @error('slug') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        {{-- Description --}}
        <div>
            <label class="block text-gray-700 font-medium mb-1">Description</label>
            <textarea wire:model="description" class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500" rows="4"></textarea>
            @error('description') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        {{-- Parent Category --}}
        <div>
            <label class="block text-gray-700 font-medium mb-1">Parent Category</label>
            <select wire:model="parent_id" class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                <option value="">-- None --</option>
                @foreach($categories as $cat)
                    @if($cat->id != $categoryId)
                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                    @endif
                @endforeach
            </select>
            @error('parent_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        {{-- Submit Button --}}
        <div class="pt-2">
            <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-medium px-6 py-2 rounded">
                {{ $categoryId ? 'Update Category' : 'Create Category' }}
            </button>
        </div>

    </form>
</div>
