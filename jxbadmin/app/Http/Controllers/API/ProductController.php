<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return response()->json([
            'Success' => true,
            'Message' => 'Product found',
            'data' => $products
        ],200);

        return response()->json([
            'Success' => false,
            'Message' => 'Product not found'
        ],404);
    }

    public function show(Product $product)
    {
        $product = Product::find($product->id);

        return response()->json([
            'Success' => true,
            'Message' => 'Product found',
            'data' => $product
        ],200);

        return response()->json([
            'Success' => false,
            'Message' => 'Product not found'
        ],404);
    }
}
