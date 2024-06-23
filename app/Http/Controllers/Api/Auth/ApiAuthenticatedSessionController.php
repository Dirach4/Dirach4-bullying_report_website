<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApiAuthenticatedSessionController extends Controller
{
    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request)
{
    $request->authenticate();

    $request->session()->regenerate();

    $user = $request->user();

    if ($user->usertype == 'admin') {
        return response()->json(['message' => 'Login successful', 'redirect_url' => url('admin/dashboard')]);
    } elseif ($user->usertype == 'pengguna') {
        return response()->json(['message' => 'Login successful', 'redirect_url' => url('pengguna/dashboard')]);
    }

    // Default redirect if usertype is not 'admin' or 'pengguna'
    return response()->json(['message' => 'Login successful', 'redirect_url' => route('dashboard')]);
}


    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return response()->json(['message' => 'Logged out successfully']);
    }
}
