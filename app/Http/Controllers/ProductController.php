<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    public function home()
    {
        $products = Product::paginate(5);
        return view('home', compact('products'));
    }

    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(ProductRequest $request)
    {
        $product = new Product();
        $product->name = $request->name;

        if ($request->hasFile('image')) {
            $image = $request->image;
            $path = $image->store('images/products', 'public');
            $product->image = $path;
        }

        $product->price = $request->price;
        $product->old_price = $request->old_price;
        $product->description = $request->description;

        $product->save();

        return redirect()->back()->with('messageCreateProduct', 'Create Product Successfully!');
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('products.update', compact('product'));
    }

    public function update(ProductRequest $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->name = $request->name;

        if ($request->hasFile('image')) {
            $currentImage = $product->image;
            if ($currentImage) {
                Storage::delete('/public/' . $currentImage);
            }
            $image = $request->image;
            $path = $image->store('/images/products', 'public');
            $product->image = $path;
        }

        $product->price = $request->price;
        $product->old_price = $request->old_price;
        $product->description = $request->description;

        $product->save();
        Session::flash('messageUpdateProduct', 'Update Product Successfully!');
        return redirect()->route('products.show', ['id' => $id]);
    }

    public function delete($id)
    {
        $product = Product::findOrFail($id);
        return view('products.delete', compact('product'));
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $image = $product->image;

        if ($image) {
            Storage::delete('/public/' . $image);
        }

        $product->delete();

        Session::flash('messageDeleteProduct', "Deleted Product!");

        return redirect()->route('products.index');
    }

    public function search(Request $request)
    {
        $keyword = $request->keyword;

        if (!$keyword) {
            return redirect()->back()->with('message', "You Must Be Enter Keyword!");
        } else {
            $products = Product::where('name', 'like', '%' . $keyword . '%')->paginate(5);
        }

        return view('products.index', compact('products'));
    }
}
