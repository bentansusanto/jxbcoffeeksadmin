<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return response()->json([
            'Success' => true,
            'Message' => 'Category found',
            'data' => $categories
        ],200);

        return response()->json([
            'Success' => false,
            'Message' => 'Category not found'
        ],404);
    }

    public function show(Category $category)
    {
        $category = Category::find($category->id);

        return response()->json([
            'Success' => true,
            'Message' => 'Category found',
            'data' => $category
        ],200);

        return response()->json([
            'Success' => false,
            'Message' => 'Category not found'
        ],404);

    }
}
