<div class="max-w-5xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
    <div class="flex flex-col md:flex-row gap-8">
        <aside class="w-full md:w-1/4 mb-8 md:mb-0">
            <div class="bg-white shadow rounded-lg p-6">
                <nav class="space-y-2">
                    <a href="{{ route('account.info') }}" class="block px-4 py-2 rounded-md {{ request()->routeIs('account.info') ? 'bg-indigo-50 text-indigo-700 font-semibold' : 'text-gray-700 hover:bg-gray-100' }}">
                        Account Information
                    </a>
                    <a href="{{ route('orders.history') }}" class="block px-4 py-2 rounded-md {{ request()->routeIs('orders.history') ? 'bg-indigo-50 text-indigo-700 font-semibold' : 'text-gray-700 hover:bg-gray-100' }}">
                        Order History
                    </a>
                    <a href="{{ route('wishlist') }}" class="block px-4 py-2 rounded-md {{ request()->routeIs('wishlist') ? 'bg-indigo-50 text-indigo-700 font-semibold' : 'text-gray-700 hover:bg-gray-100' }}">
                        Wish List
                    </a>
                </nav>
            </div>
        </aside>
        <main class="flex-1">
            <div class="bg-white shadow rounded-lg p-8">
                <h1 class="text-2xl sm:text-3xl font-bold mb-6 text-center">Sản phẩm yêu thích</h1>
                @if($products->count())
                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
                    @foreach($products as $product)
                    <div class="bg-white rounded-lg shadow hover:shadow-lg transition flex flex-col group relative">
                        <a href="{{ route('product-detail', ['slug' => $product->slug]) }}" class="block overflow-hidden rounded-t-lg">
                            <img src="{{ $product->image_url }}" alt="{{ $product->name }}"
                                class="w-full aspect-square object-cover group-hover:scale-105 transition-transform duration-200" />
                        </a>
                        <div class="flex-1 flex flex-col p-3">
                            <a href="{{ route('product-detail', ['slug' => $product->slug]) }}" class="font-semibold text-gray-900 hover:text-pink-600 line-clamp-2 mb-1">
                                {{ $product->name }}
                            </a>
                            <div class="text-pink-500 font-bold mb-2">{{ number_format($product->price) }}₫</div>
                            <div class="mt-auto flex items-center justify-between">
                                <livewire:wishlist-button :product="$product" :key="$product->id" />
                                <a href="{{ route('cart.add', ['slug' => $product->slug]) }}"
                                    class="text-xs px-3 py-1 rounded bg-pink-500 text-white hover:bg-pink-600 transition font-medium">
                                    Thêm vào giỏ
                                </a>
                            </div>
                        </div>
                        <!-- Remove from wishlist button (optional, if not using the heart icon) -->
                        <!--
                    <button wire:click="$emit('removeFromWishlist', {{ $product->id }})"
                        class="absolute top-2 right-2 bg-white rounded-full p-1 shadow hover:bg-pink-100 transition">
                        <svg class="w-5 h-5 text-pink-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                    -->
                    </div>
                    @endforeach
                </div>
                <div class="mt-6 flex justify-center">
                    {{ $products->links() }}
                </div>
                @else
                <div class="text-center text-gray-500 py-12">
                    <svg class="mx-auto w-16 h-16 text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path d="M12 21l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41 0.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.18L12 21z" />
                    </svg>
                    <div>Chưa có sản phẩm nào trong danh sách yêu thích.</div>
                    <a href="{{ route('products.index') }}"
                        class="mt-4 inline-block px-4 py-2 bg-pink-500 text-white rounded hover:bg-pink-600 transition">
                        Khám phá sản phẩm
                    </a>
                </div>
                @endif
            </div>
        </main>
    </div>
</div>