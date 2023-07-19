<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubcategoryRequest;
use Illuminate\Http\Request;
use App\Models\SubcategoryModel;
use App\Models\CategoryModel;


class SubcategoryController extends Controller
{
    public function index(){
        $subcategory = SubcategoryModel::orderBy('active', 'desc')->orderBy('id', 'desc')->paginate(10);
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
            'category' => $category->id,
            'name' => $request->name,
        ]);
        return redirect()->route('subcategory.home')->with('success', 'Subcategoría creada correctamente');
    }
}
