<?php

namespace App\Http\Controllers;

use App\Http\Requests\BrandsRequest;
use App\Models\BrandsModel;
use Illuminate\Http\Request;

class BrandsController extends Controller
{
    public function index(){
        $brands = BrandsModel::orderBy('active', 'desc')->orderBy('id', 'desc')->paginate(10);
        return view('brands.home', compact('brands'));
    }

    public function create(){
        return view('brands.create');
    }

    public function edit($uuid){
        $brand = BrandsModel::where('uuid', $uuid)->first();
        return view('brands.edit', compact('brand'));
    }

    public function store(BrandsRequest $request){
        $brand = BrandsModel::create($request->all());
        return redirect()->route('brands.home');
    }

    public function update(BrandsRequest $request, $uuid){
        $brand = BrandsModel::where('uuid', $uuid)->first();
        $brand->name = $request->name;
        $brand->save();
        return redirect()->route('brands.home')->with('success', 'Marca actualizada.');
    }

    public function desactivate(Request $request)
    {
        if (!$request->uuid) {
            return redirect()->back()->with('error', 'No se ha encontrado la marca.');
        }
        $brand = BrandsModel::where('uuid', $request->uuid)->first();
        $brand->active = 0;
        $brand->save();
        return redirect()->back()->with('success', 'Marca desactivada.');
    }

    public function activate(Request $request)
    {
        if (!$request->uuid) {
            return redirect()->back()->with('error', 'No se ha encontrado la marca.');
        }
        $brand = BrandsModel::where('uuid', $request->uuid)->first();
        $brand->active = 1;
        $brand->save();
        return redirect()->back()->with('success', 'Marca activada.');
    }
}
