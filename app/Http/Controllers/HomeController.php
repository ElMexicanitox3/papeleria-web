<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\LoginUser;
use App\Http\Requests\RegisterUser;
use App\Models\BranchModel;
use App\Models\StoreModel;
use App\Models\User;
use App\Models\UserStoreModel;
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
        // return view('home.register');
        return redirect()->route('home.login')->with('success', 's');

    }

    public function loginUser(LoginUser $request){

        // return $request->all();

        $user = User::where('email', $request->email)
        ->where('active', 1)
        ->where('deleted', 0)
        ->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            session()->flash('error', 'Credenciales inválidas. Intente de nuevo.');
            return redirect()->back();
        }

        Auth::login($user);

        // Mandamos a la vista de dashboard
        session()->flash('success', 'Bienvenido ' . $user->name . ' ' . $user->lastname);
        
        return redirect()->route('dashboard');

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
        $user = User::create($user);

        // save user asignation store and branch
        $userStore = new UserStoreModel();
        $userStore->user_id = $user->id;
        $userStore->store_id = $store->id;
        $userStore->is_owner = 1;
        $userStore->save();

        return redirect()->route('home.login')->with('success', 'Usuario creado correctamente.');
    
    }

}
