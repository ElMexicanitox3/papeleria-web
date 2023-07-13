<?php

namespace App\Http\Controllers;

use App\Models\CategoryModel;
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
}
