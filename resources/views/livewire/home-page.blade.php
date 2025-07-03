<div class="min-h-screen">
    <!-- Hero Section -->
    <section class="relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <!-- Left Content -->
                <div class="space-y-8">
                    <div class="space-y-4">
                        <span class="inline-block px-4 py-2 bg-gradient-to-r from-purple-500 to-pink-500 text-white text-sm font-semibold rounded-full">
                            ✨ NEW COLLECTION
                        </span>
                        <h1 class="text-5xl lg:text-6xl font-bold text-gray-900 leading-tight">
                            Express Your
                            <span class="bg-gradient-to-r from-purple-600 via-pink-600 to-orange-500 bg-clip-text text-transparent">
                                Unique Style
                            </span>
                        </h1>
                        <p class="text-xl text-gray-600 leading-relaxed">
                            Discover the latest trends in streetwear, accessories, and fashion that define your generation.
                            Shop the styles that speak your language.
                        </p>
                    </div>

                    <div class="flex flex-col sm:flex-row gap-4">
                        <button class="px-8 py-4 bg-gradient-to-r from-purple-600 to-pink-600 text-white font-semibold rounded-full hover:from-purple-700 hover:to-pink-700 transition-all duration-300 transform hover:scale-105">
                            Shop Now
                        </button>
                        <button class="px-8 py-4 border-2 border-gray-300 text-gray-700 font-semibold rounded-full hover:border-purple-500 hover:text-purple-600 transition-all duration-300">
                            View Lookbook
                        </button>
                    </div>

                    <!-- Stats -->
                    <div class="flex space-x-8 pt-8">
                        <div class="text-center">
                            <div class="text-2xl font-bold text-gray-900">50K+</div>
                            <div class="text-sm text-gray-600">Happy Customers</div>
                        </div>
                        <div class="text-center">
                            <div class="text-2xl font-bold text-gray-900">1000+</div>
                            <div class="text-sm text-gray-600">Unique Styles</div>
                        </div>
                        <div class="text-center">
                            <div class="text-2xl font-bold text-gray-900">24/7</div>
                            <div class="text-sm text-gray-600">Support</div>
                        </div>
                    </div>
                </div>

                <!-- Right Image -->
                <div class="relative">
                    <div class="relative z-10">
                        <img src="https://images.unsplash.com/photo-1441986300917-64674bd600d8?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80"
                            alt="Fashion Model"
                            class="w-full h-96 object-cover rounded-2xl shadow-2xl">
                    </div>
                    <!-- Floating Elements -->
                    <div class="absolute -top-4 -right-4 bg-white p-4 rounded-2xl shadow-lg">
                        <div class="text-center">
                            <div class="text-2xl font-bold text-purple-600">🔥</div>
                            <div class="text-sm font-semibold text-gray-800">Trending</div>
                        </div>
                    </div>
                    <div class="absolute -bottom-4 -left-4 bg-gradient-to-r from-pink-500 to-purple-500 p-4 rounded-2xl shadow-lg text-white">
                        <div class="text-center">
                            <div class="text-2xl font-bold">-50%</div>
                            <div class="text-sm">Sale</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Categories Section -->
    <section class="py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Shop by Category</h2>
                <p class="text-gray-600">Find your perfect style in our curated collections</p>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                <!-- Category Cards -->
                @foreach($categories as $category)

                <div class="group cursor-pointer">
                    <div class="relative overflow-hidden rounded-2xl bg-gradient-to-br from-purple-100 to-pink-100 p-6 text-center transition-all duration-300 group-hover:scale-105">
                        <div class="text-4xl mb-4">
                            <img src="{{ $category->image }}" alt="{{ $category->name }}" class="w-16 h-16 mx-auto">
                        </div>
                        <a href="{{ route('product-list', ['category' => $category->slug]) }}" class="block px-4 py-2 text-gray-700 hover:bg-purple-100">
                            <h3 class="font-semibold text-gray-900 mb-2">
                                {{ $category->name }}
                            </h3>
                        </a>
                        <p class="text-sm text-gray-600">{{ $category->description }}</p>
                    </div>
                </div>
                @endforeach

                <!-- <div class="group cursor-pointer">
                    <div class="relative overflow-hidden rounded-2xl bg-gradient-to-br from-pink-100 to-orange-100 p-6 text-center transition-all duration-300 group-hover:scale-105">
                        <div class="text-4xl mb-4">👗</div>
                        <h3 class="font-semibold text-gray-900 mb-2">Dresses</h3>
                        <p class="text-sm text-gray-600">Feminine charm</p>
                    </div>
                </div>

                <div class="group cursor-pointer">
                    <div class="relative overflow-hidden rounded-2xl bg-gradient-to-br from-orange-100 to-yellow-100 p-6 text-center transition-all duration-300 group-hover:scale-105">
                        <div class="text-4xl mb-4">👟</div>
                        <h3 class="font-semibold text-gray-900 mb-2">Sneakers</h3>
                        <p class="text-sm text-gray-600">Street style</p>
                    </div>
                </div>

                <div class="group cursor-pointer">
                    <div class="relative overflow-hidden rounded-2xl bg-gradient-to-br from-yellow-100 to-green-100 p-6 text-center transition-all duration-300 group-hover:scale-105">
                        <div class="text-4xl mb-4">👜</div>
                        <h3 class="font-semibold text-gray-900 mb-2">Accessories</h3>
                        <p class="text-sm text-gray-600">Complete the look</p>
                    </div>
                </div> -->
            </div>
        </div>
    </section>

    <!-- Trending Products -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Trending Products</h2>
                <p class="text-gray-600">Check out what's hot right now</p>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                @foreach($randomProducts as $product)
                <div class="group bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden hover:shadow-lg transition-all duration-300 flex flex-col">
                    <!-- Product Image -->
                    <div class="relative overflow-hidden">
                        <img src="{{ $product->getImageUrl() }}"
                            alt="{{ $product->name }}"
                            class="w-full h-64 object-cover transition-transform duration-300 group-hover:scale-110">

                        <!-- Badges -->
                        <div class="absolute top-3 left-3 flex flex-col gap-2 z-10">
                            @if($product->on_sale)
                            <span class="bg-red-500 text-white px-2 py-1 rounded-full text-xs font-semibold shadow">
                                Sale
                            </span>
                            @endif
                            @if($product->is_featured)
                            <span class="bg-purple-500 text-white px-2 py-1 rounded-full text-xs font-semibold shadow">
                                Featured
                            </span>
                            @endif
                        </div>

                        <!-- Quick Actions -->
                        <div class="absolute top-3 right-3 flex flex-col gap-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300 z-10">
                            <button class="w-8 h-8 bg-white rounded-full shadow-md flex items-center justify-center hover:bg-gray-50 transition-colors">
                                <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                </svg>
                            </button>
                            <button class="w-8 h-8 bg-white rounded-full shadow-md flex items-center justify-center hover:bg-gray-50 transition-colors">
                                <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </button>
                        </div>

                        <!-- Quick View Button -->
                        <!-- <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-10 transition-all duration-300 flex items-center justify-center pointer-events-none group-hover:pointer-events-auto z-10">
                            <button onclick="window.Livewire.emit('openQuickView', '{{ $product->id }}')"
                                class="bg-white text-gray-900 px-4 py-2 rounded-lg font-medium opacity-0 group-hover:opacity-100 transition-opacity duration-300 transform translate-y-2 group-hover:translate-y-0 shadow">
                                Quick View
                            </button>
                        </div> -->
                    </div>

                    <!-- Product Info -->
                    <div class="p-4 flex-1 flex flex-col justify-between">
                        <div>
                            <h3 class="font-semibold text-gray-900 group-hover:text-purple-600 transition-colors mb-2 text-lg">
                                <a href="{{ route('product-detail', ['slug' => $product->slug]) }}">
                                    {{ $product->name }}
                                </a>
                            </h3>

                            <div class="flex items-center justify-between mb-3">
                                <span class="text-lg font-bold text-gray-900">${{ number_format($product->price, 2) }}</span>
                                <div class="flex items-center space-x-1">
                                    <div class="flex text-yellow-400">
                                        @for($i = 1; $i <= 5; $i++)
                                            <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                            <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                                            </svg>
                                            @endfor
                                    </div>
                                    <span class="text-sm text-gray-600">({{ rand(10, 200) }})</span>
                                </div>
                            </div>

                            <div class="flex flex-wrap items-center gap-2 text-sm text-gray-500 mb-4">
                                @if($product->category)
                                <span>{{ $product->category->name }}</span>
                                @endif
                                @if($product->gender)
                                <span>{{ $product->gender}}</span>
                                @endif
                                @if($product->brand)
                                <span>• {{ $product->brand->name }}</span>
                                @endif
                            </div>
                        </div>
                        <!-- Add to Cart Button -->
                        @php
                        $quantity = $quantity ?? 1;
                        @endphp
                        <button class="w-full bg-purple-600 text-white py-2 rounded-lg hover:bg-purple-700 transition-colors font-medium mt-auto">
                            Add to Cart - ${{ number_format($product->price * $quantity, 2) }}
                        </button>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Newsletter Section -->
    <section class="py-16 bg-gradient-to-r from-purple-600 to-pink-600">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl font-bold text-white mb-4">Stay in the Loop! 🚀</h2>
            <p class="text-purple-100 mb-8 text-lg">
                Get exclusive access to new drops, style tips, and member-only discounts.
                Join our community of fashion-forward individuals.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 max-w-md mx-auto">
                <input type="email" placeholder="Enter your email"
                    class="flex-1 px-6 py-3 rounded-full border-0 focus:outline-none focus:ring-2 focus:ring-white">
                <button class="px-8 py-3 bg-white text-purple-600 font-semibold rounded-full hover:bg-gray-100 transition-colors">
                    Subscribe
                </button>
            </div>
        </div>
    </section>


</div>