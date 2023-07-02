<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterUser;
use Illuminate\Http\Request;

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
        return $request->all();
        // $user = new User();
        // $user->name = $request->name;
        // $user->email= $request->email;
        // $user->password = Hash::make($request->password);
        // $user->save();

        return redirect()->route('home.login')->with('success', 'User created successfully.');
    
    }
}
