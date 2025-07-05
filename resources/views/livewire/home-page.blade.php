<main>
    <!-- Hero Banner Section -->
    <section class="relative bg-gradient-to-r from-purple-600 to-pink-600 text-white overflow-hidden">
        <div class="absolute inset-0 bg-black opacity-20"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 lg:py-32">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div class="space-y-8">
                    <h1 class="text-4xl lg:text-6xl font-bold leading-tight">
                        Discover Your
                        <span class="text-yellow-300">Perfect Style</span>
                    </h1>
                    <p class="text-xl lg:text-2xl text-gray-100 leading-relaxed">
                        Explore our curated collection of premium fashion and beauty products.
                        Free shipping on orders over $50.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href="{{ route('product-list') }}"
                            class="inline-flex items-center justify-center px-8 py-4 bg-yellow-400 text-gray-900 font-semibold rounded-lg hover:bg-yellow-300 transition-colors duration-300 text-lg">
                            Shop Now
                            <svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </a>
                        <a href="{{ route('new-arrivals') }}"
                            class="inline-flex items-center justify-center px-8 py-4 border-2 border-white text-white font-semibold rounded-lg hover:bg-white hover:text-gray-900 transition-colors duration-300 text-lg">
                            New Arrivals
                        </a>
                    </div>
                    <div class="flex items-center space-x-8 text-sm">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            Free Shipping
                        </div>
                        <div class="flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            Easy Returns
                        </div>
                        <div class="flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            Secure Payment
                        </div>
                    </div>
                </div>
                <div class="relative">
                    <img src="{{ asset('images/hero-banner.jpg') }}"
                        alt="Fashion Collection"
                        class="w-full h-auto rounded-2xl shadow-2xl">
                    <!-- onerror="this.src='{{ asset('images/placeholder-hero.jpg') }}'" -->
                </div>
            </div>
    </section>

    <!-- Featured Categories Section -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-4">Shop by Category</h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">Discover our carefully curated categories featuring the latest trends and timeless classics</p>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-6">
                @foreach($featuredCategories as $category)
                <a href="{{ route('product-list', ['category' => $category->slug]) }}"
                    class="group block text-center p-6 rounded-xl bg-gray-50 hover:bg-gray-100 transition-all duration-300">
                    <div class="w-16 h-16 mx-auto mb-4 bg-gradient-to-br from-purple-400 to-pink-400 rounded-full flex items-center justify-center text-white text-2xl font-bold">
                        {{ strtoupper(substr($category->name, 0, 1)) }}
                    </div>
                    <h3 class="font-semibold text-gray-900 group-hover:text-purple-600 transition-colors">{{ $category->name }}</h3>
                    <p class="text-sm text-gray-500 mt-1">{{ $category->products_count }} Products</p>
                </a>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Featured Products Section -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-4">Featured Products</h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">Handpicked products that our customers love</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($featuredProducts as $product)
                <div class="bg-white rounded-xl shadow-sm hover:shadow-lg transition-shadow duration-300 overflow-hidden group">
                    <div class="relative aspect-square overflow-hidden">
                        <img src="{{ $product->getImageUrl() }}"
                            alt="{{ $product->name }}"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                        @if($product->on_sale)
                        <div class="absolute top-2 left-2 bg-red-500 text-white px-2 py-1 rounded-full text-xs font-semibold">
                            SALE
                        </div>
                        @endif
                    </div>
                    <div class="p-4">
                        <h3 class="font-semibold text-gray-900 mb-2 line-clamp-2">{{ $product->name }}</h3>
                        <p class="text-sm text-gray-500 mb-3">{{ $product->category->name }}</p>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-2">
                                <span class="text-lg font-bold text-gray-900">${{ number_format($product->price, 2) }}</span>
                                @if($product->on_sale)
                                <span class="text-sm text-gray-500 line-through">${{ number_format($product->price * 1.2, 2) }}</span>
                                @endif
                            </div>
                            <div class="flex items-center">
                                @for($i = 1; $i <= 5; $i++)
                                    <svg class="w-4 h-4 {{ $i <= $product->average_rating ? 'text-yellow-400' : 'text-gray-300' }}" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                    </svg>
                                    @endfor
                                    <span class="text-xs text-gray-500 ml-1">({{ $product->review_count }})</span>
                            </div>
                        </div>
                    </div>
                    <div class="p-4 pt-0">
                        <a href="{{ route('product-detail', $product->slug) }}"
                            class="block w-full bg-purple-600 text-white text-center py-2 rounded-lg hover:bg-purple-700 transition-colors duration-300">
                            View Details
                        </a>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="text-center mt-8">
                <a href="{{ route('product-list') }}"
                    class="inline-flex items-center px-6 py-3 border-2 border-purple-600 text-purple-600 font-semibold rounded-lg hover:bg-purple-600 hover:text-white transition-colors duration-300">
                    View All Products
                    <svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                    </svg>
                </a>
            </div>
        </div>
    </section>

    <!-- Sale/Promotion Section -->
    @if($saleProducts->count() > 0)
    <section class="py-16 bg-gradient-to-r from-red-500 to-pink-500 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl lg:text-4xl font-bold mb-4">Limited Time Offers</h2>
                <p class="text-xl opacity-90">Up to 50% off on selected items. Don't miss out!</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($saleProducts->take(3) as $product)
                <div class="bg-white/10 backdrop-blur-sm rounded-xl p-6 hover:bg-white/20 transition-colors duration-300">
                    <div class="relative aspect-square mb-4 rounded-lg overflow-hidden">
                        <img src="{{ $product->getImageUrl() }}"
                            alt="{{ $product->name }}"
                            class="w-full h-full object-cover">
                    </div>
                    <h3 class="font-semibold text-lg mb-2">{{ $product->name }}</h3>
                    <div class="flex items-center space-x-2 mb-3">
                        <span class="text-2xl font-bold">${{ number_format($product->price, 2) }}</span>
                        <span class="text-lg line-through opacity-75">${{ number_format($product->price * 1.2, 2) }}</span>
                    </div>
                    <a href="{{ route('product-detail', $product->slug) }}"
                        class="block w-full bg-white text-red-500 text-center py-2 rounded-lg font-semibold hover:bg-gray-100 transition-colors duration-300">
                        Shop Now
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- New Arrivals Section -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-4">New Arrivals</h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">Be the first to discover our latest additions</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($newArrivals->take(4) as $product)
                <div class="bg-white rounded-xl shadow-sm hover:shadow-lg transition-shadow duration-300 overflow-hidden group">
                    <div class="relative aspect-square overflow-hidden">
                        <img src="{{ $product->getImageUrl() }}"
                            alt="{{ $product->name }}"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                        <div class="absolute top-2 right-2 bg-green-500 text-white px-2 py-1 rounded-full text-xs font-semibold">
                            NEW
                        </div>
                    </div>
                    <div class="p-4">
                        <h3 class="font-semibold text-gray-900 mb-2 line-clamp-2">{{ $product->name }}</h3>
                        <p class="text-sm text-gray-500 mb-3">{{ $product->category->name }}</p>
                        <div class="flex items-center justify-between">
                            <span class="text-lg font-bold text-gray-900">${{ number_format($product->price, 2) }}</span>
                            <div class="flex items-center">
                                @for($i = 1; $i <= 5; $i++)
                                    <svg class="w-4 h-4 {{ $i <= $product->average_rating ? 'text-yellow-400' : 'text-gray-300' }}" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                    </svg>
                                    @endfor
                            </div>
                        </div>
                    </div>
                    <div class="p-4 pt-0">
                        <a href="{{ route('product-detail', $product->slug) }}"
                            class="block w-full bg-gray-900 text-white text-center py-2 rounded-lg hover:bg-gray-800 transition-colors duration-300">
                            View Details
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Latest Articles Section -->
    @if($latestArticles->count() > 0)
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-4">Latest Articles</h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">Stay updated with the latest fashion trends and tips</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($latestArticles as $article)
                <article class="bg-white rounded-xl shadow-sm hover:shadow-lg transition-shadow duration-300 overflow-hidden">
                    <div class="aspect-video overflow-hidden">
                        <img src="{{ asset('storage/' . $article->featured_image) }}"
                            alt="{{ $article->title }}"
                            class="w-full h-full object-cover">
                        <!-- onerror="this.src='{{ asset('images/placeholder-article.jpg') }}'" -->
                    </div>
                    <div class="p-6">
                        <div class="flex items-center text-sm text-gray-500 mb-3">
                            <span>{{ $article->published_at->format('M d, Y') }}</span>
                            <span class="mx-2">•</span>
                            <span>{{ $article->author->name }}</span>
                        </div>
                        <h3 class="font-semibold text-lg text-gray-900 mb-3 line-clamp-2">{{ $article->title }}</h3>
                        <p class="text-gray-600 mb-4 line-clamp-3">{{ $article->excerpt }}</p>
                        <a href="{{ route('articles.show', $article->slug) }}"
                            class="text-purple-600 font-semibold hover:text-purple-700 transition-colors duration-300">
                            Read More →
                        </a>
                    </div>
                </article>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- Customer Reviews Section -->
    @if($featuredReviews->count() > 0)
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-4">What Our Customers Say</h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">Real reviews from verified customers</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($featuredReviews->take(6) as $review)
                <div class="bg-gray-50 rounded-xl p-6">
                    <div class="flex items-center mb-4">
                        <div class="flex items-center">
                            @for($i = 1; $i <= 5; $i++)
                                <svg class="w-5 h-5 {{ $i <= $review->rating ? 'text-yellow-400' : 'text-gray-300' }}" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                </svg>
                                @endfor
                        </div>
                        @if($review->is_verified_purchase)
                        <span class="ml-2 bg-green-100 text-green-800 text-xs px-2 py-1 rounded-full">Verified</span>
                        @endif
                    </div>
                    <p class="text-gray-700 mb-4 line-clamp-4">"{{ $review->comment }}"</p>
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="font-semibold text-gray-900">{{ $review->user->name }}</p>
                            <p class="text-sm text-gray-500">{{ $review->product->name }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="text-center mt-8">
                <div class="inline-flex items-center space-x-8 bg-gray-50 rounded-full px-8 py-4">
                    <div class="text-center">
                        <div class="text-2xl font-bold text-gray-900">{{ number_format($stats['total_products']) }}+</div>
                        <div class="text-sm text-gray-600">Products</div>
                    </div>
                    <div class="text-center">
                        <div class="text-2xl font-bold text-gray-900">{{ number_format($stats['total_reviews']) }}+</div>
                        <div class="text-sm text-gray-600">Reviews</div>
                    </div>
                    <div class="text-center">
                        <div class="text-2xl font-bold text-gray-900">{{ number_format($stats['avg_rating'], 1) }}</div>
                        <div class="text-sm text-gray-600">Average Rating</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif

    <!-- Features/Policies Section -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="text-center">
                    <div class="w-16 h-16 mx-auto mb-4 bg-purple-100 rounded-full flex items-center justify-center">
                        <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                        </svg>
                    </div>
                    <h3 class="font-semibold text-lg text-gray-900 mb-2">Free Shipping</h3>
                    <p class="text-gray-600">Free shipping on orders over $50</p>
                </div>

                <div class="text-center">
                    <div class="w-16 h-16 mx-auto mb-4 bg-green-100 rounded-full flex items-center justify-center">
                        <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="font-semibold text-lg text-gray-900 mb-2">Easy Returns</h3>
                    <p class="text-gray-600">30-day return policy</p>
                </div>

                <div class="text-center">
                    <div class="w-16 h-16 mx-auto mb-4 bg-blue-100 rounded-full flex items-center justify-center">
                        <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                        </svg>
                    </div>
                    <h3 class="font-semibold text-lg text-gray-900 mb-2">Secure Payment</h3>
                    <p class="text-gray-600">100% secure payment</p>
                </div>

                <div class="text-center">
                    <div class="w-16 h-16 mx-auto mb-4 bg-yellow-100 rounded-full flex items-center justify-center">
                        <svg class="w-8 h-8 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192L5.636 18.364M12 2.25a9.75 9.75 0 109.75 9.75A9.75 9.75 0 0012 2.25z"></path>
                        </svg>
                    </div>
                    <h3 class="font-semibold text-lg text-gray-900 mb-2">24/7 Support</h3>
                    <p class="text-gray-600">Round the clock support</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Newsletter Section -->
    <section class="py-16 bg-purple-600 text-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl lg:text-4xl font-bold mb-4">Stay Updated</h2>
            <p class="text-xl mb-8 opacity-90">Subscribe to our newsletter for exclusive offers and latest updates</p>

            <form class="max-w-md mx-auto flex gap-4">
                <input type="email"
                    placeholder="Enter your email"
                    class="flex-1 px-4 py-3 rounded-lg text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400">
                <button type="submit"
                    class="px-6 py-3 bg-yellow-400 text-gray-900 font-semibold rounded-lg hover:bg-yellow-300 transition-colors duration-300">
                    Subscribe
                </button>
            </form>

            <p class="text-sm opacity-75 mt-4">By subscribing, you agree to our Privacy Policy and Terms of Service</p>
        </div>
    </section>
</main>