<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Admin;
use App\Services\AdminSessionService;

class AdminAuthController extends Controller
{
    protected $adminSessionService;

    public function __construct(AdminSessionService $adminSessionService)
    {
        $this->adminSessionService = $adminSessionService;
    }

    public function showLogin()
    {
        return view('auth.admin-login');
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $credentials = $request->only('email', 'password');
        if (Auth::guard('admin')->attempt($credentials, $request->filled('remember'))) {
            // Use admin session service to regenerate session
            $this->adminSessionService->regenerateSession();
            return redirect()->intended('/admin');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->withInput();
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();

        // Use admin session service to invalidate session
        $this->adminSessionService->invalidateSession();
        $this->adminSessionService->regenerateToken();

        return redirect('/admin/login');
    }
}
