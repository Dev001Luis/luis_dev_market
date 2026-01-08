<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LandingController extends Controller
{
    public function index()
    {
        return view('landing');
    }

    public function guestAccess(Request $request)
    {
        // Generate a guest token and store it in the session
        $token = Str::uuid();
        session(['guest_token' => $token, 'user_role' => $request->role]);

        return redirect()->route('dashboard');
    }
}
