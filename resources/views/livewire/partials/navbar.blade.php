<!-- Navigation -->
<nav class="bg-white/80 backdrop-blur-md border-b border-gray-200/50 sticky top-0 z-50" x-data="{ mobileMenuOpen: false }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <!-- Logo -->
            <div class="flex items-center">
                <a href="{{ route('home') }}" class="text-2xl font-bold bg-gradient-to-r from-purple-600 to-pink-600 bg-clip-text text-transparent">
                    BEAUTIFY
                </a>
            </div>

            <!-- Desktop Navigation Links -->
            <div class="hidden md:flex items-center space-x-10">
                <div class="relative group">
                    <a href="{{ route('product-list') }}" class="text-gray-700 hover:text-purple-600 font-medium transition-colors">Products</a>
                    <div class="absolute left-0 mt-2 w-48 bg-white border border-gray-200 rounded shadow-lg opacity-0 group-hover:opacity-100 group-hover:visible invisible transition-all duration-200 z-50">
                        <ul class="py-2 ">
                            @foreach($categories as $category)
                            <li>
                                <a href="{{ route('product-list', ['category' => $category->slug]) }}" class="block px-4 py-2 text-gray-700 hover:bg-purple-100">{{ $category->name }}</a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="relative group">
                    <a href="{{ route('product-list', ['gender' => 'male']) }}" class="text-gray-700 hover:text-blue-600 font-medium transition-colors">Male</a>
                    <div class="absolute left-0 mt-2 w-48 bg-white border border-gray-200 rounded shadow-lg opacity-0 group-hover:opacity-100 group-hover:visible invisible transition-all duration-200 z-50">
                        <ul class="py-2">
                            @foreach($categories as $category)
                            <li>
                                <a href="{{ route('product-list', ['gender' => 'male', 'category' => $category->slug]) }}" class="block px-4 py-2 text-gray-700 hover:bg-blue-100">{{ $category->name }}</a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="relative group">
                    <a href="{{ route('product-list', ['gender' => 'female']) }}" class="text-gray-700 hover:text-pink-600 font-medium transition-colors">Female</a>
                    <div class="absolute left-0 mt-2 w-48 bg-white border border-gray-200 rounded shadow-lg opacity-0 group-hover:opacity-100 group-hover:visible invisible transition-all duration-200 z-50">
                        <ul class="py-2">
                            @foreach($categories as $category)
                            <li>
                                <a href="{{ route('product-list', ['gender' => 'female', 'category' => $category->slug]) }}" class="block px-4 py-2 text-gray-700 hover:bg-pink-100">{{ $category->name }}</a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="relative group">
                    <a href="{{ route('articles.index') }}" class="text-gray-700 hover:text-green-600 font-medium transition-colors">Articles</a>
                </div>
                <div class="relative group">
                    <p class="text-gray-700 hover:text-blue-600 font-medium transition-colors">Support</p>
                    <div class="absolute left-0 mt-2 w-48 bg-white border border-gray-200 rounded shadow-lg opacity-0 group-hover:opacity-100 group-hover:visible invisible transition-all duration-200 z-50">
                        <ul class="py-2">
                            <li><a href="{{ route('contact') }}" class="block px-4 py-2 text-gray-700 hover:bg-pink-100">Contact Us</a></li>
                            <li><a href="{{ route('shipping') }}" class="block px-4 py-2 text-gray-700 hover:bg-pink-100">Shipping</a></li>
                            <li><a href="{{ route('returns') }}" class="block px-4 py-2 text-gray-700 hover:bg-pink-100">Returns</a></li>
                            <li><a href="{{ route('sizeguide') }}" class="block px-4 py-2 text-gray-700 hover:bg-pink-100">Size Guide</a></li>
                        </ul>
                    </div>
                </div>
                <div class="relative group">
                    <p class="text-gray-700 hover:text-purple-600 font-medium transition-colors">Company</p>
                    <div class="absolute left-0 mt-2 w-48 bg-white border border-gray-200 rounded shadow-lg opacity-0 group-hover:opacity-100 group-hover:visible invisible transition-all duration-200 z-50">
                        <ul class="py-2">
                            <li><a href="{{ route('about') }}" class="block px-4 py-2 text-gray-700 hover:bg-purple-100">About Us</a></li>
                            <li><a href="{{ route('careers') }}" class="block px-4 py-2 text-gray-700 hover:bg-purple-100">Careers</a></li>
                            <li><a href="{{ route('privacy-policy') }}" class="block px-4 py-2 text-gray-700 hover:bg-purple-100">Privacy Policy</a></li>
                            <li><a href="{{ route('terms-of-service') }}" class="block px-4 py-2 text-gray-700 hover:bg-purple-100">Terms of Service</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Right Side -->
            <div class="flex items-center space-x-4">
                <!-- Search -->
                <div class="hidden md:block w-64">
                    @livewire('search-autocomplete')
                </div>

                <!-- Icons -->
                @auth
                <div class="hidden md:flex items-center space-x-2">
                    <a href="{{ route('account.info') }}" class="flex items-center space-x-2 p-2 text-gray-700 hover:text-purple-600 transition-colors">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        <span>Hello, {{ Auth::user()->name }}</span>
                    </a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="p-2 text-gray-700 hover:text-purple-600 transition-colors" title="Logout">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7" />
                            </svg>
                        </button>
                    </form>
                </div>
                @else
                <a href="{{ route('login') }}" class="hidden md:block">
                    <button class="p-2 text-gray-700 hover:text-purple-600 transition-colors">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </button>
                </a>
                @endauth

                <a href="{{ route('cart.index') }}">
                    <button class="p-2 text-gray-700 hover:text-purple-600 transition-colors relative">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-2.5 5M7 13l2.5 5m6-5v6a2 2 0 01-2 2H9a2 2 0 01-2-2v-6m8 0V9a2 2 0 00-2-2H9a2 2 0 00-2 2v4.01" />
                        </svg>
                        <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center">{{ $this->cartCount }}</span>
                    </button>
                </a>

                <!-- Mobile menu button -->
                <div class="md:hidden">
                    <button @click="mobileMenuOpen = !mobileMenuOpen" class="p-2 text-gray-700 hover:text-purple-600 transition-colors">
                        <svg x-show="!mobileMenuOpen" class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                        <svg x-show="mobileMenuOpen" class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="display: none;">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile menu -->
        <div x-show="mobileMenuOpen"
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 transform -translate-y-2"
            x-transition:enter-end="opacity-100 transform translate-y-0"
            x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="opacity-100 transform translate-y-0"
            x-transition:leave-end="opacity-0 transform -translate-y-2"
            class="md:hidden bg-white border-t border-gray-200"
            style="display: none;">

            <!-- Mobile Search -->
            <div class="px-4 py-3 border-b border-gray-100">
                @livewire('search-autocomplete')
            </div>

            <!-- Mobile Navigation Links -->
            <div class="px-4 py-2">
                <div class="space-y-1">
                    <!-- Products -->
                    <div class="py-2">
                        <a href="{{ route('product-list') }}" class="block text-gray-700 hover:text-purple-600 font-medium transition-colors">Products</a>
                        <div class="ml-4 mt-2 space-y-1">
                            @foreach($categories as $category)
                            <a href="{{ route('product-list', ['category' => $category->slug]) }}" class="block py-1 text-gray-600 hover:text-purple-600">{{ $category->name }}</a>
                            @endforeach
                        </div>
                    </div>

                    <!-- Male -->
                    <div class="py-2">
                        <a href="{{ route('product-list', ['gender' => 'male']) }}" class="block text-gray-700 hover:text-blue-600 font-medium transition-colors">Male</a>
                        <div class="ml-4 mt-2 space-y-1">
                            @foreach($categories as $category)
                            <a href="{{ route('product-list', ['gender' => 'male', 'category' => $category->slug]) }}" class="block py-1 text-gray-600 hover:text-blue-600">{{ $category->name }}</a>
                            @endforeach
                        </div>
                    </div>

                    <!-- Female -->
                    <div class="py-2">
                        <a href="{{ route('product-list', ['gender' => 'female']) }}" class="block text-gray-700 hover:text-pink-600 font-medium transition-colors">Female</a>
                        <div class="ml-4 mt-2 space-y-1">
                            @foreach($categories as $category)
                            <a href="{{ route('product-list', ['gender' => 'female', 'category' => $category->slug]) }}" class="block py-1 text-gray-600 hover:text-pink-600">{{ $category->name }}</a>
                            @endforeach
                        </div>
                    </div>

                    <!-- Articles -->
                    <div class="py-2">
                        <a href="{{ route('articles.index') }}" class="block text-gray-700 hover:text-green-600 font-medium transition-colors">Articles</a>
                    </div>

                    <!-- Support -->
                    <div class="py-2">
                        <span class="block text-gray-700 font-medium">Support</span>
                        <div class="ml-4 mt-2 space-y-1">
                            <a href="{{ route('contact') }}" class="block py-1 text-gray-600 hover:text-pink-600">Contact Us</a>
                            <a href="{{ route('shipping') }}" class="block py-1 text-gray-600 hover:text-pink-600">Shipping</a>
                            <a href="{{ route('returns') }}" class="block py-1 text-gray-600 hover:text-pink-600">Returns</a>
                            <a href="{{ route('sizeguide') }}" class="block py-1 text-gray-600 hover:text-pink-600">Size Guide</a>
                        </div>
                    </div>

                    <!-- Company -->
                    <div class="py-2">
                        <span class="block text-gray-700 font-medium">Company</span>
                        <div class="ml-4 mt-2 space-y-1">
                            <a href="{{ route('about') }}" class="block py-1 text-gray-600 hover:text-purple-600">About Us</a>
                            <a href="{{ route('careers') }}" class="block py-1 text-gray-600 hover:text-purple-600">Careers</a>
                            <a href="{{ route('privacy-policy') }}" class="block py-1 text-gray-600 hover:text-purple-600">Privacy Policy</a>
                            <a href="{{ route('terms-of-service') }}" class="block py-1 text-gray-600 hover:text-purple-600">Terms of Service</a>
                        </div>
                    </div>

                    <!-- Auth Links -->
                    @auth
                    <div class="py-2 border-t border-gray-100">
                        <a href="{{ route('account.info') }}" class="flex items-center space-x-2 py-2 text-gray-700 hover:text-purple-600 transition-colors">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                            <span>Hello, {{ Auth::user()->name }}</span>
                        </a>
                        <form method="POST" action="{{ route('logout') }}" class="mt-2">
                            @csrf
                            <button class="flex items-center space-x-2 py-2 text-gray-700 hover:text-purple-600 transition-colors">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7" />
                                </svg>
                                <span>Logout</span>
                            </button>
                        </form>
                    </div>
                    @else
                    <div class="py-2 border-t border-gray-100">
                        <a href="{{ route('login') }}" class="flex items-center space-x-2 py-2 text-gray-700 hover:text-purple-600 transition-colors">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                            <span>Login</span>
                        </a>
                    </div>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</nav>