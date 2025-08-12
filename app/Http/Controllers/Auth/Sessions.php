<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Auth\Sessions\Save as SaveRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class Sessions extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.sessions.create');
    }

    /**
     * Handle an incoming authentication request.
     * @throws ValidationException
     */
    public function store(SaveRequest $request)
    {
        return $this->handleValidation(function() use ($request) {
            $request->authenticate();
            $request->session()->regenerate();

            return response()->json([
                'success' => true,
                'redirect' => redirect()->intended(route('home'))->getTargetUrl()
            ]);
        });
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request)
    {
        return $this->handleValidation(function() use ($request) {
            Auth::guard('web')->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return response()->json([
                'success' => true,
                'redirect' => route('home')
            ]);
        });
    }
}
