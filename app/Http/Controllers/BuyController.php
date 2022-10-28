<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BuyController extends Controller
{
    public function buy(Request $request) {
        if (!Auth::check()){
            return redirect('/login');
        }
        $item = Item::find($request->id);
        return view('buy',['item' => $item]);
    }
}
