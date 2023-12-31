<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\User;

class UserController extends Controller
{
    public function create(){
        return view('users.register');
    }


    public function store(Request $request){
            $formFields = $request->validate([

                'name' => ['required','min:3'],
                'email' => ['required','email', Rule::unique('users','email')],
                'password' => ['required','confirmed','min:6'],
            ]);

            //Hash Password

            $formFields['password'] = bcrypt($formFields['password']);


            //CREATE USER
            $user = User::create($formFields);

            //AUTO LOGIN

            auth()->login($user);


            //Redirect

            return redirect('/')->with('message','User Created and Logged in');
    }

    public function logout(Request $request){
        //logout
        auth() ->logout();

        //invalidate session

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'User logged out successfully');


    }

    //Show Login Form

    public function login(){
        return view('users.login');
    }


    //Log in user

    public function authenticate(Request $request){


        $formFields = $request->validate([

            'email' => ['required','email'],
            'password' => 'required'
        ]);

        if(auth()->attempt($formFields)){

            $request->session()->regenerate();
            return redirect('/')->with('message','User logged in successfully.');

        }

        return back()->withErrors(['email'=>'Invalid Credentials'])->onlyInput('email');











    }




}
