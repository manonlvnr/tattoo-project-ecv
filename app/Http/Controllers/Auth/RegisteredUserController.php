<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255'],
            'birthdate' => ['nullable','string', 'max:255'],
            'phone' => ['string', 'max:255'],
            'tattooist_name' => ['string', 'max:255'],
            'ARS_document' => ['string', 'max:255'],
            'tattoo_parlor' => ['string', 'max:255'],
            'street' => ['string', 'max:255'],
            'street_number' => ['string', 'max:255'],
            'locality' => ['string', 'max:255'],
            'country' => ['string', 'max:255'],
            'role' => ['string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'firstname' =>  $request->firstname,
            'lastname' =>  $request->lastname,
            'username' =>  $request->username,
            'birthdate' =>  $request->birthdate,
            'phone' => $request->phone,
            'tattooist_name' => $request->tattooist_name,
            'ARS_document' =>  $request->ARS_document,
            'tattoo_parlor' =>  $request->tattoo_parlor,
            'street' => $request->street,
            'street_number' =>  $request->street_number,
            'locality' => $request->locality,
            'country' => $request->country,
            'role' => $request->role,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
