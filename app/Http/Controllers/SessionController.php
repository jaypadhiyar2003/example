<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }
    public function store()
    {
        //validate form
        $validatedAttributes =request()->validate([
            'email'=> ['required','email'],
            'password' => ['required',Password::min(6),]
        ]);
        //attempt to login user 
        if(! Auth::attempt($validatedAttributes)) //attampt return boolean and threre is remember me in attampt if wanted .
        {
            throw ValidationException::withMessages([
                'email' => 'Sorry those credentials do not match.' 
            ]);
        }
        //success then regenerate session token 
        request()->session()->regenerate(); // it is for security that recycle the session. protect from session highjacking
        //redirect
        return redirect('/jobs');
        //dd(request()->all());
    }

    public function destroy()
    {
        Auth::logout(); //no need to provide user as it generaly assume current user.

        return redirect('/');
    }


}
