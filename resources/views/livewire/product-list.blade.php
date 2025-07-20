<div class="min-h-screen bg-gray-50">
    <style>
        [data-color] {
            background-color: var(--color-value);
        }

        @foreach($colors as $color) [data-color="{{ $color->hex_code }}"] {
            --color-value: {
                    {
                    $color->hex_code
                }
            }

            ;
        }

        @endforeach
    </style>

    <!-- Sticky Header -->
    <div class="sticky top-0 z-40 bg-white border-b border-gray-200 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <!-- Search Bar -->
                <div class="flex-1 max-w-lg">
                    <div class="relative">
                        <input wire:model.live.debounce.300ms="search"
                            type="text"
                            placeholder="Search products..."
                            class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                        <svg class="absolute left-3 top-2.5 h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                </div>

                <!-- Sort and View Controls -->
                <div class="flex items-center space-x-4 ml-4">
                    <!-- Sort Dropdown -->
                    <div class="hs-dropdown relative inline-flex">
                        <button type="button" class="hs-dropdown-toggle py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50">
                            Sort: {{ ucfirst(str_replace('-', ' ', $sortBy)) }}
                            <svg class="hs-dropdown-open:rotate-180 w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="m6 9 6 6 6-6" />
                            </svg>
                        </button>
                        <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 w-48 hidden z-10 mt-2 bg-white divide-y divide-gray-200 shadow-md rounded-lg p-2">
                            <div class="py-2 first:pt-0 last:pb-0">
                                <button wire:click="$set('sortBy', 'newest')" class="w-full flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 {{ $sortBy === 'newest' ? 'bg-purple-50 text-purple-600' : '' }}">
                                    Newest First
                                </button>
                                <button wire:click="$set('sortBy', 'price-low')" class="w-full flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 {{ $sortBy === 'price-low' ? 'bg-purple-50 text-purple-600' : '' }}">
                                    Price: Low to High
                                </button>
                                <button wire:click="$set('sortBy', 'price-high')" class="w-full flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 {{ $sortBy === 'price-high' ? 'bg-purple-50 text-purple-600' : '' }}">
                                    Price: High to Low
                                </button>
                                <button wire:click="$set('sortBy', 'name')" class="w-full flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 {{ $sortBy === 'name' ? 'bg-purple-50 text-purple-600' : '' }}">
                                    Name A-Z
                                </button>
                                <button wire:click="$set('sortBy', 'rating')" class="w-full flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 {{ $sortBy === 'rating' ? 'bg-purple-50 text-purple-600' : '' }}">
                                    Highest Rated
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- View Mode Toggle -->
                    <div class="flex items-center bg-gray-100 rounded-lg p-1">
                        <button wire:click="$set('viewMode', 'grid')"
                            class="p-2 rounded-md {{ $viewMode === 'grid' ? 'bg-white shadow-sm' : 'text-gray-500' }}">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                            </svg>
                        </button>
                        <button wire:click="$set('viewMode', 'list')"
                            class="p-2 rounded-md {{ $viewMode === 'list' ? 'bg-white shadow-sm' : 'text-gray-500' }}">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                            </svg>
                        </button>
                    </div>

                    <!-- Filter Toggle -->
                    <button wire:click="$toggle('showFilters')"
                        class="py-2 px-3 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition-colors text-sm font-medium">
                        {{ $showFilters ? 'Hide' : 'Show' }} Filters
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Sidebar Filters -->
            @if($showFilters)
            <div class="lg:w-80 flex-shrink-0">
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 sticky top-24">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-lg font-semibold text-gray-900">Filters</h3>
                        @if($search || $selectedCategory || $selectedBrand || !empty($selectedColors) || !empty($selectedSizes) || $priceRange || $ratingFilter)
                        <button wire:click="clearFilters"
                            class="text-sm text-purple-600 hover:text-purple-700 font-medium">
                            Clear All
                        </button>
                        @endif
                    </div>

                    <!-- Gender Filter -->
                    <div class="mb-6">
                        <h4 class="text-sm font-medium text-gray-900 mb-3">Gender</h4>
                        <div class="space-y-2">
                            <label>
                                <input type="radio" name="gender" value="" {{ request('gender') == '' ? 'checked' : '' }}>
                                All Genders
                            </label>
                            <label>
                                <input type="radio" name="gender" value="male" {{ request('gender') == 'male' ? 'checked' : '' }}>
                                Male
                            </label>
                            <label>
                                <input type="radio" name="gender" value="female" {{ request('gender') == 'female' ? 'checked' : '' }}>
                                Female
                            </label>
                        </div>
                    </div>

                    <!-- Category Filter -->
                    <div class="mb-6">
                        <h4 class="text-sm font-medium text-gray-900 mb-3">Category</h4>
                        <div class="space-y-2">
                            <label class="flex items-center">
                                <input type="radio" wire:model.live="selectedCategory" value="" class="text-purple-600 focus:ring-purple-500">
                                <span class="ml-2 text-sm text-gray-700">All Categories</span>
                            </label>
                            @foreach($categories as $category)
                            <label class="flex items-center">
                                <input type="radio" wire:model.live="selectedCategory" value="{{ $category->id }}" class="text-purple-600 focus:ring-purple-500">
                                <span class="ml-2 text-sm text-gray-700">{{ $category->name }}</span>
                            </label>
                            @endforeach
                        </div>
                    </div>

                    <!-- Brand Filter -->
                    <div class="mb-6">
                        <h4 class="text-sm font-medium text-gray-900 mb-3">Brand</h4>
                        <div class="space-y-2">
                            <label class="flex items-center">
                                <input type="radio" wire:model.live="selectedBrand" value="" class="text-purple-600 focus:ring-purple-500">
                                <span class="ml-2 text-sm text-gray-700">All Brands</span>
                            </label>
                            @foreach($brands as $brand)
                            <label class="flex items-center">
                                <input type="radio" wire:model.live="selectedBrand" value="{{ $brand->id }}" class="text-purple-600 focus:ring-purple-500">
                                <span class="ml-2 text-sm text-gray-700">{{ $brand->name }}</span>
                            </label>
                            @endforeach
                        </div>
                    </div>

                    <!-- Color Filter -->
                    <div class="mb-6">
                        <h4 class="text-sm font-medium text-gray-900 mb-3">Color</h4>
                        <div class="grid grid-cols-4 gap-2">
                            @foreach($colors as $color)
                            <label class="relative cursor-pointer group">
                                <input type="checkbox" wire:model.live="selectedColors" value="{{ $color->id }}" class="sr-only">
                                <div class="w-8 h-8 rounded-full border-2 border-gray-200 group-hover:border-gray-300 transition-colors {{ in_array($color->id, $selectedColors) ? 'ring-2 ring-purple-500 ring-offset-2' : '' }}"
                                    data-color="{{ $color->hex_code }}"
                                    title="{{ $color->name }}">
                                </div>
                                <span class="absolute -bottom-6 left-1/2 transform -translate-x-1/2 text-xs text-gray-600 whitespace-nowrap">{{ $color->name }}</span>
                            </label>
                            @endforeach
                        </div>
                    </div>

                    <!-- Size Filter -->
                    <div class="mb-6">
                        <h4 class="text-sm font-medium text-gray-900 mb-3">Size</h4>
                        <div class="grid grid-cols-3 gap-2">
                            @foreach($sizes as $size)
                            <label class="relative cursor-pointer">
                                <input type="checkbox" wire:model.live="selectedSizes" value="{{ $size->id }}" class="sr-only">
                                <div class="px-3 py-2 text-center text-sm border border-gray-200 rounded-lg hover:border-gray-300 transition-colors {{ in_array($size->id, $selectedSizes) ? 'bg-purple-600 text-white border-purple-600' : 'bg-white text-gray-700' }}">
                                    {{ $size->name }}
                                </div>
                            </label>
                            @endforeach
                        </div>
                    </div>

                    <!-- Price Range Filter -->
                    <div class="mb-6">
                        <h4 class="text-sm font-medium text-gray-900 mb-3">Price Range</h4>
                        <div class="space-y-3">
                            <div class="flex items-center space-x-2">
                                <input type="number" wire:model.live.debounce.500ms="minPrice" placeholder="Min"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-purple-500">
                                <span class="text-gray-500">-</span>
                                <input type="number" wire:model.live.debounce.500ms="maxPrice" placeholder="Max"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-purple-500">
                            </div>
                            <div class="space-y-2">
                                <label class="flex items-center">
                                    <input type="radio" wire:model.live="priceRange" value="0-50" class="text-purple-600 focus:ring-purple-500">
                                    <span class="ml-2 text-sm text-gray-700">Under $50</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="radio" wire:model.live="priceRange" value="50-100" class="text-purple-600 focus:ring-purple-500">
                                    <span class="ml-2 text-sm text-gray-700">$50 - $100</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="radio" wire:model.live="priceRange" value="100-200" class="text-purple-600 focus:ring-purple-500">
                                    <span class="ml-2 text-sm text-gray-700">$100 - $200</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="radio" wire:model.live="priceRange" value="200+" class="text-purple-600 focus:ring-purple-500">
                                    <span class="ml-2 text-sm text-gray-700">$200+</span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- Rating Filter -->
                    <div class="mb-6">
                        <h4 class="text-sm font-medium text-gray-900 mb-3">Rating</h4>
                        <div class="space-y-2">
                            <label class="flex items-center">
                                <input type="radio" wire:model.live="ratingFilter" value="" class="text-purple-600 focus:ring-purple-500">
                                <span class="ml-2 text-sm text-gray-700">All Ratings</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model.live="ratingFilter" value="4" class="text-purple-600 focus:ring-purple-500">
                                <span class="ml-2 text-sm text-gray-700">4+ Stars</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model.live="ratingFilter" value="3" class="text-purple-600 focus:ring-purple-500">
                                <span class="ml-2 text-sm text-gray-700">3+ Stars</span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            <!-- Main Content -->
            <div class="flex-1">
                @if($products->count() > 0)
                <!-- Results Count -->
                <div class="mb-6">
                    <p class="text-gray-600">
                        Showing {{ $products->firstItem() }} - {{ $products->lastItem() }} of {{ $products->total() }} products
                    </p>
                </div>

                <!-- Products Grid/List -->
                @if($viewMode === 'grid')
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                    @foreach($products as $product)
                    <div class="group bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden hover:shadow-lg transition-all duration-300">
                        <!-- Product Image -->
                        <div class="group relative overflow-hidden">
                            <img src="{{ $product->getImageUrl() }}"
                                alt="{{ $product->name }}"
                                class="w-full h-64 object-cover transition-transform duration-300 group-hover:scale-110">

                            <!-- Badges -->
                            <div class="absolute top-3 left-3 flex flex-col gap-2">
                                @if($product->on_sale)
                                <span class="bg-red-500 text-white px-2 py-1 rounded-full text-xs font-semibold">
                                    Sale
                                </span>
                                @endif
                                @if($product->is_featured)
                                <span class="bg-purple-500 text-white px-2 py-1 rounded-full text-xs font-semibold">
                                    Featured
                                </span>
                                @endif
                            </div>

                            <!-- Quick Actions -->
                            <div class="absolute top-3 right-3 flex flex-col gap-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
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
                            <div class="absolute inset-0 bg-opacity-0 group-hover:bg-opacity-20 transition-all duration-300 flex items-center justify-center pointer-events-none group-hover:pointer-events-auto">
                                <button onclick="window.Livewire.emit('openQuickView', '{{ $product->id }}')"
                                    class="bg-white text-gray-900 px-4 py-2 rounded-lg font-medium opacity-0 group-hover:opacity-100 transition-opacity duration-300 transform translate-y-2 group-hover:translate-y-0">
                                    Quick View
                                </button>
                            </div>
                        </div>

                        <!-- Product Info -->
                        <div class="p-4">
                            <h3 class="font-semibold text-gray-900 group-hover:text-purple-600 transition-colors mb-2">
                                <a href="{{ route('product-detail', ['slug' => $product->slug]) }}">
                                    {{ $product->name }}
                                </a>
                            </h3>

                            <div class="flex items-center justify-between mb-3">
                                <span class="text-lg font-bold text-gray-900">${{ number_format($product->price, 2) }}</span>
                                <div class="flex items-center space-x-1">
                                    <div class="flex text-yellow-400">
                                        @for($i = 1; $i <= 5; $i++)
                                            @if($i <=$product->average_rating)
                                            <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                                <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                                            </svg>
                                            @else
                                            <svg class="w-4 h-4 text-gray-300" viewBox="0 0 20 20">
                                                <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                                            </svg>
                                            @endif
                                            @endfor
                                    </div>
                                    <span class="text-sm text-gray-600">({{ $product->review_count }})</span>
                                </div>
                            </div>

                            <div class="flex items-center justify-between text-sm text-gray-500 mb-4">
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

                            <!-- Add to Cart Button -->
                            @php
                            $quantity = $quantity ?? 1;
                            @endphp
                            <button class="w-full bg-purple-600 text-white py-2 rounded-lg hover:bg-purple-700 transition-colors font-medium">
                                Add to Cart - ${{ number_format($product->price * $quantity, 2) }}
                            </button>
                        </div>
                    </div>
                    @endforeach
                </div>
                @else
                <!-- List View -->
                <div class="space-y-4">
                    @foreach($products as $product)
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-lg transition-all duration-300">
                        <div class="flex gap-6">
                            <!-- Product Image -->
                            <div class="relative w-32 h-32 flex-shrink-0">
                                <img src="{{ $product->getImageUrl() }}"
                                    alt="{{ $product->name }}"
                                    class="w-full h-full object-cover rounded-lg">

                                @if($product->on_sale)
                                <span class="absolute top-2 left-2 bg-red-500 text-white px-2 py-1 rounded-full text-xs font-semibold">
                                    Sale
                                </span>
                                @endif
                            </div>

                            <!-- Product Details -->
                            <div class="flex-1">
                                <div class="flex items-start justify-between">
                                    <div class="flex-1">
                                        <h3 class="text-lg font-semibold text-gray-900 mb-2">
                                            <a href="{{ route('product-detail', ['slug' => $product->slug]) }}">
                                                {{ $product->name }}
                                            </a>
                                        </h3>
                                        <livewire:wishlist-button :product="$product" :key="$product->id" class="mb-2" style="background: linear-gradient(90deg, #f3e7e9 0%, #e3eeff 100%); border: 1px solid #d1d5db; color: #7c3aed; font-weight: 600; border-radius: 0.5rem; padding: 0.5rem 1rem;" />
                                        <p class="text-gray-600 text-sm mb-3 line-clamp-2">{{ $product->description }}</p>

                                        <div class="flex items-center space-x-4 text-sm text-gray-500 mb-4">
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

                                        <div class="flex items-center space-x-1 mb-4">
                                            <div class="flex text-yellow-400">
                                                @for($i = 1; $i <= 5; $i++)
                                                    @if($i <=$product->average_rating)
                                                    <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                                        <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                                                    </svg>
                                                    @else
                                                    <svg class="w-4 h-4 text-gray-300" viewBox="0 0 20 20">
                                                        <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                                                    </svg>
                                                    @endif
                                                    @endfor
                                            </div>
                                            <span class="text-sm text-gray-600">({{ $product->review_count }} reviews)</span>
                                        </div>
                                    </div>

                                    <div class="text-right">
                                        <div class="text-2xl font-bold text-gray-900 mb-4">${{ number_format($product->price, 2) }}</div>
                                        <div class="flex items-center space-x-2">
                                            <button class="px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors">
                                                <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                                </svg>
                                            </button>
                                            @php
                                            $quantity = $quantity ?? 1;
                                            @endphp
                                            <button class="px-6 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition-colors font-medium">
                                                Add to Cart - ${{ number_format($product->price * $quantity, 2) }}
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @endif

                <!-- Pagination -->
                <div class="mt-12">
                    {{ $products->links() }}
                </div>
                @else
                <!-- No Results -->
                <div class="text-center py-16">
                    <div class="text-6xl mb-4">😔</div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-2">No products found</h3>
                    <p class="text-gray-600 mb-8">Try adjusting your search or filters to find what you're looking for.</p>
                    <button wire:click="clearFilters"
                        class="px-8 py-3 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition-colors">
                        Clear All Filters
                    </button>
                </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Newsletter Section -->
    <section class="bg-gradient-to-r from-purple-600 to-pink-600 py-16 mt-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl font-bold text-white mb-4">Stay Updated</h2>
            <p class="text-xl text-purple-100 mb-8">Get the latest fashion trends and exclusive offers delivered to your inbox.</p>
            <div class="max-w-md mx-auto">
                <div class="flex gap-4">
                    <input type="email" placeholder="Enter your email"
                        class="flex-1 px-4 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-white">
                    <button class="px-6 py-3 bg-white text-purple-600 rounded-lg font-semibold hover:bg-gray-100 transition-colors">
                        Subscribe
                    </button>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    Livewire.on('openQuickView', (id) => {
        console.log('Event received with id:', id);
    });
</script>