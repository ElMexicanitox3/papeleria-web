<?php

namespace App\Http\Controllers;

use App\Http\Requests\Products;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::paginate(10);
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
}
