<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubcategoryRequest;
use Illuminate\Http\Request;
use App\Models\SubcategoryModel;
use App\Models\CategoryModel;


class SubcategoryController extends Controller
{
    public function index(){
        $subcategory = SubcategoryModel::with('category')
        ->orderBy('active', 'desc')
        ->orderBy('id', 'desc')
        ->paginate(10);
        // return $subcategory;
        return view('subcategory.home', compact('subcategory'));
    }

    public function create(){
        $categories = CategoryModel::where('active', 1)->get();
        return view('subcategory.create', compact('categories'));
    }

    public function store(SubcategoryRequest $request){
        $category = CategoryModel::where('uuid', $request->category)->where('active', 1)->first();
        if(!$category){
            return redirect()->route('subcategory.create')->with('error', 'La categoría no existe');
        }
        $subcategory = SubcategoryModel::create([
            'category_id' => $category->id,
            'name' => $request->name,
        ]);
        return redirect()->route('subcategory.home')->with('success', 'Subcategoría creada correctamente');
    }

    public function edit($uuid){
        $subcategory = SubcategoryModel::where('uuid', $uuid)->first();
        if(!$subcategory){
            return redirect()->route('subcategory.home')->with('error', 'La subcategoría no existe');
        }
        $categories = CategoryModel::where('active', 1)->get();
        return view('subcategory.edit', compact('subcategory', 'categories'));
    }

    public function update(SubcategoryRequest $request, $uuid){
        $subcategory = SubcategoryModel::where('uuid', $uuid)->first();
        if(!$subcategory){
            return redirect()->route('subcategory.home')->with('error', 'La subcategoría no existe');
        }
        $category = CategoryModel::where('uuid', $request->category)->where('active', 1)->first();
        if(!$category){
            return redirect()->route('subcategory.create')->with('error', 'La categoría no existe');
        }
        $subcategory->category_id = $category->id;
        $subcategory->name = $request->name;
        $subcategory->save();
        return redirect()->route('subcategory.home')->with('success', 'Subcategoría actualizada correctamente');
    }

}
