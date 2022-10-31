<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function cartList()
    {
        $cartItems = \Cart::getContent();
        $array = [];
        $cart =[];

        foreach ($cartItems as $cartItem) {
            array_push($array,['id' => $cartItem->id]);
        }
        foreach ($cartItems as $cartItem) {
            array_push($cart,[$cartItem->quantity]);
        }

        $items = Item::find($array)->toArray();

        foreach ($items as $key => $item) {
            $items[$key]['quantity'] = $cart[$key][0];
        }

        $items = json_decode(json_encode($items));

        if ($array == null) {
            alert('warning','Զամբյուղը դատարկ է');
            return back();
        }

        return view('cart', ['items' => $items]);
    }


    public function addToCart(Request $request)
    {
        \Cart::add([
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'attributes' => array(
                'image' => $request->image,
            )
        ]);

        alert('success','Ապրանքը ավելացված է զամբյուղ');

        return redirect()->route('welcome');
    }

    public function updateCart(Request $request)
    {
        \Cart::update(
            $request->id,
            [
                'quantity' => [
                    'relative' => false,
                    'value' => $request->quantity
                ],
            ]
        );

        session()->flash('success', 'Item Cart is Updated Successfully !');

        return redirect()->route('cart.list');
    }

    public function removeCart(Request $request)
    {
        \Cart::remove($request->id);

        alert('success', 'Ապրանքը հեռացված է');

        return redirect()->route('cart.list');
    }

    public function clearAllCart()
    {
        \Cart::clear();

        alert('success','Բոլոր ապրանքները հեռացված են');

        return redirect()->route('cart.list');
    }
}
