<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ProductCreated;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        if (Auth::check()) {
            $cartCount = Auth::user()->cart()->count();
        } else {
            $cartCount = count(session('cart', []));
        }

        return view('products.index', compact('products', 'cartCount'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'product_code' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'stock' => 'required|integer|min:0',
        ]);

        $product = Product::create($request->all());

        // Send email to management
        $managementEmail = 'sogoli.hdt@gmail.com'; // !! fill the desired email !!
        Mail::to($managementEmail)->send(new ProductCreated($product));

        return redirect()->route('products.index')->with('success', 'Product created successfully');
    }
}

