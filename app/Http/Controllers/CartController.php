<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function add($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return redirect()->route('products.index')->with('error', 'Product not found.');
        }

        if (Auth::check()) {
            $user = Auth::user();
            $cartItem = $user->cart()->where('product_id', $product->id)->first();

            if ($cartItem) {
                return redirect()->route('products.index')->with('error', 'Product is already in the cart.');
            }

            $user->cart()->create([
                'product_id' => $product->id,
            ]);

        } else {

            $cart = session()->get('cart', []);

            if (isset($cart[$id])) {
                return redirect()->route('products.index')->with('error', 'Product is already in the cart.');
            }


            $cart[$id] = [
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "description" => $product->description
            ];

            session()->put('cart', $cart);
        }
        return redirect()->route('products.index')->with('success', 'Product added to cart.');
    }

    public function index()
    {
        $sessionCart = session()->get('cart', []);
        $userCart = Auth::check() ? Auth::user()->cart()->with('product')->get() : [];

        return view('cart.index', compact('sessionCart', 'userCart'));
    }

    public function remove($id)
    {
        if (Auth::check()) {
            $user = Auth::user();
            $user->cart()->where('product_id', $id)->delete();
        } else {
            $cart = session()->get('cart', []);
            if (isset($cart[$id])) {
                unset($cart[$id]);
                session()->put('cart', $cart);
            }
        }
        return redirect()->route('cart.index')->with('success', 'Product removed from cart.');
    }
}
