<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterUser;
use App\Models\BranchModel;
use App\Models\StoreModel;
use App\Models\UserModel;
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
        // Preparing the data of the user
        $user = [
            'name' => $request->name,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'password' => $request->password,
        ];
        $store = [
            'tin' => $request->store_tin,
            'name' => $request->store_name,
            'email' => $request->store_email,
            'phone' => $request->store_phone,
            'address' => $request->store_address,
        ];
        $branch = [
            'name' => $request->branch_name,
            'email' => $request->branch_email,
            'phone' => $request->branch_phone,
            'address' => $request->branch_address,
        ];

        // save store
        $store = StoreModel::create($store);

        // save branch
        $branch['store_id'] = $store->id;
        $branch = BranchModel::create($branch);

        // save user
        $user = UserModel::create($user);

        return redirect()->route('home.login')->with('success', 'Usuario creado correctamente.');
    
    }

}
