<?php


use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

//if (!function_exists('______')) {
//    function ______()
//    {
//
//    }
//}

if (!function_exists('isAdmin')) {
    function isAdmin(): bool
    {
        return Auth::user()->is_admin == 1;
    }
}


if (!function_exists('alert')) {
    /**
     * Puts alert message with bootstrap color
     *
     * @param $color
     * @param $text
     * @return void
     */
    function alert(string $color,string $text): void
    {
        Session::forget('alert');
        Session::push('alert',['color' => $color,'text' => $text]);
    }
}

if (!function_exists('reset_db')) {
    /**
     * @return void
     */
    function reset_db(): void
    {
        Artisan::call('db:wipe');
        Artisan::call('migrate');
        Artisan::call('db:seed');
    }
}

if (!function_exists('ajax')) {
    function ajax(string $buttonId, string $route, array $inputs): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        /**
         * Creates Ajax
         *
         * @param $buttonId
         * @param $route
         * @param $inputs
         *
         */
        return view('ajax')->with([
            'buttonId' => $buttonId,
            'route' => $route,
            'inputs' => $inputs
        ]);
    }
}

