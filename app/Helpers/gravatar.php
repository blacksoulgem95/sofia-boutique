<?php

use Illuminate\Support\Facades\Auth;

if (!function_exists('gravatar')) {
    function gravatar($size = 250) {
        $md5 = "";
        if (Auth::hasUser()) {
            $md5 = md5(trim(strtolower(Auth::user()->email)));
        }
        return "https://www.gravatar.com/avatar/".$md5."?size=".$size."&d=".config('app.gravatar.style');
    }
}
