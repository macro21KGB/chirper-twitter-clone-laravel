<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Login extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $credentials = $request->validate([
            "email" => "required|string|email",
            "password" => "required|string",
        ]);

        if (Auth::attempt($credentials, true)) {
            $request->session()->regenerate();

            return redirect()
                ->intended("/")
                ->with("success", "Logged in successfully!");
        } else {
            return back()
                ->withErrors([
                    "email" =>
                        "The provided credentials do not match our records.",
                ])
                ->onlyInput("email");
        }
    }
}
