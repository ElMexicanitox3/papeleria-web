<?php

namespace App\Http\Controllers;

use App\Http\Requests\Products;
use App\Models\BrandsModel;
use App\Models\CategoryModel;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\SubcategoryModel;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::with('subcategory.category', 'brand')->orderBy('active', 'desc')->orderBy('id', 'desc')->paginate(10);
        return view('products.home', compact('products'));
    }

    public function create()
    {
        $categories = CategoryModel::where('active', 1)->get();
        $subcategories = SubcategoryModel::where('active', 1)->get();
        $brands = BrandsModel::where('active', 1)->get();
        return view('products.create', compact('categories', 'subcategories', 'brands'));
    }

    public function store(Products $request)
    {   
        $subcategory = SubcategoryModel::where('uuid', $request->subcategory)->first();
        $brand = BrandsModel::where('uuid', $request->brand)->first();
        $request->request->add(['subcategory_id' => $subcategory->id, 'brand_id' => $brand->id]);
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
        // Validate if the barcode is different, if it is, validate that it is unique
        if ($product->barcode != $request->barcode) {
            $request->validate([
                'barcode' => 'required|string|max:255|unique:products,barcode',
            ]);
        }
        $product->update($request->all());
        return redirect()->back()->with('success', 'Producto actualizado.');
    }

    public function desactivate(Request $request)
    {
        if (!$request->uuid) {
            return redirect()->back()->with('error', 'No se ha encontrado el producto.');
        }
        $product = Product::where('uuid', $request->uuid)->first();
        $product->active = 0;
        $product->save();
        return redirect()->back()->with('success', 'Producto desactivado.');
    }

    public function activate(Request $request)
    {
        if (!$request->uuid) {
            return redirect()->back()->with('error', 'No se ha encontrado el producto.');
        }
        $product = Product::where('uuid', $request->uuid)->first();
        $product->active = 1;
        $product->save();
        return redirect()->back()->with('success', 'Producto activado.');
    }


    public function getSubcategories($categoryId)
    {
        return $categoryId;
        // Obtener las subcategorías correspondientes a la categoría seleccionada
        $subcategories = SubcategoryModel::where('uuid', $categoryId)->get();
        // Devolver las subcategorías en formato JSON
        return response()->json(['subcategories' => $subcategories]);
    }
}
