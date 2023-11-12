<?php

namespace App\Http\Controllers\enterprise\information;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EnterpriseInfoController extends Controller
{
    public function index()
    {
        return view('enterprise.information.home');
    }
}
