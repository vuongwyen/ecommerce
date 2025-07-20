<!-- resources/views/livewire/wishlist-button.blade.php -->
<div>
    <button
        wire:click="toggleWishlist"
        class="p-2 rounded-full border border-gray-300 hover:bg-pink-100 transition"
        x-data="{ loading: false }"
        x-on:click="loading = true"
        :disabled="loading">
        <svg class="w-6 h-6 {{ $inWishlist ? 'text-pink-500 fill-current' : 'text-gray-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path d="M12 21l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41 0.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.18L12 21z" />
        </svg>
    </button>
</div>