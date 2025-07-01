<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function info()
    {
        $user = Auth::user();
        return view('account.info', compact('user'));
    }
}
