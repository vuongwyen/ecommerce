@if($suggested->count())
<div class="mt-8">
    <h2 class="text-lg sm:text-xl font-bold mb-4">Sản phẩm gợi ý</h2>
    <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
        @foreach($suggested as $product)
        <a href="{{ route('products.show', $product) }}" class="bg-white rounded-lg shadow hover:shadow-lg transition flex flex-col group">
            <img src="{{ $product->image_url }}" alt="{{ $product->name }}"
                class="w-full aspect-square object-cover rounded-t-lg group-hover:scale-105 transition-transform duration-200" />
            <div class="p-3 flex-1 flex flex-col">
                <div class="font-semibold text-gray-900 line-clamp-2 mb-1">{{ $product->name }}</div>
                <div class="text-pink-500 font-bold">{{ number_format($product->price) }}₫</div>
            </div>
        </a>
        @endforeach
    </div>
</div>
@endif