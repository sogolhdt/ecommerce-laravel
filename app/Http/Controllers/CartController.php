<?php
namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function add($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return $this->redirectWithMessage('products.index', 'error', 'Product not found.');
        }

        if (Auth::check()) {
            return $this->addProductToAuthenticatedUserCart($product);
        } else {
            return $this->addProductToSessionCart($product);
        }
    }

    private function addProductToAuthenticatedUserCart($product)
    {
        $user = Auth::user();
        $cartItem = $user->cart()->where('product_id', $product->id)->first();

        if ($cartItem) {
            return $this->redirectWithMessage('products.index', 'error', 'Product is already in the cart.');
        }

        $user->cart()->create(['product_id' => $product->id]);
        return $this->redirectWithMessage('products.index', 'success', 'Product added to cart.');
    }

    private function addProductToSessionCart($product)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$product->id])) {
            return $this->redirectWithMessage('products.index', 'error', 'Product is already in the cart.');
        }

        $cart[$product->id] = [
            "name" => $product->name,
            "quantity" => 1,
            "price" => $product->price,
            "description" => $product->description
        ];

        session()->put('cart', $cart);
        return $this->redirectWithMessage('products.index', 'success', 'Product added to cart.');
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
        return $this->redirectWithMessage('cart.index', 'success', 'Product removed from cart.');
    }
    private function redirectWithMessage($route, $type, $message)
    {
        return redirect()->route($route)->with($type, $message);
    }
}
