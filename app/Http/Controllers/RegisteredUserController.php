<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\File;
use Illuminate\Validation\Rules\Password;

class RegisteredUserController extends Controller
{

    public function create()
    {
        return view('auth.register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $UserAttributes = $request->validate([
            'name' => ['required'],
            'email'=> ['required','email', 'unique:users,email' ],
            'password'=> ['required' , 'confirmed' , Password::min(3)],          
        ]);

        $EmployerAttributes = $request->validate([
            'employer' => ['required'],
            'logo'=> ['required' , File::types(['png','jpg','webp'])],    
        ]);

        $user = User::create($UserAttributes);

        $logopath = $request->logo->store('logos');

        $user->employer()->create(
            [
                'name' => $EmployerAttributes['employer'],
                'logo' => $logopath,
            ]
        );
        Auth::login($user);

        return redirect('/');
    }

}
