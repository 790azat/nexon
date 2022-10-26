<?php

use Illuminate\Support\Facades\Session;

if (!function_exists('alert')) {
    function alert($color,$text) {
        Session::forget('alert');
        Session::push('alert',['color' => $color,'text' => $text]);
    }
}
