<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApiEmailVerificationPromptController extends Controller
{
    /**
     * Display the email verification prompt.
     */
    public function __invoke(Request $request)
    {
        return $request->user()->hasVerifiedEmail()
            ? response()->json(['message' => 'Email already verified', 'redirect_url' => route('dashboard')])
            : response()->json(['message' => 'Email not verified', 'verification_prompt' => true]);
    }
}
