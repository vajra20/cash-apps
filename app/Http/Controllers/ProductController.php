<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('page.admin.product', compact('products'));
    }

    public function productUser()
    {
        $products = Product::all();
        return view('page.user.product', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
            'image' => 'required|mimes:png,jpg,jpeg',
        ]);

        if ($request->file('image')) {
            $file = $request->file('image');
            $fileNames = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('image'), $fileNames);
        }

        Product::create([
            'name' => request('name'),
            'price' => request('price'),
            'stock' => request('stock'),
            'image' => $fileNames,
        ]);

        return redirect(route('product.admin'))->with('success-message', 'Product Created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $products = Product::findorfail($id);
        $products->update($request->all());

        return redirect(route('product.admin'))->with('success-message', 'Edit Success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $products = Product::findorfail($id);
        $products->delete();

        return redirect(route('product.admin'))->with('delete-message', 'Delete Success');
    }
}
