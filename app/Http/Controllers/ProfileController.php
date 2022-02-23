<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    //
    /**
     * Display the email verification prompt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function __invoke(Request $request)
    {
        $userData = User::with(['addresses', 'billingAddress'])->find(Auth::user()->id);

        return view('user.profile', [
            'user' => $userData
        ]);
    }
}
