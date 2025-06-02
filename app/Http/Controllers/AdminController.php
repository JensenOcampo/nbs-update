<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function view_dashboard()
    {
        return view('admin.home');
    }

    public function view_category()
    {
        $data = Category::all();
        return view('admin.category', compact('data'));
    }

    public function add_category(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category' => 'required|string|max:255|unique:categories,category_name',
        ], [
            'category.required' => 'Category name is required.',
            'category.unique' => 'This category already exists.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = new Category();
        $data->category_name = $request->category;
        $data->save();

        return redirect()->back()->with('message', 'Category added successfully!');
    }

    public function delete_category($id)
    {
        try {
            $category = Category::findOrFail($id);
            $category->delete();
            return redirect()->back()->with('message', 'Category deleted successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Unable to delete category. It might be in use.');
        }
    }

    public function view_product()
    {
        $category = Category::all();
        return view('admin.product', compact('category'));
    }

    public function add_product(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'price' => 'required|numeric|min:0',
                'dis_price' => 'nullable|numeric|min:0|lt:price',
                'quantity' => 'required|integer|min:0',
                'category' => 'required|exists:categories,id',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
            ], [
                'title.required' => 'Product title is required.',
                'title.max' => 'Product title cannot exceed 255 characters.',
                'description.required' => 'Product description is required.',
                'price.required' => 'Product price is required.',
                'price.numeric' => 'Price must be a number.',
                'price.min' => 'Price cannot be negative.',
                'dis_price.lt' => 'Discount price must be less than the regular price.',
                'quantity.required' => 'Product quantity is required.',
                'quantity.integer' => 'Quantity must be a whole number.',
                'quantity.min' => 'Quantity cannot be negative.',
                'category.required' => 'Please select a category.',
                'category.exists' => 'Selected category does not exist.',
                'image.required' => 'Product image is required.',
                'image.image' => 'The file must be an image.',
                'image.mimes' => 'Image must be jpeg, png, jpg, or gif.',
                'image.max' => 'Image size cannot exceed 2MB.'
            ]);

            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }

            $product = new Product;
            $product->title = $request->title;
            $product->description = $request->description;
            $product->price = $request->price;
            $product->discount_price = $request->dis_price;
            $product->quantity = $request->quantity;
            $product->category_id = $request->category; // Using category_id

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('product'), $imageName);
                $product->image = $imageName;
            }

            $product->save();

            return redirect()->back()->with('message', 'Product added successfully!');
        } catch (\Exception $e) {
            \Log::error('Error adding product: ' . $e->getMessage());
            return redirect()->back()
                ->with('error', 'Failed to add product. Please try again.')
                ->withInput();
        }
    }

    public function show_product()
    {
        $product = Product::all();
        return view('admin.show_product', compact('product'));
    }

    public function delete_product($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->back();
    }
}
