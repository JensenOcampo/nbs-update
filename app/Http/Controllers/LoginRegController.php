<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
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
        // $validator = Validator::make($request->all(), [
        //     'email' => 'required|email',
        //     'password' => 'required|min:6'
        // ], [
        //     'email.required' => 'Please enter your email address.',
        //     'email.email' => 'Please enter a valid email address.',
        //     'password.required' => 'Please enter your password.',
        //     'password.min' => 'Password must be at least 6 characters.'
        // ]);

        // if ($validator->fails()) {
        //     return redirect()->back()
        //         ->withErrors($validator)
        //         ->withInput($request->except('password'));
        // }

        // $credentials = $request->only('email', 'password');

        // if (Auth::attempt($credentials)) {
        //     $request->session()->regenerate();

        //     // Handle cart merging for logged-in user
        //     $sessionCart = session()->get('cart', []);
        //     if (!empty($sessionCart)) {
        //         Cart::updateOrCreate(
        //             ['user_id' => Auth::id()],
        //             ['items' => json_encode($sessionCart)]
        //         );
        //     }

        //     return redirect()->intended('dashboard')
        //         ->with('success', 'Welcome back! You have successfully logged in.');
        // }

        // $usertype = Auth::user()->usertype;

        // if ($usertype == '1') {
        //     return view('admin.home');
        // } else {
        //     return view('home.userpage');
        // }

        // return back()
        //     ->withErrors(['email' => 'These credentials do not match our records.'])
        //     ->withInput($request->except('password'));

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
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'phone' => 'required|string|min:10|max:15',
            'address' => 'required|string|max:500',
        ], [
            'name.required' => 'Please enter your full name.',
            'email.required' => 'Please enter your email address.',
            'email.email' => 'Please enter a valid email address.',
            'email.unique' => 'This email is already registered.',
            'password.required' => 'Please enter a password.',
            'password.min' => 'Password must be at least 8 characters.',
            'password.confirmed' => 'Password confirmation does not match.',
            'phone.required' => 'Please enter your phone number.',
            'phone.min' => 'Phone number must be at least 10 digits.',
            'address.required' => 'Please enter your address.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput($request->except('password', 'password_confirmation'));
        }

        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'phone' => $request->phone,
                'address' => $request->address,
            ]);

            Auth::login($user);

            return redirect()->route('dashboard')
                ->with('success', 'Welcome! Your account has been successfully created.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'There was a problem creating your account. Please try again.')
                ->withInput($request->except('password', 'password_confirmation'));
        }
    }

    // Handle logout
    public function logout(Request $request)
    {
        // Save cart before logout if user is authenticated
        if (Auth::check()) {
            $cart = session()->get('cart', []);
            Cart::updateOrCreate(
                ['user_id' => Auth::id()],
                ['items' => json_encode($cart)]
            );
        }

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home')
            ->with('success', 'You have been successfully logged out.');
    }
}
