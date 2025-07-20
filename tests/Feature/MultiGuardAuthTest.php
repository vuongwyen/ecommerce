<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;

class MultiGuardAuthTest extends TestCase
{
    use RefreshDatabase;

    protected $user;
    protected $admin;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->create([
            'email' => 'user@example.com',
            'password' => bcrypt('password'),
        ]);

        $this->admin = Admin::factory()->create([
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
        ]);
    }

    /** @test */
    public function user_and_admin_can_be_logged_in_simultaneously()
    {
        // Login as user
        $this->actingAs($this->user, 'web');

        // Verify user is logged in
        $this->assertTrue(Auth::guard('web')->check());
        $this->assertFalse(Auth::guard('admin')->check());

        // Login as admin in the same session
        Auth::guard('admin')->login($this->admin);

        // Verify both are logged in
        $this->assertTrue(Auth::guard('web')->check());
        $this->assertTrue(Auth::guard('admin')->check());

        // Verify correct users are authenticated
        $this->assertEquals($this->user->id, Auth::guard('web')->id());
        $this->assertEquals($this->admin->id, Auth::guard('admin')->id());
    }

    /** @test */
    public function logging_out_from_one_guard_does_not_affect_the_other()
    {
        // Login as both user and admin
        $this->actingAs($this->user, 'web');
        Auth::guard('admin')->login($this->admin);

        // Verify both are logged in
        $this->assertTrue(Auth::guard('web')->check());
        $this->assertTrue(Auth::guard('admin')->check());

        // Logout from admin guard
        Auth::guard('admin')->logout();

        // Verify user is still logged in, admin is not
        $this->assertTrue(Auth::guard('web')->check());
        $this->assertFalse(Auth::guard('admin')->check());

        // Logout from user guard
        Auth::guard('web')->logout();

        // Verify both are logged out
        $this->assertFalse(Auth::guard('web')->check());
        $this->assertFalse(Auth::guard('admin')->check());
    }

    /** @test */
    public function admin_login_route_works_with_admin_guard()
    {
        $response = $this->post('/admin/login', [
            'email' => 'admin@example.com',
            'password' => 'password',
        ]);

        $response->assertRedirect('/admin');
        $this->assertTrue(Auth::guard('admin')->check());
        $this->assertFalse(Auth::guard('web')->check());
    }

    /** @test */
    public function user_login_route_works_with_web_guard()
    {
        $response = $this->post('/login', [
            'email' => 'user@example.com',
            'password' => 'password',
        ]);

        $response->assertRedirect('/');
        $this->assertTrue(Auth::guard('web')->check());
        $this->assertFalse(Auth::guard('admin')->check());
    }

    /** @test */
    public function admin_logout_only_affects_admin_session()
    {
        // Login as both
        $this->actingAs($this->user, 'web');
        Auth::guard('admin')->login($this->admin);

        // Logout from admin
        $response = $this->post('/admin/logout');

        $response->assertRedirect('/admin/login');
        $this->assertTrue(Auth::guard('web')->check());
        $this->assertFalse(Auth::guard('admin')->check());
    }

    /** @test */
    public function user_logout_only_affects_user_session()
    {
        // Login as both
        $this->actingAs($this->user, 'web');
        Auth::guard('admin')->login($this->admin);

        // Logout from user
        $response = $this->post('/logout');

        $response->assertRedirect('/');
        $this->assertFalse(Auth::guard('web')->check());
        $this->assertTrue(Auth::guard('admin')->check());
    }

    /** @test */
    public function admin_can_access_admin_panel_with_admin_guard()
    {
        $this->actingAs($this->admin, 'admin');

        $response = $this->get('/admin');

        $response->assertStatus(200);
    }

    /** @test */
    public function user_cannot_access_admin_panel_with_web_guard()
    {
        $this->actingAs($this->user, 'web');

        $response = $this->get('/admin');

        $response->assertRedirect('/admin/login');
    }
}
