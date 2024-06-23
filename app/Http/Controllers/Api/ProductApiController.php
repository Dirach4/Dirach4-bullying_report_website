<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProductApiController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('id', 'desc')->get();
        $total = Product::count();
        return response()->json(['products' => $products, 'total' => $total]);
    }

    public function create()
    {
        return response()->json(['message' => 'Use the /save endpoint to create a new product.']);
    }

    public function save(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'category' => 'required',
            'price' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $product = new Product;
        $product->title = $request->title;
        $product->category = $request->category;
        $product->price = $request->price;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $file_name =$file->getClientOriginalName();
            $file->storeAs('public/images', $file_name);
            $product->image = $file_name;
        }

        if ($product->save()) {
            return response()->json(['success' => true, 'message' => 'Product added successfully', 'product' => $product]);
        } else {
            return response()->json(['success' => false, 'message' => 'Some problem occurred']);
        }
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return response()->json(['product' => $product]);
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'title' => 'required',
            'category' => 'required',
            'price' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $product->title = $request->title;
        $product->category = $request->category;
        $product->price = $request->price;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $file_name =$file->getClientOriginalName();
            $file->storeAs('public/images', $file_name);

            if (!is_null($product->image)) {
                Storage::delete('public/images/' . $product->image);
            }

            $product->image = $file_name;
        }

        if ($product->save()) {
            return response()->json(['success' => true, 'message' => 'Product updated successfully', 'product' => $product]);
        } else {
            return response()->json(['success' => false, 'message' => 'Some problem occurred']);
        }
    }

    public function delete($id)
    {
        $product = Product::findOrFail($id);

        if (!is_null($product->image)) {
            Storage::delete('public/images/' . $product->image);
        }

        if ($product->delete()) {
            return response()->json(['success' => true, 'message' => 'Product deleted successfully']);
        } else {
            return response()->json(['success' => false, 'message' => 'Product not deleted successfully']);
        }
    }
}
