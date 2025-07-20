<div>
    <div class="min-h-screen">
        <!-- Breadcrumb Navigation -->
        <section class="py-4 bg-white border-b">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <nav class="flex" aria-label="Breadcrumb">
                    <ol class="flex items-center space-x-4">
                        <li>
                            <a href="{{ route('home') }}" class="text-gray-500 hover:text-gray-700 transition-colors">Home</a>
                        </li>
                        <li>
                            <div class="flex items-center">
                                <svg class="flex-shrink-0 h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                </svg>
                                <a href="{{ route('product-list') }}" class="ml-4 text-gray-500 hover:text-gray-700 transition-colors">Products</a>
                            </div>
                        </li>
                        @if($product->category)
                        <li>
                            <div class="flex items-center">
                                <svg class="flex-shrink-0 h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                </svg>
                                <a href="{{ route('product-list', ['category' => $product->category->slug]) }}" class="ml-4 text-gray-500 hover:text-gray-700 transition-colors">{{ $product->category->name }}</a>
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
                    <!-- Product Images Gallery -->
                    <div class="space-y-4">
                        <!-- Main Image with Zoom -->
                        <div class="zoom-container relative overflow-hidden rounded-2xl bg-gray-100">
                            <img src="{{ $product->getImageUrl($product->images[$selectedImage] ?? null) }}"
                                alt="{{ $product->name }} - {{ $product->brand->name ?? 'BEAUTIFY' }}"
                                class="zoom-image w-full h-96 lg:h-[500px] object-cover"
                                loading="lazy">

                            <!-- Product Badges -->
                            @if($product->on_sale)
                            <div class="absolute top-4 right-4 bg-red-500 text-white px-3 py-1 rounded-full text-sm font-semibold z-10">
                                Sale
                            </div>
                            @endif

                            @if($product->is_featured)
                            <div class="absolute top-4 left-4 bg-purple-500 text-white px-3 py-1 rounded-full text-sm font-semibold z-10">
                                Featured
                            </div>
                            @endif

                            <!-- Zoom Indicator -->
                            <div class="absolute bottom-4 right-4 bg-black bg-opacity-50 text-white px-2 py-1 rounded text-xs">
                                <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7" />
                                </svg>
                                Hover to zoom
                            </div>
                        </div>

                        <!-- Thumbnail Images -->
                        @if($product->images && count($product->images) > 1)
                        <div class="grid grid-cols-4 gap-4">
                            @foreach($product->images as $index => $image)
                            <button wire:click="selectImage({{ $index }})"
                                class="relative overflow-hidden rounded-lg border-2 {{ $selectedImage === $index ? 'border-purple-500' : 'border-gray-200' }} transition-all duration-200 hover:border-purple-300">
                                <img src="{{ $product->getImageUrl($image) }}"
                                    alt="{{ $product->name }} - Image {{ $index + 1 }}"
                                    class="w-full h-20 object-cover"
                                    loading="lazy">
                            </button>
                            @endforeach
                        </div>
                        @endif
                    </div>

                    <!-- Product Information -->
                    <div class="space-y-8">
                        <!-- Product Header -->
                        <div class="space-y-4">
                            <!-- Brand and Category -->
                            <div class="flex items-center space-x-4 text-sm">
                                @if($product->brand)
                                <a href="{{ route('product-list', ['brand' => $product->brand->slug]) }}" class="text-purple-600 hover:text-purple-700 font-medium">{{ $product->brand->name }}</a>
                                @endif
                                @if($product->category)
                                <span class="text-gray-400">•</span>
                                <a href="{{ route('product-list', ['category' => $product->category->slug]) }}" class="text-gray-500 hover:text-gray-700">{{ $product->category->name }}</a>
                                @endif
                            </div>

                            <!-- Product Title (H1) -->
                            <h1 class="text-3xl lg:text-4xl font-bold text-gray-900 leading-tight">{{ $product->name }}</h1>

                            <!-- Price Section -->
                            <div class="flex items-center space-x-4">
                                <span class="text-3xl font-bold text-gray-900">${{ number_format($product->price, 2) }}</span>
                                @if($product->on_sale)
                                <span class="text-lg text-gray-500 line-through">${{ number_format($product->price * 1.3, 2) }}</span>
                                <span class="bg-red-100 text-red-800 px-2 py-1 rounded text-sm font-semibold">-30%</span>
                                @endif
                            </div>

                            <!-- Rating and Reviews -->
                            <div class="flex items-center space-x-4">
                                <div class="flex items-center space-x-2">
                                    <div class="flex text-yellow-400">
                                        @for($i = 1; $i <= 5; $i++)
                                            @if($i <=$product->average_rating)
                                            <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20">
                                                <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                                            </svg>
                                            @else
                                            <svg class="w-5 h-5 text-gray-300" viewBox="0 0 20 20">
                                                <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                                            </svg>
                                            @endif
                                            @endfor
                                    </div>
                                    <span class="text-gray-600 font-medium">{{ number_format($product->average_rating, 1) }}</span>
                                    <span class="text-gray-500">({{ $product->review_count }} reviews)</span>
                                </div>
                                <span class="text-gray-400">|</span>
                                <span class="text-green-600 font-medium">Free shipping</span>
                            </div>
                        </div>

                        <!-- Product Description -->
                        @if($product->description)
                        <div class="space-y-2">
                            <h3 class="text-lg font-semibold text-gray-900">Description</h3>
                            <div class="text-gray-600 leading-relaxed prose prose-sm max-w-none">
                                {!! nl2br(e($product->description)) !!}
                            </div>
                        </div>
                        @endif

                        <!-- Product Variants -->
                        <div class="space-y-6">
                            <!-- Size Selection -->
                            @if($product->sizes && $product->sizes->count() > 0)
                            <div class="space-y-3">
                                <label class="text-sm font-medium text-gray-700">Size</label>
                                <div class="grid grid-cols-4 gap-2">
                                    @foreach($product->sizes as $size)
                                    <button wire:click="$set('selectedSize', '{{ $size->name }}')"
                                        class="px-3 py-2 border rounded-lg text-sm font-medium transition-all duration-200 {{ $selectedSize === $size->name ? 'border-purple-500 bg-purple-50 text-purple-700' : 'border-gray-300 text-gray-700 hover:border-purple-300 hover:bg-purple-50' }}">
                                        {{ $size->name }}
                                    </button>
                                    @endforeach
                                </div>
                            </div>
                            @endif

                            <!-- Color Selection -->
                            @if($product->colors && $product->colors->count() > 0)
                            <div class="space-y-3">
                                <label class="text-sm font-medium text-gray-700">Color</label>
                                <div class="grid grid-cols-6 gap-2">
                                    @foreach($product->colors as $color)
                                    <button wire:click="$set('selectedColor', '{{ $color->name }}')"
                                        class="w-10 h-10 rounded-full border-2 transition-all duration-200 {{ $selectedColor === $color->name ? 'border-purple-500 ring-2 ring-purple-200' : 'border-gray-300 hover:border-purple-300' }}"
                                        style="background-color: {{ $color->hex_code ?? '#000' }};"
                                        title="{{ $color->name }}">
                                    </button>
                                    @endforeach
                                </div>
                            </div>
                            @endif

                            <!-- Quantity Selection -->
                            <div class="space-y-3">
                                <label class="text-sm font-medium text-gray-700">Quantity</label>
                                <div class="flex items-center space-x-3">
                                    <button wire:click="decrementQuantity"
                                        class="w-8 h-8 border border-gray-300 rounded-full flex items-center justify-center hover:bg-gray-50 transition-colors"
                                        {{ $quantity <= 1 ? 'disabled' : '' }}>
                                        <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4" />
                                        </svg>
                                    </button>
                                    <span class="w-12 text-center font-medium">{{ $quantity }}</span>
                                    <button wire:click="incrementQuantity"
                                        class="w-8 h-8 border border-gray-300 rounded-full flex items-center justify-center hover:bg-gray-50 transition-colors"
                                        {{ $quantity >= 10 ? 'disabled' : '' }}>
                                        <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                        </svg>
                                    </button>
                                </div>
                                <livewire:wishlist-button :product="$product" :key="$product->id" class="mb-2" style="background: linear-gradient(90deg, #f3e7e9 0%, #e3eeff 100%); border: 1px solid #d1d5db; color: #7c3aed; font-weight: 600; border-radius: 0.5rem; padding: 0.5rem 1rem;" />
                            </div>

                            <!-- Action Buttons -->
                            <div class="space-y-3">
                                <button wire:click="addToCart"
                                    class="w-full bg-gradient-to-r from-purple-600 to-pink-600 text-white py-4 px-6 rounded-lg font-semibold hover:from-purple-700 hover:to-pink-700 transition-all duration-300 transform hover:scale-105 disabled:opacity-50 disabled:cursor-not-allowed"
                                    {{ !$product->in_stock ? 'disabled' : '' }}>
                                    <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-2.5 5M7 13l2.5 5m6-5v6a2 2 0 01-2 2H9a2 2 0 01-2-2v-6m8 0V9a2 2 0 00-2-2H9a2 2 0 00-2 2v4.01" />
                                    </svg>
                                    Add to Cart - ${{ number_format($product->price * $quantity, 2) }}
                                </button>

                                <button wire:click="buyNow"
                                    class="w-full bg-gray-900 text-white py-4 px-6 rounded-lg font-semibold hover:bg-gray-800 transition-all duration-300 transform hover:scale-105 disabled:opacity-50 disabled:cursor-not-allowed"
                                    {{ !$product->in_stock ? 'disabled' : '' }}>
                                    <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                    </svg>
                                    Buy Now
                                </button>
                            </div>

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

                            <!-- Success Message -->
                            @if(session()->has('success'))
                            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                                {{ session('success') }}
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Technical Specifications -->
        @if(!empty($technicalSpecs))
        <section class="py-16 bg-gray-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-8">Technical Specifications</h2>
                <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
                    <div class="grid grid-cols-1 md:grid-cols-2">
                        @foreach($technicalSpecs as $key => $value)
                        <div class="px-6 py-4 border-b border-gray-200 {{ $loop->even ? 'bg-gray-50' : '' }}">
                            <div class="flex justify-between items-center">
                                <span class="font-medium text-gray-900">{{ $key }}</span>
                                <span class="text-gray-600">{{ $value }}</span>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        @endif

        <!-- Customer Reviews -->
        <section class="py-16 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                @livewire('product-reviews', ['product' => $product])
            </div>
        </section>

        <!-- Related Products -->
        @if($relatedProducts->count() > 0)
        <section class="py-16 bg-gray-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-8">You might also like</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach($relatedProducts as $relatedProduct)
                    <a href="{{ route('product-detail', $relatedProduct->slug) }}" class="group cursor-pointer">
                        <div class="relative overflow-hidden rounded-2xl bg-gray-100 mb-4">
                            <img src="{{ $relatedProduct->getImageUrl() }}"
                                alt="{{ $relatedProduct->name }} - {{ $relatedProduct->brand->name ?? 'BEAUTIFY' }}"
                                class="w-full h-48 object-cover transition-transform duration-300 group-hover:scale-110"
                                loading="lazy">

                            @if($relatedProduct->on_sale)
                            <div class="absolute top-2 left-2 bg-red-500 text-white px-2 py-1 rounded-full text-xs font-semibold">
                                Sale
                            </div>
                            @endif
                        </div>
                        <div class="space-y-2">
                            <h3 class="font-semibold text-gray-900 group-hover:text-purple-600 transition-colors">
                                {{ $relatedProduct->name }}
                            </h3>
                            <div class="flex items-center justify-between">
                                <span class="text-lg font-bold text-gray-900">${{ number_format($relatedProduct->price, 2) }}</span>
                                <div class="flex text-yellow-400">
                                    @for($i = 1; $i <= 5; $i++)
                                        <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                        <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                                        </svg>
                                        @endfor
                                </div>
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
        </section>
        @endif
    </div>
</div>