<?php


use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Session;

//if (!function_exists('______')) {
//    function ______()
//    {
//
//    }
//}


if (!function_exists('alert')) {
    function alert($color,$text): void
    {
        Session::forget('alert');
        Session::push('alert',['color' => $color,'text' => $text]);
    }
}

if (!function_exists('reset_db')) {
    function reset_db(): void
    {
        Artisan::call('db:wipe');
        Artisan::call('migrate');
        Artisan::call('db:seed');
    }
}

