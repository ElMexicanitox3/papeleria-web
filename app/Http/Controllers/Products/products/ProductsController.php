<?php

namespace App\Http\Controllers\Products\Products;

use App\Http\Controllers\Controller;
use App\Http\Requests\Products\products\FormProducts;
use App\Models\Products\brands\BrandsModel;
use App\Models\Products\category\CategoryModel;
use App\Models\Products\products\ProductModel;
use App\Models\Products\subcategory\SubCategoryModel;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        $products = ProductModel::with('category', 'subcategory', 'brand')
        ->orderBy('active', 'desc')
        ->orderBy('id', 'desc')
        ->paginate(10);
        return view('products.products.home', compact('products'));
    }

    public function create()
    {
        $categories = CategoryModel::where('active', 1)->where('deleted', 0)->get();
        $brands = BrandsModel::where('active', 1)->where('deleted', 0)->get();
        return view('products.products.form', compact('categories', 'brands'));
    }

    public function edit(Request $uuid)
    {
        $product = ProductModel::where('uuid', $uuid->uuid)->first();
        $categories = CategoryModel::where('active', 1)->where('deleted', 0)->get();
        $categorySelected = SubCategoryModel::where('id', $product->subcategory_id)->first();
        $brands = BrandsModel::where('active', 1)->where('deleted', 0)->get();
        return view('products.products.form', compact('product','categories', 'brands'));
    }
    
    public function update(FormProducts $request){
        $subcategory = SubCategoryModel::where('uuid', $request->subcategory)->first();
        $brand = BrandsModel::where('uuid', $request->brand)->first();
        $product = ProductModel::where('uuid', $request->uuid)->first();
        $product->subcategory_id = $subcategory->id;
        $product->brand_id = $brand->id;
        $product->barcode = $request->barcode;
        $product->model = $request->model;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->save();
        return redirect()->route('products.index')->with('success', 'Producto actualizado correctamente');
    }

    public function store(FormProducts $request)
    {
        $subcategory = SubCategoryModel::where('uuid', $request->subcategory)->first();
        $brand = BrandsModel::where('uuid', $request->brand)->first();
        // save product
        $product = new ProductModel();
        $product->subcategory_id = $subcategory->id;
        $product->brand_id = $brand->id;
        $product->barcode = $request->barcode;
        $product->model = $request->model;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->save();
        return redirect()->route('products.index')->with('success', 'Producto creado correctamente');    

    }

    public function desactivate($uuid)
    {
        $product = ProductModel::where('uuid', $uuid)->first();
        $product->active = 0;
        $product->save();
        return redirect()->route('products.index')->with('success', 'Producto desactivado correctamente');
    }

    public function activate($uuid)
    {
        $product = ProductModel::where('uuid', $uuid)->first();
        $product->active = 1;
        $product->save();
        return redirect()->route('products.index')->with('success', 'Producto activado correctamente');
    }

}
