<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $product = Product::findOrFail($request->input('product_id'));

        if($request->input('qty') > $product->quantity) {
            return redirect()->back()->with('message', 'Not enough stock');
        }else {
            Cart::add(
                $product->id,
                $product->name,
                $request->input('qty'),
                $product->price,
            );
        }
        return redirect('/category')->with('message', 'Successfully added!');
    }

    public function cart()
    {
        $cart = Cart::content();
        return view('cart', compact('cart'));
    }

    public function clearCart($id)
    {
        Cart::remove($id);
        return redirect()->back()->with('message', 'Item removed');
    }

    public function deleteCart()
    {
        Cart::destroy();
        return redirect()->back()->with('message', 'Successfully cleared your cart');
    }
}
