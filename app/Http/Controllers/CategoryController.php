<?php

namespace App\Http\Controllers;

use App\Models\CategoryModel;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    public function index(){
        $categories = CategoryModel::orderBy('active', 'desc')->orderBy('id', 'desc')->paginate(10);
        return view('category.home', compact('categories'));
    }

    public function create(){
        return view('category.create');
    }

    public function store(CategoryRequest $request){
        $category = CategoryModel::create($request->all()); 
        return redirect()->route('category.home');
    }

    public function edit($uuid){
        $category = CategoryModel::where('uuid', $uuid)->first();
        return view('category.edit', compact('category'));
    }

    public function update(Request $request, $uuid){
        $category = CategoryModel::where('uuid', $uuid)->first();
        // Validate if the name is different, if it is, validate that it is unique
        if ($category->name != $request->name) {
            $request->validate([
                'name' => 'required|string|max:255|unique:category,name',
            ]);
        }
        $category->update($request->all());
        return redirect()->back()->with('success', 'Producto actualizado.');
    }

    public function desactivate(Request $request)
    {
        if (!$request->uuid) {
            return redirect()->back()->with('error', 'No se ha encontrado la categoria.');
        }
        $category = CategoryModel::where('uuid', $request->uuid)->first();
        $category->active = 0;
        $category->save();
        return redirect()->back()->with('success', 'Producto desactivado.');
    }

    public function activate(Request $request)
    {
        if (!$request->uuid) {
            return redirect()->back()->with('error', 'No se ha encontrado la categoria.');
        }
        $category = CategoryModel::where('uuid', $request->uuid)->first();
        $category->active = 1;
        $category->save();
        return redirect()->back()->with('success', 'Producto activado.');
    }
}
