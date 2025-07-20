<?php

namespace App\Helpers;

use App\Services\CartService;

class CartHelper
{
    /**
     * Get the current cart count
     */
    public static function getCartCount(): int
    {
        $cartService = app(CartService::class);
        return $cartService->getCartCount();
    }

    /**
     * Get the current cart
     */
    public static function getCart(): array
    {
        $cartService = app(CartService::class);
        return $cartService->getCart();
    }

    /**
     * Add a product to cart
     */
    public static function addToCart(int $productId, int $quantity, ?string $size = null, ?string $color = null): void
    {
        $cartService = app(CartService::class);
        $cartService->addToCart($productId, $quantity, $size, $color);
    }

    /**
     * Update cart item quantity
     */
    public static function updateQuantity(int $productId, int $quantity): void
    {
        $cartService = app(CartService::class);
        $cartService->updateQuantity($productId, $quantity);
    }

    /**
     * Remove item from cart
     */
    public static function removeFromCart(int $productId): void
    {
        $cartService = app(CartService::class);
        $cartService->removeFromCart($productId);
    }

    /**
     * Clear the entire cart
     */
    public static function clearCart(): void
    {
        $cartService = app(CartService::class);
        $cartService->clearCart();
    }
}
