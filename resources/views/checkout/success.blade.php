<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmed - Fashion Ecommerce</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50">
    <div class="min-h-screen">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="text-center">
                <!-- Success icon -->
                <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-green-100">
                    <svg class="h-6 w-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                </div>

                <h1 class="mt-6 text-3xl font-extrabold text-gray-900">Thank you for your order!</h1>
                <p class="mt-2 text-lg text-gray-600">
                    Your order #{{ $order->id }} has been confirmed and is being processed.
                </p>
            </div>

            <div class="mt-12 bg-white border border-gray-200 rounded-lg shadow-sm">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h2 class="text-lg font-medium text-gray-900">Order Details</h2>
                </div>

                <div class="px-6 py-4">
                    <dl class="grid grid-cols-1 gap-x-4 gap-y-6 sm:grid-cols-2">
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Order number</dt>
                            <dd class="mt-1 text-sm text-gray-900">#{{ $order->id }}</dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Order date</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ $order->created_at->format('M d, Y') }}</dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Payment method</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ ucfirst(str_replace('_', ' ', $order->payment_method)) }}</dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Payment status</dt>
                            <dd class="mt-1 text-sm text-gray-900">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                    {{ ucfirst($order->payment_status) }}
                                </span>
                            </dd>
                        </div>
                    </dl>
                </div>

                <div class="px-6 py-4 border-t border-gray-200">
                    <h3 class="text-lg font-medium text-gray-900">Order Items</h3>
                    <ul role="list" class="mt-4 divide-y divide-gray-200">
                        @foreach($order->items as $item)
                        <li class="flex py-4">
                            <div class="flex-shrink-0 w-16 h-16">
                                <img src="{{ $item->product->getImageUrl() ?? 'https://via.placeholder.com/150' }}" alt="{{ $item->product->name }}" class="w-full h-full object-center object-cover rounded-md">
                            </div>

                            <div class="ml-4 flex-1 flex flex-col">
                                <div class="flex justify-between text-base font-medium text-gray-900">
                                    <h4>{{ $item->product->name }}</h4>
                                    <p>${{ number_format($item->price * $item->quantity, 2) }}</p>
                                </div>
                                <p class="mt-1 text-sm text-gray-500">Qty {{ $item->quantity }}</p>
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
                        </li>
                        @endforeach
                    </ul>
                </div>

                <div class="px-6 py-4 border-t border-gray-200">
                    <dl class="space-y-4">
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
                        <div class="flex items-center justify-between border-t border-gray-200 pt-4">
                            <dt class="text-base font-medium text-gray-900">Total</dt>
                            <dd class="text-base font-medium text-gray-900">${{ number_format($order->grand_total, 2) }}</dd>
                        </div>
                    </dl>
                </div>

                <div class="px-6 py-4 border-t border-gray-200">
                    <h3 class="text-lg font-medium text-gray-900">Shipping Address</h3>
                    <div class="mt-4 text-sm text-gray-600">
                        <p>{{ $order->address->first_name }} {{ $order->address->last_name }}</p>
                        <p>{{ $order->address->address }}</p>
                        <p>{{ $order->address->city }}, {{ $order->address->state }} {{ $order->address->zip_code }}</p>
                        <p>{{ $order->address->country }}</p>
                        <p class="mt-2">{{ $order->address->phone }}</p>
                    </div>
                </div>
            </div>

            <div class="mt-8 text-center">
                <p class="text-sm text-gray-600">
                    We'll send you a confirmation email with tracking information once your order ships.
                </p>
                <div class="mt-6 space-x-4">
                    <a href="{{ route('home') }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700">
                        Continue Shopping
                    </a>
                    <a href="{{ route('orders.history') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                        View Order History
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>