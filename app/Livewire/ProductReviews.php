<?php

namespace App\Livewire;

use App\Models\Product;
use App\Models\Review;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class ProductReviews extends Component
{
    use WithPagination;

    public Product $product;
    public $rating = 5;
    public $title = '';
    public $comment = '';
    public $showReviewForm = false;

    protected $rules = [
        'rating' => 'required|integer|min:1|max:5',
        'title' => 'nullable|string|max:255',
        'comment' => 'required|string|min:10|max:1000',
    ];

    public function mount(Product $product)
    {
        $this->product = $product;
    }

    public function toggleReviewForm()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $this->showReviewForm = !$this->showReviewForm;
    }

    public function submitReview()
    {
        $this->validate();

        // Check if user has already reviewed this product
        $existingReview = Review::where('user_id', Auth::id())
            ->where('product_id', $this->product->id)
            ->first();

        if ($existingReview) {
            session()->flash('error', 'You have already reviewed this product.');
            return;
        }

        // Check if user has purchased this product (for verified purchase badge)
        $hasPurchased = Auth::user()->orders()
            ->whereHas('items', function ($query) {
                $query->where('product_id', $this->product->id);
            })
            ->exists();

        Review::create([
            'user_id' => Auth::id(),
            'product_id' => $this->product->id,
            'rating' => $this->rating,
            'title' => $this->title,
            'comment' => $this->comment,
            'is_verified_purchase' => $hasPurchased,
            'is_approved' => false, // Admin approval required
        ]);

        $this->reset(['rating', 'title', 'comment', 'showReviewForm']);
        session()->flash('success', 'Your review has been submitted and is pending approval.');
    }

    public function getReviewStats()
    {
        $reviews = $this->product->approvedReviews();

        $stats = [
            'average' => $reviews->avg('rating') ?? 0,
            'total' => $reviews->count(),
            'distribution' => []
        ];

        // Get rating distribution
        for ($i = 1; $i <= 5; $i++) {
            $count = $reviews->where('rating', $i)->count();
            $percentage = $stats['total'] > 0 ? ($count / $stats['total']) * 100 : 0;
            $stats['distribution'][$i] = [
                'count' => $count,
                'percentage' => $percentage
            ];
        }

        return $stats;
    }

    public function render()
    {
        $reviews = $this->product->approvedReviews()
            ->with('user')
            ->orderBy('created_at', 'desc')
            ->paginate(5);

        $stats = $this->getReviewStats();

        return view('livewire.product-reviews', compact('reviews', 'stats'));
    }
}
