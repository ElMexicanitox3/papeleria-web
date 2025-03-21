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

    public function update(SubcategoryRequest $request, $uuid){
        $subcategory = SubcategoryModel::where('uuid', $uuid)->first();
    
        // Find the category by its UUID and make sure it is active
        $category = CategoryModel::where('uuid', $request->category)->where('active', 1)->first();
    
        // Check if the name of the subcategory has changed and if the new name already exists within the same category
        if ($subcategory->name !== $request->name && SubcategoryModel::where('name', $request->name)->where('category_id', $category->id)->exists()) {
            // If the condition is met, redirect to the subcategory edit page with an error message
            return redirect()->route('subcategory.edit', $uuid)->with('error', 'La subcategoría ya existe en la misma categoría');
        }
    
        // Update the category ID and subcategory name in the current record
        $subcategory->category_id = $category->id;
        $subcategory->name = $request->name;
    
        // Save the changes to the database
        $subcategory->save();
    
        // Redirect to the subcategory homepage with a success message
        return redirect()->route('subcategory.home')->with('success', 'Subcategoría actualizada correctamente');
    }
    
    
    public function edit($uuid){
        $subcategory = SubcategoryModel::where('uuid', $uuid)->first();
        if(!$subcategory){
            return redirect()->route('subcategory.home')->with('error', 'La subcategoría no existe');
        }
        $categories = CategoryModel::where('active', 1)->get();
        return view('subcategory.edit', compact('subcategory', 'categories'));
    }


    public function desactivate(Request $request){
        if(!$request->uuid){
            return redirect()->back()->with('error', 'No se ha encontrado la subcategoría');
        }
        $subcategory = SubcategoryModel::where('uuid', $request->uuid)->first();
        $subcategory->active = 0;
        $subcategory->save();
        return redirect()->back()->with('success', 'Subcategoría desactivada correctamente');
    }

    public function activate(Request $request){
        if(!$request->uuid){
            return redirect()->back()->with('error', 'No se ha encontrado la subcategoría');
        }
        $subcategory = SubcategoryModel::where('uuid', $request->uuid)->first();
        $subcategory->active = 1;
        $subcategory->save();
        return redirect()->back()->with('success', 'Subcategoría activada correctamente');
    }

    public function getSubcategories($uuid)
    {
        // Get the category by its UUID
        $category = CategoryModel::where('uuid', $uuid)->first();
        // return subcategories but only the uuid and name fields
        $subcategories = SubcategoryModel::where('category_id', $category->id)->where('active', 1)->select('uuid', 'name')->get();
        return response()->json(['subcategories' => $subcategories]);
    }


}
