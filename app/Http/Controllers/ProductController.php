<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Product::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'stock' => 'required',
            'price' => 'required'
        ]);

        $Product = Product::create($request->all());
        return $Product;
    } 

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $Product = Product::find($id);
        
        return $Product;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $Product = Product::find($id);
        $Product->update($request->all());

        return $Product;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $Product = Product::destroy($id);
        return $Product;
    }


    public function search($name) {
        $Product = Product::where('name','like', '%' . $name . '%')->get();
        return $Product;
    }
}
