<?php

namespace App\Http\Controllers;

use App\Http\Requests\products\category\FormCategory;
use App\Models\CategoryModel;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categories = CategoryModel::orderBy('active', 'desc')->orderBy('id', 'desc')->paginate(10);
        return view('products.category.home', compact('categories'));
    }

    public function create(){
        return view('products.category.form');
    }

    public function store(FormCategory $request){
        $category = new CategoryModel();
        $category->name = $request->name;
        $category->save();
        return redirect()->route('category.index')->with('success', 'Categoria creada correctamente');
    }

    // edit category
    public function edit($uuid){
        $category = CategoryModel::where('uuid', $uuid)->firstOrFail();
        return view('products.category.form', compact('category'));
    }

    // update category
    public function update(FormCategory $request, $uuid){
        $category = CategoryModel::where('uuid', $uuid)->firstOrFail();
        $category->name = $request->name;
        $category->save();
        return redirect()->route('category.index')->with('success', 'Categoria actualizada correctamente');
    }


    // activate category
    public function activate($uuid){
        $category = CategoryModel::where('uuid', $uuid)->firstOrFail();
        $category->active = true;
        $category->save();
        return redirect()->back()->with('success', 'Categoria activada correctamente');
    }

    // desactivate category
    public function desactivate($uuid){
        $category = CategoryModel::where('uuid', $uuid)->firstOrFail();
        $category->active = false;
        $category->save();
        return redirect()->back()->with('success', 'Categoria desactivada correctamente');
    }

}
