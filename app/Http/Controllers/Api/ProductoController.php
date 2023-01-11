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
        //
    }

   
    public function show($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
