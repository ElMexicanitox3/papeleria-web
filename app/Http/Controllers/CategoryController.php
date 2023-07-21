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

    public function update(CategoryRequest $request, $uuid){
        // Si la categoria es diferente a la que esta en la base de datos entonces buscamos si existe para evitar duplicados
        $category = CategoryModel::where('uuid', '!=', $uuid)->where('name', $request->name)->first();
        if($category){
            return redirect()->route('category.edit', $uuid)->with('error', 'La categoría ya existe');
        }
        $category = CategoryModel::where('uuid', $uuid)->first();
        $category->name = $request->name;
        $category->save();
        return redirect()->route('category.home')->with('success', 'Producto actualizado.');
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
