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

    // Desactivate brand
    public function desactivate($uuid){
        $brand = BrandsModel::where('uuid', $uuid)->firstOrFail();
        $brand->active = false;
        $brand->save();
        return redirect()->back()->with('success', 'Marca activada correctamente');
    }

    // Activate brand
    public function activate($uuid){
        $brand = BrandsModel::where('uuid', $uuid)->firstOrFail();
        $brand->active = true;
        $brand->save();
        return redirect()->back()->with('success', 'Marca activada correctamente');
    }

}
