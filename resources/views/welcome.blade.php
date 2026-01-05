<x-guest-layout>

<div class=" py-10">

    <div class="max-w-7xl mx-auto px-6">

        <!-- Top Filters -->
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-8">

            <!-- Search -->
            <form action="{{ route('home') }}" method="GET" class="w-full md:w-1/2">
                <input type="text"
                       name="search"
                       placeholder="Search products..."
                       value="{{ request('search') }}"
                       class="w-full px-4 py-2 border rounded-lg shadow-sm focus:ring"
                >
            </form>

            <!-- Category Dropdown -->
            <form action="{{ route('home') }}" method="GET">
                <select name="category"
                        onchange="this.form.submit()"
                        class=" py-2 border rounded-lg shadow-sm bg-white">
                    <option value="">All Categories</option>

                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}" {{ request('category') == $cat->id ? 'selected' : '' }}>
                            {{ $cat->name }}
                        </option>
                    @endforeach
                </select>
            </form>

        </div>

        <!-- Product Grid (Instagram Style) -->
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-6">

            @foreach($products as $product)
                <div class="bg-white shadow rounded-xl overflow-hidden group relative">

                    <!-- SALE / HOT / NEW badge -->
                    @if($product->label)
                        <span class="absolute top-3 left-3 bg-red-600 text-white px-2 py-1 text-xs rounded">
                            {{ strtoupper($product->label) }}
                        </span>
                    @endif

                    <!-- Image -->
                    <a class="border border-none" href="{{ route('products.show', $product->slug) }}">
                        <img  src="{{ asset('storage/'.$product->image) }}"
                             class="w-full h-64 object-cover transform group-hover:scale-105 transition duration-300">
                    </a>

                    <!-- Product Details Instagram-style -->
                    <div class="p-3">

                        <h3 class="font-semibold text-base truncate">
                            {{ $product->name }}
                        </h3>

                        <div class="flex items-center justify-between mt-2">
                            <span class="font-bold text-lg">₹{{ $product->price }}</span>
                            <a href="https://wa.me/91XXXXXXXXXX?text=I'm interested in {{ $product->name }}"
                               class="text-sm bg-black text-white px-3 py-1 rounded">
                                Order
                            </a>
                        </div>

                    </div>
                </div>
            @endforeach

        </div>

        <!-- Pagination -->
        <div class="mt-10">
            {{ $products->links() }}
        </div>

    </div>
</div>



</x-guest-layout>