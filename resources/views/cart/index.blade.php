@extends('layouts.app')

@section('title', 'Your Cart')

@section('content')
<div class="max-w-4xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
    <h1 class="text-2xl font-bold mb-6">Shopping Cart</h1>
    @if(session('success'))
    <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
        {{ session('success') }}
    </div>
    @endif
    @if(empty($products))
    <div class="text-center py-16">
        <div class="text-6xl mb-4">🛒</div>
        <h3 class="text-2xl font-bold text-gray-900 mb-2">Your cart is empty</h3>
        <a href="{{ route('product-list') }}" class="mt-6 inline-block px-8 py-3 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition-colors">Shop Now</a>
    </div>
    @else
    <div class="space-y-8">
        @foreach($products as $product)
        <div class="flex items-center justify-between bg-white rounded-lg shadow p-4">
            <div class="flex items-center gap-4">
                <img src="{{ $product->getImageUrl() }}" alt="{{ $product->name }}" class="w-20 h-20 object-cover rounded">
                <div>
                    <div class="font-semibold text-lg text-gray-900">{{ $product->name }}</div>
                    <div class="text-gray-500 text-sm">${{ number_format($product->price, 2) }}</div>
                    @if($product->selected_size)
                    <div class="text-xs text-gray-400">Size: {{ $product->selected_size }}</div>
                    @endif
                    @if($product->selected_color)
                    <div class="text-xs text-gray-400">Color: {{ $product->selected_color }}</div>
                    @endif
                </div>
            </div>
            <form action="{{ route('cart.update') }}" method="POST" class="flex items-center gap-2">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <input type="number" name="quantity" value="{{ $product->quantity }}" min="1" max="10" class="w-16 border rounded px-2 py-1">
                <button type="submit" class="px-3 py-1 bg-purple-600 text-white rounded hover:bg-purple-700">Update</button>
            </form>
            <form action="{{ route('cart.remove') }}" method="POST">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <button type="submit" class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600">Remove</button>
            </form>
        </div>
        @endforeach
    </div>
    <div class="mt-8 flex justify-between items-center">
        <div class="text-xl font-bold">Total: ${{ number_format($total, 2) }}</div>
        <form action="{{ route('cart.clear') }}" method="POST">
            @csrf
            <button type="submit" class="px-4 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300">Clear Cart</button>
        </form>
    </div>
    <div class="mt-8 text-right">
        <a href="{{ route('checkout.index') }}" class="px-8 py-3 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition-colors">Proceed to Checkout</a>
    </div>
    @endif
</div>
@endsection