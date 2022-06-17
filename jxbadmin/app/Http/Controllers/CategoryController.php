<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

// use function Ramsey\Uuid\v1;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::with('products')->get();
        return view('product.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'required|file|max:1024'
        ]);

        $category = Category::create($request->all());

        $category->title = ucwords($category->title);
        if($request->hasFile('image'))
        {
            $request->file('image')->move('produk', $request->file('image')->getClientOriginalName());
            $category->image = $request->file('image')->getClientOriginalName();
            $category->save();
        }

        return redirect('/products')->with('Success','Category berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('category.detail',[
            'products' => Product::all()
        ], compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'required|file|max:1024'
        ]);

        $category = Category::find($category->id)->update($request->all());

        $category->title = ucwords($category->title);
        if($request->hasFile('image'))
        {
            $request->file('image')->move('produk', $request->file('image')->getClientOriginalName());
            $category->image = $request->file('image')->getClientOriginalName();
            $category->save();
        }

        return redirect('/products')->with('Success','Category berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        Category::destroy($category->id);

        return redirect('/products')->with('Success','Category berhasil dihapus');
    }
}
