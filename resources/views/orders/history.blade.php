@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
    <div class="flex flex-col md:flex-row gap-8">
        <!-- Sidebar -->
        <aside class="w-full md:w-1/4 mb-8 md:mb-0">
            <div class="bg-white shadow rounded-lg p-6">
                <nav class="space-y-2">
                    <a href="{{ route('account.info') }}" class="block px-4 py-2 rounded-md {{ request()->routeIs('account.info') ? 'bg-indigo-50 text-indigo-700 font-semibold' : 'text-gray-700 hover:bg-gray-100' }}">
                        Account Information
                    </a>
                    <a href="{{ route('orders.history') }}" class="block px-4 py-2 rounded-md {{ request()->routeIs('orders.history') ? 'bg-indigo-50 text-indigo-700 font-semibold' : 'text-gray-700 hover:bg-gray-100' }}">
                        Order History
                    </a>
                </nav>
            </div>
        </aside>
        <main class="flex-1">
            <div class="bg-white shadow rounded-lg p-8">
                <h1 class="text-2xl font-bold mb-6">Order History</h1>
                @forelse($orders as $order)
                <div class="bg-white shadow rounded-lg mb-4 p-6">
                    <div>
                        <div class="font-semibold">Order #{{ $order->id }}</div>
                        <div class="text-sm text-gray-500">{{ $order->created_at->format('M d, Y') }}</div>
                        <div class="text-sm">Status: <span class="font-medium">{{ ucfirst($order->status) }}</span></div>
                        <div class="text-sm">Total: <span class="font-medium">${{ number_format($order->grand_total, 2) }}</span></div>
                    </div>
                    <a href="{{ route('orders.show', $order->id) }}" class="text-indigo-600 hover:underline">View Details</a>
                </div>
                @empty
                <p>You have not placed any orders yet.</p>
                @endforelse
            </div>
        </main>
    </div>
</div>
@endsection