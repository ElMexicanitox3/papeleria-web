<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BrandsModel;


class BrandsController extends Controller
{
    public function index(){
        $brands = BrandsModel::orderBy('active', 'desc')->orderBy('id', 'desc')->paginate(1);
        // dd($brands);
        return view('products.brands.home', compact('brands'));
    }

}
