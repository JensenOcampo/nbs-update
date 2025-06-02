<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Cart;

class LoginRegController extends Controller
{
    // Show login form
    public function showLogin()
    {
        return view('auth.login');
    }

    // Handle login
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user = Auth::user();

            // 1. Save guest cart to DB (if any)
            $sessionCart = session('cart', []);
            if (!empty($sessionCart)) {
                Cart::updateOrCreate(
                    ['user_id' => $user->id],
                    ['items' => json_encode($sessionCart)]
                );
            }

            // 2. Load user's cart from DB (overrides session cart)
            $userCart = Cart::where('user_id', $user->id)->first();
            if ($userCart && $userCart->items) {
                session(['cart' => json_decode($userCart->items, true)]);
            } else {
                session(['cart' => []]);
            }

            if ($user->usertype == '1') {
                // Admin user
                return redirect()->route('admin.home');
            } else {
                // Regular user
                return redirect('/')->with('success', 'Logged in successfully!');
            }
        }

        return back()->withErrors([
            'email' => 'Invalid credentials.',
        ])->withInput();
    }

    // Show registration form
    public function showRegister()
    {
        return view('auth.register');
    }

    // Handle registration
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        Auth::login($user);
        $request->session()->regenerate();

        return redirect('login')->with('success', 'Registration successful!');
    }

    // Handle logout
    public function logout(Request $request)
    {
        if (Auth::check()) {
            $user = Auth::user();
            $cart = session('cart', []);
            Cart::updateOrCreate(
                ['user_id' => $user->id],
                ['items' => json_encode($cart)]
            );
        }
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('success', 'Logged out successfully!');
    }
}
