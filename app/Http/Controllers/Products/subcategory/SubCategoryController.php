<?php

namespace App\Http\Controllers\Products\subcategory;

use App\Models\Products\category\CategoryModel;
use App\Http\Controllers\Controller;
use App\Http\Requests\Products\subcategory\FormSubcategory;
use App\Models\Products\subcategory\SubCategoryModel;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function index()
    {
        $subcategories = SubcategoryModel::with('category')
        ->orderBy('active', 'desc')
        ->orderBy('id', 'desc')
        ->paginate(10);
        return view('products.subcategory.home', compact('subcategories'));
    }

    public function create()
    {
        $categories = CategoryModel::where('active', 1)->where('deleted', 0)->get();
        return view('products.subcategory.form', compact('categories'));
    }

    public function store(FormSubcategory $request)
    {

        $category = CategoryModel::where('uuid', $request->category)->first();
        if(!$category){
            return redirect()->route('subcategory.create')->with('error', 'La categoría no existe');
        }

        $subcategory = SubCategoryModel::where('category_id', $category->id)->where('name', $request->subcategory)->first();
        if($subcategory){
            return back()->withInput()->with('error', 'La convinación de categoría y subcategoría ya existe');
        }
        
        $subcategory = SubCategoryModel::create([
            'category_id' => $category->id,
            'name' => $request->subcategory,
        ]);
        return redirect()->route('subcategory.index')->with('success', 'Subcategoría creada correctamente');    
    }

    public function edit($uuid){
        $subcategory = SubCategoryModel::where('uuid', $uuid)->first();
        $categories = CategoryModel::where('active', 1)->where('deleted', 0)->get();
        return view('products.subcategory.form', compact('subcategory', 'categories'));

    }

    public function update(FormSubcategory $request){
       
        $category = CategoryModel::where('uuid', $request->category)->first();
        $subcategory = SubCategoryModel::where('category_id', $category->id)->where('name', $request->subcategory)->first();
        if($subcategory){
            return back()->withInput()->with('error', 'La convinación de categoría y subcategoría ya existe');
        }

        $subcategory = SubCategoryModel::where('uuid', $request->uuid)->first();

        $subcategory->category_id = $category->id;
        $subcategory->name = $request->subcategory;
        $subcategory->save();
        
        return redirect()->route('subcategory.index')->with('success', 'Subcategoría actualizada correctamente');

    }

    public function desactivate($uuid){
        $subcategory = SubCategoryModel::where('uuid', $uuid)->first();
        $subcategory->active = 0;
        $subcategory->save();
        return redirect()->route('subcategory.index')->with('success', 'Subcategoría desactivada correctamente');
    }

    public function activate($uuid){
        $subcategory = SubCategoryModel::where('uuid', $uuid)->first();
        $subcategory->active = 1;
        $subcategory->save();
        return redirect()->route('subcategory.index')->with('success', 'Subcategoría activada correctamente');
    }

    public function getSubcategory(Request $request){
        // dd($request->all());
        $category = CategoryModel::where('uuid', $request->uuid)->first();
        $subcategories = SubCategoryModel::select('uuid', 'name')->where('category_id', $category->id)->where('active', 1)->where('deleted', 0)->get();
        // $subcategories = SubCategoryModel::where('category_id', $category->id)->get();
        return response()->json($subcategories);
    }
}
