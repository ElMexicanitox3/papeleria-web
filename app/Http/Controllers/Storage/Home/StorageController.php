<?php

namespace App\Http\Controllers\Storage\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StorageController extends Controller
{
    public function index()
    {
        return view('storage.home.index');
    }
}
