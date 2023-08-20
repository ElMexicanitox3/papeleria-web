<?php

namespace App\Http\Controllers;

use App\Http\Requests\products\brands\NewBrand;
use Illuminate\Http\Request;
use App\Models\BrandsModel;


class BrandsController extends Controller
{
    public function index(){
        $brands = BrandsModel::orderBy('active', 'desc')->orderBy('id', 'desc')->paginate(10);
        return view('products.brands.home', compact('brands'));
    }

    public function create(){
        return view('products.brands.create');
    }

    public function store(NewBrand $request){
        $brand = new BrandsModel();
        $brand->name = $request->name;
        $brand->save();
        return redirect()->route('brands.index')->with('success', 'Marca creada correctamente');
    }

}
