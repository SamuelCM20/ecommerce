<?php

namespace App\Http\Controllers;

use App\Http\Requests\product\ProductRequest;
use App\Http\Requests\product\ProductUpdateRequest;
use App\Http\Traits\UploadFile;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{

    use UploadFile;

    public function home(Request $request)
    {
        $categories = Category::has('products')->get();
        $products = Product::with('category', 'file')
            ->whereHas('category')
            ->where('stock', '>', 0)
            ->get();
        if (!$request->ajax()) return view('index', compact('products', 'categories'));
        return response()->json(['products' => $products], 200);
    }

    public function index(Request $request)
    {
        $categories = Category::get();
        $products = Product::with('category', 'file')->get();
        if (!$request->ajax()) return view('products.index', compact('products', 'categories'));
        return response()->json(['products' => $products], 200);
    }


    public function store(ProductRequest $request)
    {
        try {
            DB::beginTransaction();
            $product = new Product($request->all());
            $product->save();
            $this->uploadFile($product, $request);
            DB::commit();
            if (!$request->ajax()) return back()->with("success", 'Product created');
            return response()->json(['status' => 'Product created'], 201);
        } catch (\Throwable $th) {
            DB::rollback();
        }
    }

    public function search(Request $request)
    {
        $query = $request->input('buscador');
        $result = Product::with('file')->where('name','like','%'. $query . '%')->get();
        $count = count($result);
       return view('products.search', compact('result','query','count'));
    }


    public function cart()
    {
       return view('cart.index');
    }

    public function info(Product $product)
    {
        $product->load('file');
        $session = auth()->check();
        return view('products.info', compact('product','session'));
    }

    public function update(ProductUpdateRequest $request, Product $product)
    {
        try {
            DB::beginTransaction();
            $product->update($request->all());
            if ($request->hasFile('file')) {
                $this->uploadFile($product, $request);
            }
            DB::commit();
            if (!$request->ajax()) return back()->with("success", 'Product updated');
            return response()->json([], 204);
        } catch (\Throwable $th) {
            DB::rollback();
        }
    }


    public function destroy(Request $request, Product $product)
    {
        $product->delete();
        if (!$request->ajax()) return back()->with("success", 'Product deleted');
        return response()->json([], 204);
    }
}
