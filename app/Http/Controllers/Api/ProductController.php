<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::all();
        return $products;
    }


    public function store(Request $request)
    {
        try {
            $product = new Product;
            $product->sku = $request->sku;
            $product->name = $request->name;
            $product->description = $request->description;
            $product->price = $request->price;
            $product->stock = $request->stock;
            $product->save();
            return $product;

        } catch (\Throwable $th) {
            return "Something went wrong";
        }
    }


    public function show($id)
    {
        $product = Product::find($id);
        return $product;
    }

    public function update(Request $request, $id)
    {
        try {
            $product = Product::findOrFail($request->id);
            $product->sku = $request->sku;
            $product->name = $request->name;
            $product->description = $request->description;
            $product->price = $request->price;
            $product->stock = $request->stock;

            $product->save();
            return $product;

        } catch (\Throwable $th) {
            return "Something went wrong";
        }
    }

    public function destroy($id)
    {
        $product = Product::destroy($id);
        return $product;
    }
}