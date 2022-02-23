<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    //
    /**
     * Display the email verification prompt.
     *
     * @param \Illuminate\Http\Request $request
     * @return mixed
     */
    public function __invoke(Request $request)
    {
        $userData = User::with(['addresses', 'billingAddress'])->find(Auth::user()->id);

        return view('user.profile', [
            'user' => $userData
        ]);
    }

    public function updateLegal(Request $request)
    {
        $request->validate([
            'legal_name' => ['required'],
            'surname' => ['required'],
        ]);
        $in = (object)$request->all();

        $id = Auth::user()->id;
        $user = User::find($id);

        $user->legal_name = $in->legal_name;
        $user->surname = $in->surname;
        $user->company_name = $in->company_name;
        $user->fiscal_code = $in->fiscal_code;
        $user->vat_number = $in->vat_number;
        $user->sdi_number = $in->sdi_number;
        $user->certified_email = $in->certified_email;

        $user->save();

        return redirect(route('profile'));
    }

    public function addAddress(Request $request)
    {
        $request->validate([
            'name_line' => ['required'],
            'line_1' => ['required'],
            'zip' => ['required'],
            'city' => ['required'],
            'state' => ['required'],
            'country' => ['required'],
            'phone_number' => ['required'],
        ]);

        $in = $request->only(['name_line', 'co_line', 'line_1', 'line_2', 'zip', 'city', 'state', 'country', 'phone_number']);
        $in['user_id'] = Auth::user()->id;

        Address::create($in);

        return redirect(route('profile'));
    }

    public function deleteAddress(Request $request) {
        $address = Address::find($request->address_id);

        // fixme check if billing first

        if ($address->user_id === "".Auth::user()->id) {
            $address->delete();
            return redirect(route('profile'));
        }

        return abort(403, 'Unauthorized action.');
    }

    public function setAddressAsBilling(Request $request) {
        $address = Address::find($request->address_id);
        $user = User::find(Auth::user()->id);

        if ($address->user_id === "".$user->id) {
            $user->billing_address_id = $address->id;
            $user->save();
            return redirect(route('profile'));
        }
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email'],
        ]);

        $in = (object)$request->all();

        $id = Auth::user()->id;

        $user = User::find($id);

        $user->name = $in->name;

        $view = route('profile');

        if ($in->email != $user->email) {
            $user->email = $in->email;
            $user->email_verified_at = null;
            $view = route('verification.notice');
        }

        $user->save();

        return redirect($view);
    }
}
