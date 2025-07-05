<div class="relative" x-data="{ 
    query: @entangle('query'),
    showDropdown: @entangle('showDropdown'),
    selectedIndex: @entangle('selectedIndex'),
    debounceTimer: null,
    handleInput() {
        clearTimeout(this.debounceTimer);
        this.debounceTimer = setTimeout(() => {
            this.$wire.updatedQuery();
        }, 300);
    }
}" @click.away="showDropdown = false">

    <!-- Search Input -->
    <div class="relative">
        <input
            type="text"
            wire:model.live.debounce.300ms="query"
            placeholder="Search products..."
            class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-full focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-200"
            @keydown.down.prevent="$wire.selectNext()"
            @keydown.up.prevent="$wire.selectPrevious()"
            @keydown.enter.prevent="if(selectedIndex >= 0) $wire.selectProduct($wire.products[selectedIndex].id)"
            @keydown.escape="showDropdown = false; selectedIndex = -1"
            autocomplete="off">
        <svg class="absolute left-3 top-2.5 h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
        </svg>
    </div>

    <!-- Dropdown Results -->
    <div
        x-show="showDropdown"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 transform scale-95"
        x-transition:enter-end="opacity-100 transform scale-100"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 transform scale-100"
        x-transition:leave-end="opacity-0 transform scale-95"
        class="absolute top-full left-0 right-0 mt-1 bg-white border border-gray-200 rounded-lg shadow-lg z-50 max-h-80 overflow-y-auto"
        style="display: none;">
        @if(count($products) > 0)
        <div class="py-2">
            @foreach($products as $index => $product)
            <div
                wire:key="product-{{ $product['id'] }}"
                class="flex items-center px-4 py-3 hover:bg-gray-50 cursor-pointer transition-colors duration-150 {{ $selectedIndex === $index ? 'bg-purple-50 border-l-4 border-purple-500' : '' }}"
                wire:click="selectProduct({{ $product['id'] }})"
                @mouseenter="selectedIndex = {{ $index }}">
                <!-- Product Image -->
                <div class="flex-shrink-0 w-12 h-12 mr-3">
                    <img
                        src="{{ $product['image'] }}"
                        alt="{{ $product['name'] }}"
                        class="w-full h-full object-cover rounded-md"
                        onerror="this.src='{{ asset('images/placeholder-product.svg') }}'"
                        </div>

                    <!-- Product Info -->
                    <div class="flex-1 min-w-0">
                        <div class="text-sm font-medium text-gray-900 truncate">
                            {{ $product['name'] }}
                        </div>
                        <div class="text-sm text-gray-500">
                            ${{ number_format($product['price'], 2) }}
                        </div>
                    </div>

                    <!-- Arrow Icon -->
                    <div class="flex-shrink-0 ml-2">
                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </div>
                </div>
                @endforeach
            </div>
            @else
            <div class="px-4 py-6 text-center text-gray-500">
                <svg class="mx-auto h-12 w-12 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
                <p class="text-sm">No products found</p>
                <p class="text-xs text-gray-400 mt-1">Try a different search term</p>
            </div>
            @endif
        </div>

        <!-- Loading State -->
        <div
            wire:loading
            class="absolute top-full left-0 right-0 mt-1 bg-white border border-gray-200 rounded-lg shadow-lg z-50 p-4">
            <div class="flex items-center justify-center">
                <svg class="animate-spin h-5 w-5 text-purple-500 mr-2" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                <span class="text-sm text-gray-600">Searching...</span>
            </div>
        </div>
    </div>