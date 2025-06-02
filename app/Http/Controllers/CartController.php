<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    // Display the cart page
    public function index()
    {
        try {
            $cart = session()->get('cart', []);
            return view('cart.index', compact('cart'));
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'There was a problem loading your cart. Please try again.');
        }
    }

    // Add a product to the cart
    public function addToCart($id)
    {
        try {
            $product = Product::findOrFail($id);
            $cart = session()->get('cart', []);

            if (isset($cart[$id])) {
                $cart[$id]['quantity']++;
            } else {
                $cart[$id] = [
                    "title" => $product->title,
                    "quantity" => 1,
                    "price" => $product->price,
                    "image" => $product->image,
                ];
            }

            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Product added to cart successfully!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'There was a problem adding the product to your cart. Please try again.');
        }
    }

    // Increase product quantity in cart
    public function increase($id)
    {
        try {
            $cart = session()->get('cart', []);

            if (!isset($cart[$id])) {
                return redirect()->back()
                    ->with('error', 'Product not found in cart.');
            }

            $product = Product::findOrFail($id);

            // Optional: Check stock availability
            // if ($cart[$id]['quantity'] >= $product->stock) {
            //     return redirect()->back()
            //         ->with('error', 'Sorry, we don\'t have enough stock for this item.');
            // }

            $cart[$id]['quantity']++;
            session()->put('cart', $cart);

            return redirect()->back()
                ->with('success', 'Product quantity updated.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'There was a problem updating the quantity. Please try again.');
        }
    }

    // Decrease product quantity in cart
    public function decrease($id)
    {
        try {
            $cart = session()->get('cart', []);

            if (!isset($cart[$id])) {
                return redirect()->back()
                    ->with('error', 'Product not found in cart.');
            }

            if ($cart[$id]['quantity'] > 1) {
                $cart[$id]['quantity']--;
                session()->put('cart', $cart);
                $message = 'Product quantity updated.';
            } else {
                unset($cart[$id]);
                session()->put('cart', $cart);
                $message = 'Product removed from cart.';
            }

            return redirect()->back()->with('success', $message);
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'There was a problem updating the quantity. Please try again.');
        }
    }

    // Remove product from cart
    public function remove($id)
    {
        try {
            $cart = session()->get('cart', []);

            if (!isset($cart[$id])) {
                return redirect()->back()
                    ->with('error', 'Product not found in cart.');
            }

            unset($cart[$id]);
            session()->put('cart', $cart);

            return redirect()->back()
                ->with('success', 'Product removed from cart successfully!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'There was a problem removing the product. Please try again.');
        }
    }
}
