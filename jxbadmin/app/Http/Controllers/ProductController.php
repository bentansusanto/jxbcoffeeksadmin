<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::with('products')->get();
        return view('product.index' ,compact(['categories']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('product.create',[
            'categories' => Category::all()
       ]);
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
            'category_id' => 'required',
            'desc' => 'required',
            'price' => 'required',
            'image' => 'required|max:1024',
        ]);

        $product = Product::create($request->all());

        $product->title = ucwords($product->title);

        if($request->hasFile('image')){
                $request->file('image')->move('produk', $request->file('image')->getClientOriginalName());
                $product->image = $request->file('image')->getClientOriginalName();
                $product->save();
            }

        return redirect('/products')->with('Success','Product berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('product.edit',[
           'categories' => Category::all()
        ], compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'title' => 'required',
            'category_id' => 'required',
            'desc' => 'required',
            'price' => 'required',
            'image' => 'required|max:1024',
        ]);

            $product = Product::find($product->id);
            $product->update($request->all());

            $product->title = ucwords($product->title);

            // $product->title = ucwords($product->title);
            if($request->hasFile('image')){
                $request->file('image')->move('produk', $request->file('image')->getClientOriginalName());
                $product->image = $request->file('image')->getClientOriginalName();
                $product->save();
            }
        return redirect('/products')->with('Success','Product berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        Product::destroy($product->id);
        return redirect('/products')->with('Success','Product berhasil dihapus');
    }
}
