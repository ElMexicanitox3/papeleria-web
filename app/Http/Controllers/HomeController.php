<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterUser;
use App\Http\Requests\LoginUser;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

use App\Post;
use App\Http\Requests\PostRequest;
use Illuminate\Database\Eloquent\Model;


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

    public function loginUser(LoginUser $request){

        
        // Login with email and password
        $credentials = $request->only('email', 'password');
        $user = User::where('email', $request->email)->where('active', 1)->where('deleted', 0)->first();
        if (!Auth::attempt($credentials)) {
            toastr()->error('Usuario o contraseña incorrectos');
            return redirect()->back();
        }

        dd($user);

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
