<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment - Fashion Ecommerce</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50">
    <div class="min-h-screen">
        <!-- Header -->
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center py-6">
                    <h1 class="text-3xl font-bold text-gray-900">Payment</h1>
                    <a href="{{ route('checkout.index') }}" class="text-indigo-600 hover:text-indigo-500">Back to Checkout</a>
                </div>
            </div>
        </header>

        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            @if(session('error'))
            <div class="mb-4 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded relative">
                {{ session('error') }}
            </div>
            @endif

            <div class="lg:grid lg:grid-cols-2 lg:gap-x-12 xl:gap-x-16">
                <div class="lg:col-span-1">
                    <div class="bg-white border border-gray-200 rounded-lg shadow-sm p-6">
                        <h2 class="text-lg font-medium text-gray-900 mb-6">Payment Information</h2>

                        <form action="{{ route('checkout.process-payment', $order->id) }}" method="POST">
                            @csrf
                            <div class="space-y-6">
                                <div>
                                    <label for="card_number" class="block text-sm font-medium text-gray-700">Card number</label>
                                    <div class="mt-1">
                                        <input type="text" id="card_number" name="card_number" required
                                            class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                                            placeholder="1234 5678 9012 3456">
                                    </div>
                                    @error('card_number')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <label for="expiry_month" class="block text-sm font-medium text-gray-700">Expiry month</label>
                                        <div class="mt-1">
                                            <select id="expiry_month" name="expiry_month" required
                                                class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                                                <option value="">Month</option>
                                                @for($i = 1; $i <= 12; $i++)
                                                    <option value="{{ $i }}" {{ old('expiry_month') == $i ? 'selected' : '' }}>
                                                    {{ str_pad($i, 2, '0', STR_PAD_LEFT) }}
                                                    </option>
                                                    @endfor
                                            </select>
                                        </div>
                                        @error('expiry_month')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="expiry_year" class="block text-sm font-medium text-gray-700">Expiry year</label>
                                        <div class="mt-1">
                                            <select id="expiry_year" name="expiry_year" required
                                                class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                                                <option value="">Year</option>
                                                @for($i = date('Y'); $i <= date('Y') + 10; $i++)
                                                    <option value="{{ $i }}" {{ old('expiry_year') == $i ? 'selected' : '' }}>
                                                    {{ $i }}
                                                    </option>
                                                    @endfor
                                            </select>
                                        </div>
                                        @error('expiry_year')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div>
                                    <label for="cvv" class="block text-sm font-medium text-gray-700">CVV</label>
                                    <div class="mt-1">
                                        <input type="text" id="cvv" name="cvv" required
                                            class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                                            placeholder="123" maxlength="4">
                                    </div>
                                    @error('cvv')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mt-6">
                                    <button type="submit" class="w-full bg-indigo-600 border border-transparent rounded-md shadow-sm py-3 px-4 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-50 focus:ring-indigo-500">
                                        Pay ${{ number_format($order->grand_total, 2) }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Order summary -->
                <div class="mt-10 lg:mt-0 lg:col-span-1">
                    <h2 class="text-lg font-medium text-gray-900">Order summary</h2>

                    <div class="mt-6 bg-white border border-gray-200 rounded-lg shadow-sm">
                        <ul role="list" class="divide-y divide-gray-200">
                            @foreach($order->items as $item)
                            <li class="flex py-6 px-4 sm:px-6">
                                <div class="flex-shrink-0 w-20 h-20">
                                    <img src="{{ $item->product->image ?? 'https://via.placeholder.com/150' }}" alt="{{ $item->product->name }}" class="w-full h-full object-center object-cover rounded-md">
                                </div>

                                <div class="ml-6 flex-1 flex flex-col">
                                    <div class="flex">
                                        <div class="flex-1">
                                            <h4 class="text-sm">
                                                <a href="{{ route('product-detail', $item->product->slug) }}" class="font-medium text-gray-700 hover:text-gray-800">
                                                    {{ $item->product->name }}
                                                </a>
                                            </h4>
                                            @if($item->size || $item->color)
                                            <p class="mt-1 text-sm text-gray-500">
                                                @if($item->size)
                                                Size: {{ $item->size }}
                                                @endif
                                                @if($item->color)
                                                @if($item->size) | @endif
                                                Color: {{ $item->color }}
                                                @endif
                                            </p>
                                            @endif
                                        </div>

                                        <p class="ml-4 text-sm font-medium text-gray-900">
                                            ${{ number_format($item->price * $item->quantity, 2) }}
                                        </p>
                                    </div>

                                    <div class="flex items-center justify-between text-sm">
                                        <p class="text-gray-500">Qty {{ $item->quantity }}</p>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>

                        <dl class="border-t border-gray-200 py-6 px-4 space-y-6 sm:px-6">
                            <div class="flex items-center justify-between">
                                <dt class="text-sm text-gray-600">Subtotal</dt>
                                <dd class="text-sm font-medium text-gray-900">${{ number_format($order->grand_total - $order->shipping_amount - ($order->grand_total - $order->shipping_amount) * 0.08, 2) }}</dd>
                            </div>
                            <div class="flex items-center justify-between">
                                <dt class="text-sm text-gray-600">Shipping</dt>
                                <dd class="text-sm font-medium text-gray-900">${{ number_format($order->shipping_amount, 2) }}</dd>
                            </div>
                            <div class="flex items-center justify-between">
                                <dt class="text-sm text-gray-600">Tax</dt>
                                <dd class="text-sm font-medium text-gray-900">${{ number_format(($order->grand_total - $order->shipping_amount) * 0.08, 2) }}</dd>
                            </div>
                            <div class="flex items-center justify-between border-t border-gray-200 pt-6">
                                <dt class="text-base font-medium text-gray-900">Order total</dt>
                                <dd class="text-base font-medium text-gray-900">${{ number_format($order->grand_total, 2) }}</dd>
                            </div>
                        </dl>
                    </div>

                    <!-- Shipping address -->
                    <div class="mt-6 bg-white border border-gray-200 rounded-lg shadow-sm p-6">
                        <h3 class="text-lg font-medium text-gray-900">Shipping address</h3>
                        <div class="mt-4 text-sm text-gray-600">
                            <p>{{ $order->address->first_name }} {{ $order->address->last_name }}</p>
                            <p>{{ $order->address->address }}</p>
                            <p>{{ $order->address->city }}, {{ $order->address->state }} {{ $order->address->zip_code }}</p>
                            <p>{{ $order->address->country }}</p>
                            <p class="mt-2">{{ $order->address->phone }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>