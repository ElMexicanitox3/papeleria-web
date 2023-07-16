<?php

namespace App\Http\Controllers;

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
        // select all categories active
        $categories = CategoryModel::where('active', 1)->get();
        return view('subcategory.create', compact('categories'));
    }
}
