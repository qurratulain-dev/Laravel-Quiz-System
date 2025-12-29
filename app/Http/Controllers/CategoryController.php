<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
     // categories page
    public function index()
    {
        $categories = Category::latest()->get();
        return view('categories', compact('categories'));
    }
    // add category
    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required|string|unique:categories,name|max:255',
        ], [
            'category.unique' => 'This category already exists',
        ]);

        Category::create([
            'name'    => $request->category,
            'creator' => Auth::user()->name, 
        ]);

        return redirect()
            ->route('categories')
            ->with('success', 'Category added successfully');
    }
    //delete category
    public function destroy($id){
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->route('categories')->with('sucsess','Category deleted successfully');
    }
}
