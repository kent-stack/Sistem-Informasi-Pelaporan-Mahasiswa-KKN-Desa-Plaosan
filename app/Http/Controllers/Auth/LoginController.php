<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'nim' => 'required|string',
            'password' => 'required|string',
        ]);

        $throttleKey = Str::lower($request->nim) . '|' . $request->ip();

        if (RateLimiter::tooManyAttempts($throttleKey, 5)) {
            $seconds = RateLimiter::availableIn($throttleKey);
            throw ValidationException::withMessages([
                'nim' => "Too many login attempts. Please try again in {$seconds} seconds.",
            ]);
        }

        \Log::info('Login attempt', ['nim' => $request->nim]);

        if (Auth::attempt(['nim' => $request->nim, 'password' => $request->password], $request->remember)) {
            \Log::info('Login success', ['nim' => $request->nim]);
            $request->session()->regenerate();
            RateLimiter::clear($throttleKey);
            
            if (Auth::user()->is_admin) {
                return redirect()->intended(route('admin.reports.index'));
            }
            
            return redirect()->intended(route('home'));
        }

        \Log::warning('Login failed', ['nim' => $request->nim]);

        RateLimiter::hit($throttleKey, 60);

        return back()->withErrors([
            'nim' => 'The provided credentials do not match our records.',
        ])->onlyInput('nim');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
