<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function home(Request $request)
    {
        $categories = Category::has('products')->get();
        $products = Product::with('category','file')
            ->whereHas('category')
            ->where('stock', '>', 0)
            ->get();
        if (!$request->ajax()) return view('index', compact('products', 'categories'));
        return response()->json(['products' => $products], 200);
    }

    public function index(Request $request)
    {
        $products = Product::get();
        if (!$request->ajax()) return view();
        return response()->json(['products' => $products], 200);
    }


    public function store(ProductRequest $request)
    {
        $product = new Product($request->all());
        $product->save();
        if (!$request->ajax()) return back()->with("success", 'Product created');
        return response()->json(['status' => 'Product created'], 201);
    }


    public function show(Request $request, Product $product)
    {
        if (!$request->ajax()) return view();
        return response()->json(['product' => $product], 200);
    }

    public function info(Product $product)
    {
        return view('products.info', compact('product'));
    }



    public function edit($id)
    {
        //
    }


    public function update(ProductRequest $request, Product $product)
    {
        $product->update($request->all());
        if (!$request->ajax()) return back()->with("success", 'Product updated');
        return response()->json([], 204);
    }


    public function destroy(Request $request, Product $product)
    {
        $product->delete();
        if (!$request->ajax()) return back()->with("success", 'Product deleted');
        return response()->json([], 204);
    }
}
