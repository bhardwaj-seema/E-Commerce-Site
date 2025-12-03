<div class="w-full">
    <div class="p-6 bg-white shadow-md rounded-lg">

        {{-- Header Row --}}
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-800">
                {{ $productId ? 'Edit Product' : 'Create Product' }}
            </h2>

            <a href="{{ route('admin.products.index') }}"
               class="px-4 py-2 text-sm bg-gray-200 hover:bg-gray-300 rounded-md font-medium">
                Back
            </a>
        </div>

        @if(session('success'))
            <div class="bg-green-100 border border-green-200 text-green-700 px-4 py-2 mb-6 rounded-md">
                {{ session('success') }}
            </div>
        @endif

        <form wire:submit.prevent="save" class="space-y-6">

            {{-- NAME --}}
            <div>
                <label class="block text-sm font-semibold mb-1 text-gray-700">Name</label>
                <input wire:model="name"
                       type="text"
                       class="w-full border-gray-300 rounded-lg p-3 focus:ring-indigo-500 focus:border-indigo-500">
                @error('name') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
            </div>

            {{-- SLUG --}}
            <div>
                <label class="block text-sm font-semibold mb-1 text-gray-700">Slug</label>
                <input wire:model="slug"
                       type="text"
                       class="w-full border-gray-300 rounded-lg p-3 focus:ring-indigo-500 focus:border-indigo-500">
                @error('slug') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
            </div>

            {{-- DESCRIPTION --}}
            <div>
                <label class="block text-sm font-semibold mb-1 text-gray-700">Description</label>
                <textarea wire:model="description"
                          class="w-full border-gray-300 rounded-lg p-3 focus:ring-indigo-500 focus:border-indigo-500 h-28"></textarea>
                @error('description') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
            </div>

            {{-- PRICE + STOCK --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-semibold mb-1 text-gray-700">Price</label>
                    <input wire:model="price"
                           type="number"
                           class="w-full border-gray-300 rounded-lg p-3 focus:ring-indigo-500 focus:border-indigo-500">
                    @error('price') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-sm font-semibold mb-1 text-gray-700">Stock</label>
                    <input wire:model="stock"
                           type="number"
                           class="w-full border-gray-300 rounded-lg p-3 focus:ring-indigo-500 focus:border-indigo-500">
                    @error('stock') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
                </div>
            </div>

            {{-- CATEGORY --}}
            <div>
                <label class="block text-sm font-semibold mb-1 text-gray-700">Category</label>
                <select wire:model="category_id"
                        class="w-full border-gray-300 rounded-lg p-3 focus:ring-indigo-500 focus:border-indigo-500">
                    <option value="">Select</option>
                    @foreach($categories as $c)
                        <option value="{{ $c->id }}">{{ $c->name }}</option>
                    @endforeach
                </select>
                @error('category_id') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
            </div>

            {{-- ACTIVE CHECKBOX --}}
            <div class="flex items-center gap-2">
                <input type="checkbox"
                       wire:model="is_active"
                       class="h-4 w-4 text-indigo-600 rounded">
                <label class="text-gray-700 text-sm font-medium">Active</label>
            </div>

            {{-- SAVE BUTTON --}}
            <div>
                <button class="px-6 py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-lg">
                    Save Product
                </button>
            </div>

        </form>
    </div>
</div>
