<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Http\Requests\CartRequest;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function index()
    {
        $cart = Session::get('cart');
        return view('cart.index', compact('cart'));
    }

    public function addToCart(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        if (Session::has('cart'))
            $oldCart = Session::get('cart');
        else
            $oldCart = null;

        $cart = new Cart($oldCart);
        $cart->addToCart($product, $product->id);

        Session::put('cart', $cart);
        Session::flash('messageAddToCart', 'Add Product Successfully!');

        return redirect()->route('home');

    }

    public function clearCart(Request $request)
    {
        $request->session()->forget('cart');

        return redirect()->route('cart.index');
    }

    public function removeItemFromCart($id)
    {
        $cart = Session::get('cart');
        $cart->removeItemFromCart($id, $cart);
        Session::flash('removeItemFromCart', 'Remove Item Successfully!');

        return redirect()->route('cart.index');
    }

    public function decreaseQuantity($id)
    {
        $cart = Session::get('cart');

        if ($cart->itemsList[$id]['quantity'] <= 1) {
            Session::flash('messageDecreaseQuantity', 'Quantity must be grater than 1!');
        } else {
            $cart->decreaseQuantity($id, $cart);
        }

        return redirect()->route('cart.index');
    }

    public function increaseQuantity($id)
    {
        $cart = Session::get('cart');

        $cart->increaseQuantity($id, $cart);

        return redirect()->route('cart.index');
    }

    public function increaseQuantityByInputValue(CartRequest $request, $id)
    {
        $cart = Session::get('cart');

        $inputValue = $request->cartQuantity;

        $cart->increaseQuantityByInputValue($id, $cart, $inputValue);

        return redirect()->route('cart.index');
    }
}
