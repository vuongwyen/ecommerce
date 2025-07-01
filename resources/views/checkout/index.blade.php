<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - Fashion Ecommerce</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50">
    <div class="min-h-screen">
        <!-- Header -->
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center py-6">
                    <h1 class="text-3xl font-bold text-gray-900">Checkout</h1>
                    <a href="{{ route('cart.index') }}" class="text-indigo-600 hover:text-indigo-500">Back to Cart</a>
                </div>
            </div>
        </header>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            @if(session('error'))
            <div class="mb-4 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded relative">
                {{ session('error') }}
            </div>
            @endif

            <form action="{{ route('checkout.store') }}" method="POST">
                @csrf
                <div class="lg:grid lg:grid-cols-2 lg:gap-x-12 xl:gap-x-16">
                    <div class="lg:col-span-1">
                        <div>
                            <h2 class="text-lg font-medium text-gray-900">Shipping information</h2>

                            <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-2">
                                <div>
                                    <label for="first_name" class="block text-sm font-medium text-gray-700">First name</label>
                                    <div class="mt-1">
                                        <input type="text" id="first_name" name="first_name" required
                                            class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                                            value="{{ old('first_name', auth()->user()->name ?? '') }}">
                                    </div>
                                    @error('first_name')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="last_name" class="block text-sm font-medium text-gray-700">Last name</label>
                                    <div class="mt-1">
                                        <input type="text" id="last_name" name="last_name"
                                            class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                                            value="{{ old('last_name') }}">
                                    </div>
                                    @error('last_name')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="sm:col-span-2">
                                    <label for="email" class="block text-sm font-medium text-gray-700">Email address</label>
                                    <div class="mt-1">
                                        <input type="email" id="email" name="email" required
                                            class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                                            value="{{ old('email', auth()->user()->email ?? '') }}">
                                    </div>
                                    @error('email')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="sm:col-span-2">
                                    <label for="phone" class="block text-sm font-medium text-gray-700">Phone number</label>
                                    <div class="mt-1">
                                        <input type="tel" id="phone" name="phone" required
                                            class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                                            value="{{ old('phone') }}">
                                    </div>
                                    @error('phone')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="sm:col-span-2">
                                    <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                                    <div class="mt-1">
                                        <input type="text" id="address" name="address" required
                                            class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                                            value="{{ old('address') }}">
                                    </div>
                                    @error('address')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="city" class="block text-sm font-medium text-gray-700">City</label>
                                    <div class="mt-1">
                                        <input type="text" id="city" name="city" required
                                            class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                                            value="{{ old('city') }}">
                                    </div>
                                    @error('city')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="state" class="block text-sm font-medium text-gray-700">State / Province</label>
                                    <div class="mt-1">
                                        <input type="text" id="state" name="state" required
                                            class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                                            value="{{ old('state') }}">
                                    </div>
                                    @error('state')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="zip_code" class="block text-sm font-medium text-gray-700">ZIP / Postal code</label>
                                    <div class="mt-1">
                                        <input type="text" id="zip_code" name="zip_code" required
                                            class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                                            value="{{ old('zip_code') }}">
                                    </div>
                                    @error('zip_code')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="country" class="block text-sm font-medium text-gray-700">Country</label>
                                    <div class="mt-1">
                                        <select id="country" name="country" required
                                            class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                                            <option value="">Select a country</option>
                                            <option value="US" {{ old('country') == 'US' ? 'selected' : '' }}>United States</option>
                                            <option value="CA" {{ old('country') == 'CA' ? 'selected' : '' }}>Canada</option>
                                            <option value="UK" {{ old('country') == 'UK' ? 'selected' : '' }}>United Kingdom</option>
                                            <option value="AU" {{ old('country') == 'AU' ? 'selected' : '' }}>Australia</option>
                                        </select>
                                    </div>
                                    @error('country')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mt-10">
                            <h2 class="text-lg font-medium text-gray-900">Shipping Method</h2>
                            <div class="mt-4">
                                <select id="shipping_method" name="shipping_method" required
                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                                    <option value="">Select a shipping method</option>
                                    <option value="giaohangtietkiem" {{ old('shipping_method') == 'giaohangtietkiem' ? 'selected' : '' }}>Giao hàng tiết kiệm</option>
                                    <option value="jtexpress" {{ old('shipping_method') == 'jtexpress' ? 'selected' : '' }}>JTEXPRESS</option>
                                    <option value="viettelpost" {{ old('shipping_method') == 'viettelpost' ? 'selected' : '' }}>VIETTELPOST</option>
                                    <option value="vnpost" {{ old('shipping_method') == 'vnpost' ? 'selected' : '' }}>VNPOST</option>
                                    <option value="giaohangnhanh" {{ old('shipping_method') == 'giaohangnhanh' ? 'selected' : '' }}>Giao hàng nhanh</option>
                                </select>
                                @error('shipping_method')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="mt-10">
                            <h2 class="text-lg font-medium text-gray-900">Payment method</h2>

                            <div class="mt-6 space-y-4">
                                <div class="flex items-center">
                                    <input id="cod" name="payment_method" type="radio" value="cod" checked
                                        class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
                                    <label for="cod" class="ml-3 block text-sm font-medium text-gray-700">
                                        Cash on Delivery (COD)
                                    </label>
                                </div>

                                <div class="flex items-center">
                                    <input id="paypal" name="payment_method" type="radio" value="paypal"
                                        class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
                                    <label for="paypal" class="ml-3 block text-sm font-medium text-gray-700">
                                        PayPal
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="mt-10">
                            <label for="notes" class="block text-sm font-medium text-gray-700">Order notes (optional)</label>
                            <div class="mt-1">
                                <textarea id="notes" name="notes" rows="4"
                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                                    placeholder="Any special instructions for delivery">{{ old('notes') }}</textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Order summary -->
                    <div class="mt-10 lg:mt-0 lg:col-span-1">
                        <h2 class="text-lg font-medium text-gray-900">Order summary</h2>

                        <div class="mt-6 bg-white border border-gray-200 rounded-lg shadow-sm">
                            <ul role="list" class="divide-y divide-gray-200">
                                @foreach($products as $product)
                                <li class="flex py-6 px-4 sm:px-6">
                                    <div class="flex-shrink-0 w-20 h-20">
                                        <img src="{{ $product->getImageUrl()}}" alt="{{ $product->name }}" class="w-full h-full object-center object-cover rounded-md">
                                    </div>

                                    <div class="ml-6 flex-1 flex flex-col">
                                        <div class="flex">
                                            <div class="flex-1">
                                                <h4 class="text-sm">
                                                    <a href="{{ route('product-detail', $product->slug) }}" class="font-medium text-gray-700 hover:text-gray-800">
                                                        {{ $product->name }}
                                                    </a>
                                                </h4>
                                                @if($product->selected_size || $product->selected_color)
                                                <p class="mt-1 text-sm text-gray-500">
                                                    @if($product->selected_size)
                                                    Size: {{ $product->selected_size }}
                                                    @endif
                                                    @if($product->selected_color)
                                                    @if($product->selected_size) | @endif
                                                    Color: {{ $product->selected_color }}
                                                    @endif
                                                </p>
                                                @endif
                                            </div>

                                            <p class="ml-4 text-sm font-medium text-gray-900">
                                                ${{ number_format($product->price * $product->quantity, 2) }}
                                            </p>
                                        </div>

                                        <div class="flex items-center justify-between text-sm">
                                            <p class="text-gray-500">Qty {{ $product->quantity }}</p>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                            </ul>

                            <dl class="border-t border-gray-200 py-6 px-4 space-y-6 sm:px-6">
                                <div class="flex items-center justify-between">
                                    <dt class="text-sm text-gray-600">Subtotal</dt>
                                    <dd class="text-sm font-medium text-gray-900">${{ number_format($subtotal, 2) }}</dd>
                                </div>
                                <div class="flex items-center justify-between">
                                    <dt class="text-sm text-gray-600">Shipping</dt>
                                    <dd class="text-sm font-medium text-gray-900">${{ number_format($shipping, 2) }}</dd>
                                </div>
                                <div class="flex items-center justify-between">
                                    <dt class="text-sm text-gray-600">Tax</dt>
                                    <dd class="text-sm font-medium text-gray-900">${{ number_format($tax, 2) }}</dd>
                                </div>
                                <div class="flex items-center justify-between border-t border-gray-200 pt-6">
                                    <dt class="text-base font-medium text-gray-900">Order total</dt>
                                    <dd class="text-base font-medium text-gray-900">${{ number_format($total, 2) }}</dd>
                                </div>
                            </dl>
                        </div>

                        <div class="mt-6">
                            <button type="submit" class="w-full bg-indigo-600 border border-transparent rounded-md shadow-sm py-3 px-4 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-50 focus:ring-indigo-500">
                                Complete order
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>