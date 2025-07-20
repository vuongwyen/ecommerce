<?php

namespace App\Services;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartService
{
    /**
     * Get the current cart (session for guests, DB for logged-in users)
     */
    public function getCart(): array
    {
        if (Auth::check()) {
            $user = Auth::user();
            $dbCart = $user->carts()->get();
            $cart = [];
            foreach ($dbCart as $item) {
                $cart[$item->product_id] = [
                    'quantity' => $item->quantity,
                    'size' => $item->size,
                    'color' => $item->color,
                ];
            }
            return $cart;
        }
        return Session::get('cart', []);
    }

    /**
     * Add a product to the cart
     */
    public function addToCart(int $productId, int $quantity, ?string $size = null, ?string $color = null): void
    {
        $cart = Session::get('cart', []);

        // If product already in cart, increase quantity
        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] += $quantity;
        } else {
            // Otherwise, add new product entry
            $cart[$productId] = [
                'quantity' => $quantity,
                'size' => $size,
                'color' => $color,
            ];
        }

        // Save updated cart to session
        Session::put('cart', $cart);

        // Sync to DB if logged in
        if (Auth::check()) {
            $user = Auth::user();
            $cartRow = Cart::firstOrNew([
                'user_id' => $user->id,
                'product_id' => $productId,
                'size' => $size,
                'color' => $color,
            ]);
            $cartRow->quantity = ($cartRow->exists ? $cartRow->quantity : 0) + $quantity;
            $cartRow->save();
        }
    }

    /**
     * Update the quantity of a product in the cart
     */
    public function updateQuantity(int $productId, int $quantity): void
    {
        $cart = Session::get('cart', []);

        // If product exists in cart, update its quantity
        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] = $quantity;
            Session::put('cart', $cart);
        }

        // Sync to DB if logged in
        if (Auth::check()) {
            $user = Auth::user();
            $cartRow = Cart::where('user_id', $user->id)
                ->where('product_id', $productId)
                ->first();
            if ($cartRow) {
                $cartRow->quantity = $quantity;
                $cartRow->save();
            }
        }
    }

    /**
     * Remove a product from the cart
     */
    public function removeFromCart(int $productId): void
    {
        $cart = Session::get('cart', []);

        // If product exists in cart, remove it
        if (isset($cart[$productId])) {
            unset($cart[$productId]);
            Session::put('cart', $cart);
        }

        // Remove from DB if logged in
        if (Auth::check()) {
            $user = Auth::user();
            Cart::where('user_id', $user->id)
                ->where('product_id', $productId)
                ->delete();
        }
    }

    /**
     * Clear the entire cart
     */
    public function clearCart(): void
    {
        Session::forget('cart');

        // Clear DB cart if logged in
        if (Auth::check()) {
            $user = Auth::user();
            Cart::where('user_id', $user->id)->delete();
        }
    }

    /**
     * Get cart count (total quantity of all items)
     */
    public function getCartCount(): int
    {
        $cart = $this->getCart();
        return array_sum(array_column($cart, 'quantity'));
    }

    /**
     * Merge session cart with database cart (used on login)
     */
    public function mergeSessionCartWithDb(): void
    {
        if (!Auth::check()) {
            return;
        }

        $sessionCart = Session::get('cart', []);
        $user = Auth::user();

        foreach ($sessionCart as $productId => $item) {
            $cartRow = Cart::firstOrNew([
                'user_id' => $user->id,
                'product_id' => $productId,
                'size' => $item['size'] ?? null,
                'color' => $item['color'] ?? null,
            ]);
            $cartRow->quantity = ($cartRow->exists ? $cartRow->quantity : 0) + $item['quantity'];
            $cartRow->save();
        }

        // Clear session cart after merging
        Session::forget('cart');
    }

    /**
     * Load database cart into session (used after login)
     */
    public function loadDbCartIntoSession(): void
    {
        if (!Auth::check()) {
            return;
        }

        $user = Auth::user();
        $dbCart = $user->carts()->get();
        $cart = [];

        foreach ($dbCart as $item) {
            $cart[$item->product_id] = [
                'quantity' => $item->quantity,
                'size' => $item->size,
                'color' => $item->color,
            ];
        }

        Session::put('cart', $cart);
    }
}
