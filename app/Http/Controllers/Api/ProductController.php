<?php

namespace App\Http\Controllers\Aoi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductoController extends Controller
{

    public function index()
    {
        $products = Product::all();
        return $products;
    }


    public function store(Request $request)
    {
        try {

            $productsArr = [
                'sku' => $request->sku,
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price,
                'stock' => $request->stock
            ];

            $response = Product::create($productsArr);

            if ($response) {
                return $response;
            }

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