<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        // 1. Determine the role (Priority: Auth User > Guest Session)
        $role = null;

        if (Auth::check()) {
            echo ("\nentro qui 1\n");
            echo (Auth::user());
            $role = Auth::user()->role;
        } elseif (session()->has('user_role')) {
            $role = session('user_role');
        }

        // 2. Redirect back to landing if no role is found (safety net)
        if (!$role) {
            return redirect()->route('landing')->with('error', 'Please select a role first.');
        }

        // 3. Return the specific view based on the directory structure
        // If role is 'recruiter', it looks for resources/views/recruiter/dashboard.blade.php
        return view("{$role}.dashboard");
    }
}
