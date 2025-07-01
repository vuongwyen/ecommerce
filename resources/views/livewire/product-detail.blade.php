<div>
    <div class="min-h-screen">
        <!-- Breadcrumb -->
        <section class="py-4 bg-white border-b">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <nav class="flex" aria-label="Breadcrumb">
                    <ol class="flex items-center space-x-4">
                        <li>
                            <a href="{{ route('home') }}" class="text-gray-500 hover:text-gray-700">Home</a>
                        </li>
                        <li>
                            <div class="flex items-center">
                                <svg class="flex-shrink-0 h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                </svg>
                                <a href="{{ route('product-list') }}" class="ml-4 text-gray-500 hover:text-gray-700">Products</a>
                            </div>
                        </li>
                        @if($product->category)
                        <li>
                            <div class="flex items-center">
                                <svg class="flex-shrink-0 h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                </svg>
                                <span class="ml-4 text-gray-500">{{ $product->category->name }}</span>
                            </div>
                        </li>
                        @endif
                        <li>
                            <div class="flex items-center">
                                <svg class="flex-shrink-0 h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                </svg>
                                <span class="ml-4 text-gray-900 font-medium">{{ $product->name }}</span>
                            </div>
                        </li>
                    </ol>
                </nav>
            </div>
        </section>

        <!-- Product Detail Section -->
        <section class="py-16">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                    <!-- Product Images -->
                    <div class="space-y-4">
                        <!-- Main Image -->
                        <div class="relative overflow-hidden rounded-2xl bg-gray-100">
                            <img src="{{ $product->getImageUrl($product->images[$selectedImage] ?? null) }}"
                                alt="{{ $product->name }}"
                                class="w-full h-96 lg:h-[500px] object-cover">

                            <!-- Badges -->
                            @if($product->on_sale)
                            <div class="absolute top-4 right-4 bg-red-500 text-white px-3 py-1 rounded-full text-sm font-semibold">
                                Sale
                            </div>
                            @endif

                            @if($product->is_featured)
                            <div class="absolute top-4 left-4 bg-purple-500 text-white px-3 py-1 rounded-full text-sm font-semibold">
                                Featured
                            </div>
                            @endif
                        </div>

                        <!-- Thumbnail Images -->
                        @if($product->images && count($product->images) > 1)
                        <div class="grid grid-cols-4 gap-4">
                            @foreach($product->images as $index => $image)
                            <button wire:click="selectImage({{ $index }})"
                                class="relative overflow-hidden rounded-lg border-2 {{ $selectedImage === $index ? 'border-purple-500' : 'border-gray-200' }}">
                                <img src="{{ $product->getImageUrl($image) }}"
                                    alt="{{ $product->name }}"
                                    class="w-full h-20 object-cover">
                            </button>
                            @endforeach
                        </div>
                        @endif
                    </div>

                    <!-- Product Info -->
                    <div class="space-y-8">
                        <!-- Product Header -->
                        <div class="space-y-4">
                            <div class="flex items-center space-x-4">
                                @if($product->brand)
                                <span class="text-sm text-gray-500">{{ $product->brand->name }}</span>
                                @endif
                                @if($product->category)
                                <span class="text-sm text-gray-500">• {{ $product->category->name }}</span>
                                @endif
                            </div>

                            <h1 class="text-3xl lg:text-4xl font-bold text-gray-900">{{ $product->name }}</h1>

                            <!-- Price -->
                            <div class="flex items-center space-x-4">
                                <span class="text-3xl font-bold text-gray-900">${{ number_format($product->price, 2) }}</span>
                                @if($product->on_sale)
                                <span class="text-lg text-gray-500 line-through">${{ number_format($product->price * 1.3, 2) }}</span>
                                <span class="bg-red-100 text-red-800 px-2 py-1 rounded text-sm font-semibold">-30%</span>
                                @endif
                            </div>

                            <!-- Rating -->
                            <div class="flex items-center space-x-2">
                                <div class="flex text-yellow-400">
                                    <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20">
                                        <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                                    </svg>
                                    <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20">
                                        <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                                    </svg>
                                    <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20">
                                        <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                                    </svg>
                                    <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20">
                                        <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                                    </svg>
                                    <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20">
                                        <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                                    </svg>
                                </div>
                                <span class="text-gray-600">({{ rand(50, 300) }} reviews)</span>
                            </div>
                        </div>

                        <!-- Description -->
                        @if($product->description)
                        <div class="space-y-2">
                            <h3 class="text-lg font-semibold text-gray-900">Description</h3>
                            <p class="text-gray-600 leading-relaxed">{{ $product->description }}</p>
                        </div>
                        @endif

                        <!-- Add to Cart Section -->
                        <div class="space-y-6">
                            <form action="{{ route('cart.add') }}" method="POST">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <input type="hidden" name="size" value="{{ $selectedSize }}">
                                <input type="hidden" name="color" value="{{ $selectedColor }}">
                                <div class="flex items-center space-x-3">
                                    <label class="text-sm font-medium text-gray-700">Quantity</label>
                                    <input type="number" name="quantity" value="{{ $quantity }}" min="1" max="10" class="w-16 border rounded px-2 py-1">
                                </div>
                                <button type="submit" class="w-full mt-4 bg-gradient-to-r from-purple-600 to-pink-600 text-white py-4 px-6 rounded-lg font-semibold hover:from-purple-700 hover:to-pink-700 transition-all duration-300 transform hover:scale-105">
                                    Add to Cart - ${{ number_format($product->price * $quantity, 2) }}
                                </button>
                            </form>

                            <!-- Size Selection -->
                            @if($product->sizes && $product->sizes->count() > 0)
                            <div class="space-y-2">
                                <label class="text-sm font-medium text-gray-700">Size</label>
                                <div class="grid grid-cols-4 gap-2">
                                    @foreach($product->sizes as $size)
                                    <button wire:click="$set('selectedSize', '{{ $size->name }}')"
                                        class="px-3 py-2 border rounded-lg text-sm font-medium {{ $selectedSize === $size->name ? 'border-indigo-500 bg-indigo-50 text-indigo-700' : 'border-gray-300 text-gray-700 hover:border-gray-400' }}">
                                        {{ $size->name }}
                                    </button>
                                    @endforeach
                                </div>
                            </div>
                            @endif

                            <!-- Color Selection -->
                            @if($product->colors && $product->colors->count() > 0)
                            <div class="space-y-2">
                                <label class="text-sm font-medium text-gray-700">Color</label>
                                <div class="grid grid-cols-6 gap-2">
                                    @foreach($product->colors as $color)
                                    <button wire:click="$set('selectedColor', '{{ $color->name }}')"
                                        class="w-10 h-10 rounded-full border-2 {{ $selectedColor === $color->name ? 'border-indigo-500' : 'border-gray-300' }}"
                                        style="background-color: '{{ $color->code ?? '#000' }}';"
                                        title="{{ $color->name }}">
                                    </button>
                                    @endforeach
                                </div>
                            </div>
                            @endif

                            <!-- Stock Status -->
                            <div class="flex items-center space-x-2">
                                @if($product->in_stock)
                                <div class="w-3 h-3 bg-green-500 rounded-full"></div>
                                <span class="text-green-600 font-medium">In Stock</span>
                                @else
                                <div class="w-3 h-3 bg-red-500 rounded-full"></div>
                                <span class="text-red-600 font-medium">Out of Stock</span>
                                @endif
                            </div>
                        </div>

                        <!-- Success Message -->
                        @if(session()->has('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                            {{ session('success') }}
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </section>

        <!-- Related Products Section -->
        <section class="py-16 bg-gray-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-8">You might also like</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    @php
                    $relatedProducts = \App\Models\Product::where('category_id', $product->category_id)
                    ->where('id', '!=', $product->id)
                    ->where('is_active', true)
                    ->limit(4)
                    ->get();
                    @endphp

                    @foreach($relatedProducts as $relatedProduct)
                    <a href="{{ route('product-detail', $relatedProduct->slug) }}" class="group cursor-pointer">
                        <div class="relative overflow-hidden rounded-2xl bg-gray-100 mb-4">
                            <img src="{{ $relatedProduct->getImageUrl() }}"
                                alt="{{ $relatedProduct->name }}"
                                class="w-full h-48 object-cover transition-transform duration-300 group-hover:scale-110">
                        </div>
                        <div class="space-y-2">
                            <h3 class="font-semibold text-gray-900 group-hover:text-purple-600 transition-colors">
                                {{ $relatedProduct->name }}
                            </h3>
                            <div class="flex items-center space-x-2">
                                <span class="text-lg font-bold text-gray-900">${{ number_format($relatedProduct->price, 2) }}</span>
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
        </section>
    </div>
</div>