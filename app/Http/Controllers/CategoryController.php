<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    
    public function index(Request $request)
    {
        $categories = Category::get();
        if(!$request->ajax()) return view('categories.index',compact('categories'));
        return response()->json(['categories' => $categories],200);
    }
    public function allProducts(Request $request,Category $category)
    {
        $products = Product::where('category_id',$category->id)->get();
        return view('categories.all',compact('category','products'));
    }
   
    public function store(CategoryRequest $request)
    {
        $category = new Category($request->all());
        $category ->save();

        if(!$request->ajax()) return back()->with("success",'Category created');
        return response()->json(['status' => 'Category created'],201);
    }

  
    public function show(Category $category)
    {
        return response()->json(['category' => $category],200);
    }

   
    public function update(CategoryRequest $request, Category $category)
    {
        $category->update($request->all());
        if(!$request->ajax()) return back()->with("success",'Category updated');
        return response()->json([],204);
    }

    
    public function destroy(Request $request, Category $category)
    {
        $category->delete();
        if(!$request->ajax()) return back()->with("success",'Category deleted');
        return response()->json([],204);
    }
}
