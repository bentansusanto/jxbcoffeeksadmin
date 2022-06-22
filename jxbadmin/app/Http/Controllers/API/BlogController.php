<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Kategori;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        // get data kategori with data blog
        $kategoris = Kategori::with('blogs')->get();

        // if kategori and blog found
        return response()->json([
            'Success' => true,
            'Message' => 'Data found',
            'data' => $kategoris
        ], 200);

        // if kategori and blog not found
        return response()->json([
            'Success' => false,
            'Message' => 'Data not found'
        ], 404);
    }

    public function show(Blog $blog)
    {
        $blog = Blog::find($blog->id);

        // if blog_id found
        return response()->json([
            'Success' => true,
            'Message' => 'Blog found',
            'data' => $blog
        ], 200);

        // if blog_id not found
        return response()->json([
            'Success' => false,
            'Message' => 'Blog not found'
        ], 404);
    }
}
