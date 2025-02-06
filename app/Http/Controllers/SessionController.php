<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store()
    {
        //validate
        $attribute = request()->validate([
            'password' => ['required'],
            'email' => ['required', 'email'],
            ]);

        // attempt to login the user
        if(!Auth::attempt( $attribute))
        {
            throw ValidationException::withMessages([
                'email' => "Sorry those credentials are not match",
            ]);
        };
        // regenerate the session token 
        request()->session()->regenerate();

        // redirect 
        return redirect('/');
    }

    public function destroy()
    {
        Auth::logout();
        return redirect('/');
    }

}
