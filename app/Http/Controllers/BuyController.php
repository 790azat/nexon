<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BuyController extends Controller
{
    public function buy() {
        if (!Auth::check()){
            return redirect('/login');
        }
        return view('buy');
    }
}
