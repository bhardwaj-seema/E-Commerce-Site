<div>
  

    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-semibold text-gray-800">Products</h2>

        <a href="{{ route('admin.products.create') }}"
           class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">
            Add Product
        </a>
    </div>

    <div class="bg-white shadow rounded-lg overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Image</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Name</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Price</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-600 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>

            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($products as $product)
                    <tr>
                        <td class="px-6 py-4">
                            <img src="{{ $product->image_url }}"
                                 class="h-12 w-12 rounded object-cover border">
                        </td>

                        <td class="px-6 py-4 text-gray-800 font-medium">
                            {{ $product->name }}
                        </td>

                        <td class="px-6 py-4 text-gray-700">
                            ₹{{ number_format($product->price, 2) }}
                        </td>

                        <td class="px-6 py-4">
                            @if ($product->status)
                                <span class="px-2 py-1 text-xs bg-green-100 text-green-700 rounded">Active</span>
                            @else
                                <span class="px-2 py-1 text-xs bg-red-100 text-red-700 rounded">Inactive</span>
                            @endif
                        </td>

                        <td class="px-6 py-4 text-right space-x-2">

                            <a href="{{ route('admin.products.edit', $product->id) }}"
                               class="px-3 py-1 text-sm bg-blue-500 text-white rounded hover:bg-blue-600">
                                Edit
                            </a>

                            <form action="{{ route('admin.products.destroy', $product->id) }}"
                                  method="POST"
                                  class="inline-block"
                                  onsubmit="return confirm('Delete this product?')">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="px-3 py-1 text-sm bg-red-500 text-white rounded hover:bg-red-600">
                                    Delete
                                </button>
                            </form>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>



</div>
