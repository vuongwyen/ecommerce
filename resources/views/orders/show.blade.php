@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto py-8">
    <h1 class="text-2xl font-bold mb-6">Order #{{ $order->id }} Details</h1>
    <div class="bg-white shadow rounded-lg p-6 mb-6">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <div class="text-sm text-gray-500">Order Date</div>
                <div class="font-medium">{{ $order->created_at->format('M d, Y H:i') }}</div>
            </div>
            <div>
                <div class="text-sm text-gray-500">Status</div>
                <div class="font-medium">{{ ucfirst($order->status) }}</div>
            </div>
            <div>
                <div class="text-sm text-gray-500">Payment Method</div>
                <div class="font-medium">{{ ucfirst(str_replace('_', ' ', $order->payment_method)) }}</div>
            </div>
            <div>
                <div class="text-sm text-gray-500">Payment Status</div>
                <div class="font-medium">{{ ucfirst($order->payment_status) }}</div>
            </div>
            <div>
                <div class="text-sm text-gray-500">Shipping Method</div>
                <div class="font-medium">{{ ucfirst(str_replace('_', ' ', $order->shipping_method)) }}</div>
            </div>
            <div>
                <div class="text-sm text-gray-500">Total</div>
                <div class="font-medium">${{ number_format($order->grand_total, 2) }}</div>
            </div>
        </div>
    </div>

    <div class="bg-white shadow rounded-lg p-6 mb-6">
        <h2 class="text-lg font-semibold mb-4">Order Items</h2>
        <ul class="divide-y divide-gray-200">
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

    <div class="bg-white shadow rounded-lg p-6 mb-6">
        <h2 class="text-lg font-semibold mb-4">Shipping Address</h2>
        <div class="text-sm text-gray-600">
            <p>{{ $order->address->first_name }} {{ $order->address->last_name }}</p>
            <p>{{ $order->address->address }}</p>
            <p>{{ $order->address->city }}, {{ $order->address->state }} {{ $order->address->zip_code }}</p>
            <p>{{ $order->address->country }}</p>
            <p class="mt-2">{{ $order->address->phone }}</p>
        </div>
    </div>

    @if($order->notes)
    <div class="bg-white shadow rounded-lg p-6 mb-6">
        <h2 class="text-lg font-semibold mb-4">Order Notes</h2>
        <div class="text-sm text-gray-600">{{ $order->notes }}</div>
    </div>
    @endif

    <a href="{{ route('orders.history') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
        Back to Order History
    </a>
</div>
@endsection