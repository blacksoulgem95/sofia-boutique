<?php

use Illuminate\Support\Facades\Auth;

if (!function_exists('gravatar')) {
    function gravatar($size = 250)
    {
        $md5 = "";
        $user = Auth::user();
        if (isset($user)) {
            $md5 = md5(trim(strtolower($user->email)));
        }
        return "https://www.gravatar.com/avatar/".$md5."?size=".$size."&d=".config('app.gravatar.style');
    }
}
