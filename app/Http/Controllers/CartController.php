<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use App\Services\CartService;

class CartController extends Controller
{
    protected $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    // Display the cart page with all products in the session cart
    public function index()
    {
        $cart = $this->cartService->getCart();
        $products = [];
        $total = 0;

        // Loop through cart items and fetch product details from DB
        foreach ($cart as $productId => $item) {
            $product = Product::find($productId);
            if ($product) {
                // Attach quantity and options to product object for view
                $product->quantity = $item['quantity'];
                $product->selected_size = $item['size'] ?? null;
                $product->selected_color = $item['color'] ?? null;
                $products[] = $product;
                $total += $product->price * $item['quantity'];
            }
        }

        // Render the cart view with products and total
        return view('cart.index', compact('products', 'total'));
    }

    // Add a product to the cart (or increase quantity if already present)
    public function add(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'size' => 'nullable|string',
            'color' => 'nullable|string',
        ]);

        $this->cartService->addToCart(
            $request->product_id,
            $request->quantity,
            $request->size,
            $request->color
        );

        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    // Update the quantity of a product in the cart
    public function update(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $this->cartService->updateQuantity($request->product_id, $request->quantity);

        return redirect()->back()->with('success', 'Cart updated successfully!');
    }

    // Remove a product from the cart
    public function remove(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
        ]);

        $this->cartService->removeFromCart($request->product_id);

        return redirect()->back()->with('success', 'Product removed from cart!');
    }

    // Clear the entire cart
    public function clear()
    {
        $this->cartService->clearCart();

        return redirect()->back()->with('success', 'Cart cleared successfully!');
    }
}
