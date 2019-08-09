<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Product;

class CartController extends Controller
{
    public function index() {
        return view('cart');
    }
    
    public function addtoCart(Request $request)
    {
        $product_id = $request->get('product_id');
        $quantity = $request->get('quantity');
        $product = Product::whereId($product_id)->firstOrFail();
        $item = [
            'product_id' => $product->id,
            'name' => $product->name,
            'image' => $product->img,
            'price' => $product->price,
            'quantity' => $quantity,
        ];

        $cart = session()->get('cart');
        if (!isset($cart['subtotal'])) {
            $cart['subtotal'] = 0;
        }
        if (!isset($cart['shipping'])) {
            $cart['shipping'] = config('shop.shipping');
        }

        if (isset($cart['item'][$product_id])) {
            $cart['item'][$product_id]['quantity'] += $item['quantity'];
        } else {
            $cart['item'][$product_id] = $item;
        }

        $cart['subtotal'] += $item['quantity'] * $item['price'];

        session()->put('cart', $cart);

        return redirect('/')->with(session()->get('cart'));
    }

    public function destroy() {
        session()->forget('cart');
        
        return redirect('/');
    }

    public function remove($id) {
        $cart = session()->get('cart');
        $cart['subtotal'] -= $cart['item'][$id]['quantity'] * $cart['item'][$id]['price'];
        unset($cart['item'][$id]);
        session()->put('cart', $cart);

        return redirect('cart')->with(session()->get('cart'));
    }

    public function update(Request $request) {
        $cart = session()->get('cart');
        $id = $request->get('product_id');
        $cart['subtotal'] = $cart['subtotal'] + ($request->get('quantity') - $cart['item'][$id]['quantity']) * $cart['item'][$id]['price'];
        $cart['item'][$id]['quantity'] = $request->get('quantity');
        session()->put('cart', $cart);

        return redirect('cart')->with(session()->get('cart'));
    }
}
