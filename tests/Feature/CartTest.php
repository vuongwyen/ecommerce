<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Product;
use App\Models\Cart;
use App\Services\CartService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Session;

class CartTest extends TestCase
{
    use RefreshDatabase;

    protected $user;
    protected $product;
    protected $cartService;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->create();
        $this->product = Product::factory()->create([
            'price' => 100.00,
            'in_stock' => true,
        ]);
        $this->cartService = app(CartService::class);
    }

    /** @test */
    public function guest_can_add_product_to_session_cart()
    {
        $response = $this->post('/cart/add', [
            'product_id' => $this->product->id,
            'quantity' => 2,
            'size' => 'M',
            'color' => 'Red',
        ]);

        $response->assertRedirect();
        $this->assertEquals(2, $this->cartService->getCartCount());

        $cart = $this->cartService->getCart();
        $this->assertArrayHasKey($this->product->id, $cart);
        $this->assertEquals(2, $cart[$this->product->id]['quantity']);
        $this->assertEquals('M', $cart[$this->product->id]['size']);
        $this->assertEquals('Red', $cart[$this->product->id]['color']);
    }

    /** @test */
    public function logged_in_user_can_add_product_to_db_cart()
    {
        $this->actingAs($this->user);

        $response = $this->post('/cart/add', [
            'product_id' => $this->product->id,
            'quantity' => 3,
            'size' => 'L',
            'color' => 'Blue',
        ]);

        $response->assertRedirect();
        $this->assertEquals(3, $this->cartService->getCartCount());

        // Verify it's saved in database
        $this->assertDatabaseHas('carts', [
            'user_id' => $this->user->id,
            'product_id' => $this->product->id,
            'quantity' => 3,
            'size' => 'L',
            'color' => 'Blue',
        ]);
    }

    /** @test */
    public function session_cart_merges_with_db_cart_on_login()
    {
        // Add item to session cart as guest
        $this->post('/cart/add', [
            'product_id' => $this->product->id,
            'quantity' => 2,
            'size' => 'M',
            'color' => 'Red',
        ]);

        // Verify session cart has item
        $this->assertEquals(2, $this->cartService->getCartCount());

        // Login and verify cart is merged
        $response = $this->post('/login', [
            'email' => $this->user->email,
            'password' => 'password', // Assuming factory uses 'password'
        ]);

        $response->assertRedirect('/');

        // Verify item is now in database
        $this->assertDatabaseHas('carts', [
            'user_id' => $this->user->id,
            'product_id' => $this->product->id,
            'quantity' => 2,
            'size' => 'M',
            'color' => 'Red',
        ]);

        // Verify session cart is cleared
        $this->assertEmpty(Session::get('cart'));
    }

    /** @test */
    public function db_cart_persists_after_logout()
    {
        $this->actingAs($this->user);

        // Add item to cart
        $this->post('/cart/add', [
            'product_id' => $this->product->id,
            'quantity' => 2,
        ]);

        // Verify item is in database
        $this->assertDatabaseHas('carts', [
            'user_id' => $this->user->id,
            'product_id' => $this->product->id,
            'quantity' => 2,
        ]);

        // Logout
        $this->post('/logout');

        // Verify item still exists in database
        $this->assertDatabaseHas('carts', [
            'user_id' => $this->user->id,
            'product_id' => $this->product->id,
            'quantity' => 2,
        ]);

        // Verify session cart is cleared
        $this->assertEmpty(Session::get('cart'));
    }

    /** @test */
    public function cart_count_shows_correct_total_for_logged_in_user()
    {
        $this->actingAs($this->user);

        // Add multiple items
        $this->post('/cart/add', [
            'product_id' => $this->product->id,
            'quantity' => 2,
        ]);

        $product2 = Product::factory()->create();
        $this->post('/cart/add', [
            'product_id' => $product2->id,
            'quantity' => 3,
        ]);

        $this->assertEquals(5, $this->cartService->getCartCount());
    }

    /** @test */
    public function cart_count_shows_correct_total_for_guest()
    {
        // Add items to session cart
        $this->post('/cart/add', [
            'product_id' => $this->product->id,
            'quantity' => 2,
        ]);

        $product2 = Product::factory()->create();
        $this->post('/cart/add', [
            'product_id' => $product2->id,
            'quantity' => 3,
        ]);

        $this->assertEquals(5, $this->cartService->getCartCount());
    }

    /** @test */
    public function can_update_cart_item_quantity()
    {
        $this->actingAs($this->user);

        // Add item
        $this->post('/cart/add', [
            'product_id' => $this->product->id,
            'quantity' => 2,
        ]);

        // Update quantity
        $response = $this->post('/cart/update', [
            'product_id' => $this->product->id,
            'quantity' => 5,
        ]);

        $response->assertRedirect();

        $this->assertEquals(5, $this->cartService->getCartCount());
        $this->assertDatabaseHas('carts', [
            'user_id' => $this->user->id,
            'product_id' => $this->product->id,
            'quantity' => 5,
        ]);
    }

    /** @test */
    public function can_remove_cart_item()
    {
        $this->actingAs($this->user);

        // Add item
        $this->post('/cart/add', [
            'product_id' => $this->product->id,
            'quantity' => 2,
        ]);

        // Remove item
        $response = $this->post('/cart/remove', [
            'product_id' => $this->product->id,
        ]);

        $response->assertRedirect();

        $this->assertEquals(0, $this->cartService->getCartCount());
        $this->assertDatabaseMissing('carts', [
            'user_id' => $this->user->id,
            'product_id' => $this->product->id,
        ]);
    }

    /** @test */
    public function can_clear_entire_cart()
    {
        $this->actingAs($this->user);

        // Add multiple items
        $this->post('/cart/add', [
            'product_id' => $this->product->id,
            'quantity' => 2,
        ]);

        $product2 = Product::factory()->create();
        $this->post('/cart/add', [
            'product_id' => $product2->id,
            'quantity' => 3,
        ]);

        // Clear cart
        $response = $this->post('/cart/clear');

        $response->assertRedirect();

        $this->assertEquals(0, $this->cartService->getCartCount());
        $this->assertDatabaseMissing('carts', [
            'user_id' => $this->user->id,
        ]);
    }

    /** @test */
    public function cart_merging_handles_duplicate_products_correctly()
    {
        // Add same product to session cart twice
        $this->post('/cart/add', [
            'product_id' => $this->product->id,
            'quantity' => 2,
            'size' => 'M',
            'color' => 'Red',
        ]);

        $this->post('/cart/add', [
            'product_id' => $this->product->id,
            'quantity' => 3,
            'size' => 'M',
            'color' => 'Red',
        ]);

        // Login
        $this->post('/login', [
            'email' => $this->user->email,
            'password' => 'password',
        ]);

        // Verify quantities are merged correctly
        $this->assertDatabaseHas('carts', [
            'user_id' => $this->user->id,
            'product_id' => $this->product->id,
            'quantity' => 5, // 2 + 3
            'size' => 'M',
            'color' => 'Red',
        ]);
    }
}
