<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterUser;

use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        return view('home.home');
    }

    public function login()
    {
        return view('home.login');
    }

    public function register()
    {
        return view('home.register');
    }

    public function newUser(RegisterUser $request)
    {
        User::create($request->all());
        return redirect()->route('home.login')->with('success', 'User created successfully.');
    
    }
}
