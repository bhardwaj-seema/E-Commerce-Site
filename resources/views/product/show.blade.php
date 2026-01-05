<x-guest-layout>
    <div class="max-w-3xl mx-auto py-10 px-4">
    <img src="{{ asset('storage/'.$product->image) }}" class="w-full rounded mb-6">

    <h1 class="text-2xl font-semibold mb-2">{{ $product->name }}</h1>

    <p class="text-lg mb-2">₹{{ $product->price }}</p>

    <p class="text-gray-700 mb-6">{{ $product->description }}</p>

    <a href="https://wa.me/91XXXXXXXXXX?text=I'm interested in {{ $product->name }}"
       class="bg-green-600 text-white px-4 py-2 rounded">
       Order on WhatsApp
    </a>
</div>
</x-guest-layout>