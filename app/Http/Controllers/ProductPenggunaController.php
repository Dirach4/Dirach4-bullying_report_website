<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\File; // Add this line at the top to use the File facade

class ProductPenggunaController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('id', 'desc')->get();
        $total = Product::count();
        return view('pengguna.product.home', compact(['products', 'total']));
    }

    public function create()
    {
        return view('pengguna.product.create');
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
            $file_name =$file->getClientOriginalName(); // Add time prefix to ensure unique filenames
    
            $file->move(public_path('images'), $file_name); // Move the uploaded file to the public/images directory
            $product->image = $file_name; // Assign the filename to the 'image' attribute of the Product model
        }

        if ($product->save()) {
            session()->flash('success', 'Product Added Successfully');
            return redirect()->route('pengguna/products');
        } else {
            session()->flash('error', 'Some problem occurred');
            return redirect()->route('pengguna.products/create');
        }
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('pengguna.product.update', compact('product'));
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
        // Add time prefix to ensure unique filenames

        $file->move(public_path('images'), $file_name); // Move the uploaded file to the public/uploads directory
        // Delete old photo if exists
        if (!is_null($product->image)) {
            $oldImage = public_path('images/' . $product->image);
            if (file_exists($oldImage)) {
                unlink($oldImage); // Delete the old image file
            }
        }
        $product->image = $file_name; // Assign the filename to the 'image' attribute of the Product model
    }

        if ($product->save()) {
            session()->flash('success', 'Product Updated Successfully');
            return redirect()->route('pengguna/products');
        } else {
            session()->flash('error', 'Some problem occurred');
            return redirect()->route('pengguna/products/update', $id);
        }
    }

    public function delete($id)
    {
        $product = Product::findOrFail($id);
        if (!is_null($product->image)) {
            $photo = public_path('uploads/' . $product->image);
            if (File::exists($photo)) {
                unlink($photo); // Delete the associated image file
            }
        }
    
        if ($product->delete()) {
            session()->flash('success', 'Product Deleted Successfully');
        } else {
            session()->flash('error', 'Product Not Deleted Successfully');
        }
    
        return redirect()->route('pengguna/products'); // Use the correct route name
    }
}
