<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use App\Http\Requests\Auth\Registration\Save as SaveRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Registration extends Controller
{
    /**
     * Display the registration view.
     */
    public function create()
    {
        return view('auth.registration.create');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(SaveRequest $request)
    {
        return $this->handleValidation(function() use ($request) {
            $request->validated();

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            event(new Registered($user));

            Auth::login($user);

            return response()->json([
                'success' => true,
                'redirect' => redirect()->intended(route('home'))->getTargetUrl()
            ]);
        });
    }
}
