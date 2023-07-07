<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    public function products()
    {
        return view('products');
    }

    public function addpProducts(Request $request)
    {

        $request->validate(

            [
                'name' => 'required|unique:products',
                'price' => 'required'

            ],

            [
                'name.required' => 'Name is required',
                'name.unique' => 'Products already exits',
                'price.required' => 'Price is required'

            ],

        );

        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->save();
        return response()->json([
            'status' =>'sucess',
        ]);

    }

}
