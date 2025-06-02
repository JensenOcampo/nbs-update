<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;

class GuestProductController extends Controller
{
    // Show all products to guests
    public function index(Request $request)
    {
        $categories = Category::all();
        $query = Product::query();

        // Search functionality with improved logic
        if ($request->filled('q')) {
            $searchTerm = $request->input('q');
            $terms = explode(' ', Str::lower($searchTerm));

            $query->where(function ($q) use ($terms) {
                foreach ($terms as $term) {
                    $q->where(function ($subQ) use ($term) {
                        $subQ->where('title', 'like', "%{$term}%")
                            ->orWhere('description', 'like', "%{$term}%")
                            ->orWhereHas('category', function ($catQ) use ($term) {
                                $catQ->where('category_name', 'like', "%{$term}%");
                            });
                    });
                }
            });
        }

        // Category filter
        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        // Price sorting
        if ($request->filled('price_sort')) {
            $query->orderBy('price', $request->price_sort);
        } else {
            // Default sorting by latest
            $query->latest();
        }

        $products = $query->get();

        if ($request->ajax()) {
            return view('partials.product_list', compact('products'));
        }

        return view('guest.index', compact('products', 'categories'));
    }

    // Add product to cart (session-based)
    public function addToCart(Request $request, $id)
    {
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

        return redirect()->back()->with('success', 'Product added to cart!');
    }

    // Search products (now redirects to index with search parameter)
    public function search(Request $request)
    {
        return redirect()->route('home', ['q' => $request->input('q')]);
    }
}
