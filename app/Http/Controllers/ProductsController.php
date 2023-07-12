<?php

namespace App\Http\Controllers;

use App\Http\Requests\Products;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('active', 'desc')->orderBy('id', 'desc')->paginate(10);
        return view('products.home', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Products $request)
    {
        $product = Product::create($request->all());
        return redirect()->route('products.home');
    }

    public function edit($uuid)
    {
        $product = Product::where('uuid', $uuid)->first();
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, $uuid)
    {
        $product = Product::where('uuid', $uuid)->first();
        $product->update($request->all());
        return redirect()->route('products.home')->with('success', 'Producto actualizado.');
    }

    public function desactivate(Request $request)
    {
        if (!$request->uuid) {
            return redirect()->route('products.home')->with('error', 'No se ha encontrado el producto.');
        }
        $product = Product::where('uuid', $request->uuid)->first();
        $product->active = 0;
        $product->save();
        return redirect()->route('products.home')->with('success', 'Producto desactivado.');
    }

    public function activate(Request $request)
    {
        if (!$request->uuid) {
            return redirect()->route('products.home')->with('error', 'No se ha encontrado el producto.');
        }
        $product = Product::where('uuid', $request->uuid)->first();
        $product->active = 1;
        $product->save();
        return redirect()->route('products.home')->with('success', 'Producto activado.');
    }

}
