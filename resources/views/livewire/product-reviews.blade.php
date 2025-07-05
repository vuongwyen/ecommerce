<div class="space-y-6">
    <!-- Review Summary -->
    <div class="bg-gray-50 rounded-lg p-6">
        <div class="flex items-center space-x-8">
            <div class="text-center">
                <div class="text-4xl font-bold text-gray-900">{{ number_format($stats['average'], 1) }}</div>
                <div class="flex text-yellow-400 mt-1">
                    @for($i = 1; $i <= 5; $i++)
                        @if($i <=$stats['average'])
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20">
                        <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                        </svg>
                        @else
                        <svg class="w-5 h-5 text-gray-300" viewBox="0 0 20 20">
                            <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                        </svg>
                        @endif
                        @endfor
                </div>
                <div class="text-sm text-gray-600 mt-1">Based on {{ $stats['total'] }} reviews</div>
            </div>
            <div class="flex-1">
                <div class="space-y-2">
                    @for($i = 5; $i >= 1; $i--)
                    <div class="flex items-center space-x-2">
                        <span class="text-sm text-gray-600 w-8">{{ $i }}★</span>
                        <div class="flex-1 bg-gray-200 rounded-full h-2">
                            <div class="bg-yellow-400 h-2 rounded-full" style="width: {{ $stats['distribution'][$i]['percentage'] }}%"></div>
                        </div>
                        <span class="text-sm text-gray-600 w-12">{{ $stats['distribution'][$i]['count'] }}</span>
                    </div>
                    @endfor
                </div>
            </div>
        </div>
    </div>

    <!-- Write Review Button -->
    <div class="flex justify-between items-center">
        <h3 class="text-lg font-semibold text-gray-900">Customer Reviews</h3>
        <button wire:click="toggleReviewForm"
            class="bg-purple-600 text-white px-4 py-2 rounded-lg hover:bg-purple-700 transition-colors">
            Write a Review
        </button>
    </div>

    <!-- Review Form -->
    @if($showReviewForm)
    <div class="bg-white border border-gray-200 rounded-lg p-6">
        <h4 class="text-lg font-semibold text-gray-900 mb-4">Write Your Review</h4>

        <form wire:submit.prevent="submitReview" class="space-y-4">
            <!-- Rating Selection -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Rating</label>
                <div class="flex space-x-2">
                    @for($i = 1; $i <= 5; $i++)
                        <button type="button" wire:click="$set('rating', {{ $i }})"
                        class="text-2xl {{ $i <= $rating ? 'text-yellow-400' : 'text-gray-300' }} hover:text-yellow-400 transition-colors">
                        ★
                        </button>
                        @endfor
                </div>
                @error('rating') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Review Title -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Title (Optional)</label>
                <input type="text" wire:model="title"
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-purple-500"
                    placeholder="Summarize your experience">
                @error('title') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Review Comment -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Review</label>
                <textarea wire:model="comment" rows="4"
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-purple-500"
                    placeholder="Share your experience with this product..."></textarea>
                @error('comment') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Submit Buttons -->
            <div class="flex space-x-3">
                <button type="submit"
                    class="bg-purple-600 text-white px-6 py-2 rounded-lg hover:bg-purple-700 transition-colors">
                    Submit Review
                </button>
                <button type="button" wire:click="toggleReviewForm"
                    class="bg-gray-300 text-gray-700 px-6 py-2 rounded-lg hover:bg-gray-400 transition-colors">
                    Cancel
                </button>
            </div>
        </form>
    </div>
    @endif

    <!-- Individual Reviews -->
    @if($reviews->count() > 0)
    <div class="space-y-6">
        @foreach($reviews as $review)
        <div class="border border-gray-200 rounded-lg p-6">
            <div class="flex items-start justify-between mb-4">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-purple-100 rounded-full flex items-center justify-center">
                        <span class="text-purple-600 font-semibold">{{ strtoupper(substr($review->user->name, 0, 2)) }}</span>
                    </div>
                    <div>
                        <div class="font-medium text-gray-900">{{ $review->user->name }}</div>
                        <div class="flex items-center space-x-2 mt-1">
                            <div class="flex text-yellow-400">
                                @for($i = 1; $i <= 5; $i++)
                                    @if($i <=$review->rating)
                                    <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                        <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                                    </svg>
                                    @else
                                    <svg class="w-4 h-4 text-gray-300" viewBox="0 0 20 20">
                                        <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                                    </svg>
                                    @endif
                                    @endfor
                            </div>
                            @if($review->is_verified_purchase)
                            <span class="bg-green-100 text-green-800 px-2 py-1 rounded text-xs font-medium">
                                Verified Purchase
                            </span>
                            @endif
                        </div>
                    </div>
                </div>
                <span class="text-sm text-gray-500">{{ $review->formatted_date }}</span>
            </div>

            @if($review->title)
            <h5 class="font-semibold text-gray-900 mb-2">{{ $review->title }}</h5>
            @endif

            <p class="text-gray-600 leading-relaxed">{{ $review->comment }}</p>
        </div>
        @endforeach

        <!-- Pagination -->
        <div class="mt-6">
            {{ $reviews->links() }}
        </div>
    </div>
    @else
    <div class="text-center py-8">
        <svg class="mx-auto h-12 w-12 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
        </svg>
        <p class="text-gray-500">No reviews yet. Be the first to review this product!</p>
    </div>
    @endif
</div>