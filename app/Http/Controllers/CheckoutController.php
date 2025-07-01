<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Address;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    // Require authentication for all checkout actions
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Show the checkout page with cart summary and shipping/payment forms
    public function index()
    {
        $cart = Session::get('cart', []);

        if (empty($cart)) {
            // Redirect if cart is empty
            return redirect()->route('cart.index')->with('error', 'Your cart is empty!');
        }

        $products = [];
        $subtotal = 0;
        $shipping = 10.00; // Fixed shipping cost
        $tax = 0;

        // Gather product details and calculate subtotal
        foreach ($cart as $productId => $item) {
            $product = Product::find($productId);
            if ($product) {
                $product->quantity = $item['quantity'];
                $product->selected_size = $item['size'] ?? null;
                $product->selected_color = $item['color'] ?? null;
                $products[] = $product;
                $subtotal += $product->price * $item['quantity'];
            }
        }

        $tax = $subtotal * 0.08; // 8% tax
        $total = $subtotal + $shipping + $tax;

        // Render checkout view with all calculated values
        return view('checkout.index', compact('products', 'subtotal', 'shipping', 'tax', 'total'));
    }

    // Handle checkout form submission, create order, address, and order items
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'zip_code' => 'required|string|max:10',
            'country' => 'required|string|max:255',
            'shipping_method' => 'required|in:giaohangtietkiem,jtexpress,viettelpost,vnpost,giaohangnhanh',
            'payment_method' => 'required|in:cod,paypal', // Accepts COD and PayPal
        ]);

        $cart = Session::get('cart', []);

        if (empty($cart)) {
            // Redirect if cart is empty
            return redirect()->route('cart.index')->with('error', 'Your cart is empty!');
        }

        try {
            DB::beginTransaction();

            // Calculate totals again for security
            $subtotal = 0;
            $shipping = 10.00;

            foreach ($cart as $productId => $item) {
                $product = Product::find($productId);
                if ($product) {
                    $subtotal += $product->price * $item['quantity'];
                }
            }

            $tax = $subtotal * 0.08;
            $total = $subtotal + $shipping + $tax;

            // Create the order record
            $order = Order::create([
                'user_id' => Auth::id(),
                'grand_total' => $total,
                'payment_method' => $request->payment_method,
                'payment_status' => $request->payment_method === 'cod' ? 'pending' : 'pending', // COD: pending, PayPal: pending
                'status' => 'pending',
                'currency' => 'USD',
                'shipping_amount' => $shipping,
                'shipping_method' => $request->shipping_method,
                'notes' => $request->notes ?? null,
            ]);

            // Create the shipping address record
            $address = Address::create([
                'order_id' => $order->id,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'city' => $request->city,
                'state' => $request->state,
                'zip_code' => $request->zip_code,
                'country' => $request->country,
                'type' => 'shipping',
            ]);

            // Create order items for each product in the cart
            foreach ($cart as $productId => $item) {
                $product = Product::find($productId);
                if ($product) {
                    OrderItem::create([
                        'order_id' => $order->id,
                        'product_id' => $productId,
                        'quantity' => $item['quantity'],
                        'price' => $product->price,
                        'size' => $item['size'] ?? null,
                        'color' => $item['color'] ?? null,
                    ]);
                }
            }

            DB::commit();

            // Clear the cart from session
            Session::forget('cart');

            // If COD, go directly to success page; otherwise, go to payment page
            if ($request->payment_method === 'cod') {
                return redirect()->route('checkout.success', $order->id);
            } else {
                // Redirect to payment processing
                return redirect()->route('checkout.payment', $order->id);
            }
        } catch (\Exception $e) {
            DB::rollback();
            return back()->with('error', 'An error occurred while processing your order. Please try again.');
        }
    }

    // Show the payment page for online payment methods
    public function payment($orderId)
    {
        $order = Order::with(['items.product', 'address'])->findOrFail($orderId);

        // Ensure the order belongs to the current user
        if ($order->user_id !== Auth::id()) {
            abort(403);
        }

        // Render the payment view
        return view('checkout.payment', compact('order'));
    }

    // Handle payment form submission and simulate payment processing
    public function processPayment(Request $request, $orderId)
    {
        $order = Order::findOrFail($orderId);

        // Ensure the order belongs to the current user
        if ($order->user_id !== Auth::id()) {
            abort(403);
        }

        // Simulate payment processing (for demo)
        $request->validate([
            'card_number' => 'required|string|min:13|max:19',
            'expiry_month' => 'required|integer|between:1,12',
            'expiry_year' => 'required|integer|min:' . date('Y'),
            'cvv' => 'required|string|min:3|max:4',
        ]);

        // Simulate payment success (90% success rate for demo)
        $paymentSuccess = rand(1, 10) <= 9;

        if ($paymentSuccess) {
            // Mark order as paid and processing
            $order->update([
                'payment_status' => 'paid',
                'status' => 'processing',
            ]);

            return redirect()->route('checkout.success', $order->id);
        } else {
            return back()->with('error', 'Payment failed. Please try again with different card details.');
        }
    }

    // Show the order success/confirmation page
    public function success($orderId)
    {
        $order = Order::with(['items.product', 'address'])->findOrFail($orderId);

        // Ensure the order belongs to the current user
        if ($order->user_id !== Auth::id()) {
            abort(403);
        }

        // Render the order success view
        return view('checkout.success', compact('order'));
    }
}
