<div>
  

    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-semibold text-gray-800">Category</h2>

        <a href="{{ route('admin.categories.create') }}"
           class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">
            Add Category
        </a>
    </div>

    <div class="bg-white shadow rounded-lg overflow-hidden">
      <div x-data="{ open: false, deleteId: null }">

    {{-- Success Message --}}
    @if (session('success'))
        <div class="bg-green-100 text-green-700 px-4 py-2 mb-3 rounded">
            {{ session('success') }}
        </div>
    @endif

    <table class="w-full bg-white shadow rounded">
        <thead>
            <tr class=" text-left">
                <th class="px-4 py-2">Name</th>
                <th class="px-4 py-2">Slug</th>
                <th class="px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr class="border-t">
                    <td class="px-4 py-2">{{ $category->name }}</td>
                    <td class="px-4 py-2">{{ $category->slug }}</td>

                    <td class="px-4 py-2 flex space-x-2">
                        <a href="{{ route('admin.categories.edit', $category->id) }}"
                           class="px-3 py-1 bg-blue-500 text-white rounded">
                            Edit
                        </a>

                        <button
                            @click="open = true; deleteId = {{ $category->id }}"
                            class="px-3 py-1 bg-red-500 text-white rounded">
                            Delete
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{-- Delete Confirmation Modal --}}
    <div x-show="open"
         x-cloak
         class="fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center z-50">

        <div class="bg-white p-6 rounded shadow-lg w-full max-w-sm">
            <h2 class="text-lg font-semibold mb-3">Confirm Delete</h2>
            <p class="text-gray-700 mb-6">
                Are you sure you want to delete this category?
            </p>

            <div class="flex justify-end space-x-3">
                <button @click="open = false"
                        class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300">
                    Cancel
                </button>

                <button
                    @click="$wire.confirmDelete(deleteId); open = false"
                    class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">
                    Delete
                </button>
            </div>
        </div>
    </div>

</div>

    </div>



</div>

