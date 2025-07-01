<div>@if($show)
    <div class="fixed inset-0 z-50 bg-black bg-opacity-50 flex items-center justify-center">
        <div class="bg-white rounded-lg shadow-lg w-[90%] max-w-xl relative p-6">
            <button wire:click="close" class="absolute top-3 right-3 text-gray-500 hover:text-black">✕</button>

            @if ($product)
            <img src="{{ $product->getImageUrl() }}" alt="{{ $product->name }}" class="w-full h-64 object-cover mb-4 rounded">
            <h2 class="text-2xl font-bold mb-2">{{ $product->name }}</h2>
            <p class="text-gray-600 mb-4">{{ $product->description }}</p>
            <div class="text-xl text-purple-600 font-semibold mb-4">${{ number_format($product->price, 2) }}</div>
            <button class="w-full bg-purple-600 text-white py-2 rounded hover:bg-purple-700 transition">Add to Cart</button>
            @endif
        </div>
    </div>
    @endif
</div>