<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class RegisterController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }
    public function store()
    {
        //validate // password rules using Password:: after 1st required argument . 22->2.58
        $validatedAttributes = request()->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required','email'],
            'password' => ['required',Password::min(6),'confirmed'], //Password_confirmation name should have _confirmation at the and to use confirmed here

        ]);
        //create user
        $user = User::create($validatedAttributes);
        //Or
        //User::create([
          //  'first_name'
        //]);
        //login
        Auth::login($user);
        //redirect
        return redirect('/jobs');
        //dd(request()->all());
    }
}
