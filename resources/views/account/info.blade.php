@extends('layouts.app')

@section('title', 'My Account')

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
                    <a href="{{ route('wishlist') }}" class="block px-4 py-2 rounded-md {{ request()->routeIs('wishlist') ? 'bg-indigo-50 text-indigo-700 font-semibold' : 'text-gray-700 hover:bg-gray-100' }}">
                        Wish List
                    </a>
                </nav>
            </div>
        </aside>
        <!-- Main Content -->
        <main class="flex-1">
            <div class="bg-white shadow rounded-lg p-8">
                <h1 class="text-2xl font-bold mb-6">Account Information</h1>
                <div class="space-y-4">
                    <div>
                        <span class="block text-gray-600 text-sm">Name</span>
                        <span class="block text-lg font-medium text-gray-900">{{ $user->name }}</span>
                    </div>
                    <div>
                        <span class="block text-gray-600 text-sm">Email</span>
                        <span class="block text-lg font-medium text-gray-900">{{ $user->email }}</span>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
@endsection