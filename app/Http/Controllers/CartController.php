<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    // Display the cart page with all products in the session cart
    public function index()
    {
        $cart = Session::get('cart', []); // Retrieve cart from session (or empty array)
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

        $productId = $request->product_id;
        $quantity = $request->quantity;
        $size = $request->size;
        $color = $request->color;

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

        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    // Update the quantity of a product in the cart
    public function update(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $productId = $request->product_id;
        $quantity = $request->quantity;

        $cart = Session::get('cart', []);

        // If product exists in cart, update its quantity
        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] = $quantity;
            Session::put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Cart updated successfully!');
    }

    // Remove a product from the cart
    public function remove(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
        ]);

        $productId = $request->product_id;
        $cart = Session::get('cart', []);

        // If product exists in cart, remove it
        if (isset($cart[$productId])) {
            unset($cart[$productId]);
            Session::put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Product removed from cart!');
    }

    // Clear the entire cart
    public function clear()
    {
        Session::forget('cart'); // Remove cart from session
        return redirect()->back()->with('success', 'Cart cleared successfully!');
    }
}
