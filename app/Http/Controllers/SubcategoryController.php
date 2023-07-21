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

    public function update(Request $request, $uuid){
        // Find the subcategory by its UUID or create a new instance if it doesn't exist in the database
        $subcategory = SubcategoryModel::firstOrNew(['uuid' => $uuid]);
    
        // Find the category by its UUID and make sure it is active
        $category = CategoryModel::where('uuid', $request->category)->where('active', 1)->first();
    
        // Check if the name of the subcategory is different from the one being updated
        // and if another subcategory with the same name already exists in the database
        if($subcategory->name != $request->name && SubcategoryModel::where('name', $request->name)->exists()){
            // If the condition is met, redirect to the subcategory edit page with an error message
            return redirect()->route('subcategory.edit', $uuid)->with('error', 'La subcategoría ya existe');
        }
     
        // Update the category ID and subcategory name in the current record
        $subcategory->category_id = $category->id;
        $subcategory->name = $request->name;
    
        // Save the changes to the database
        $subcategory->save();
    
        // Redirect to the subcategory homepage with a success message
        return redirect()->route('subcategory.home')->with('success', 'Subcategoría actualizada correctamente');
    }
    

}
