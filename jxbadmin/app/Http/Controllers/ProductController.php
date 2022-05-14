<?php

namespace App\Http\Controllers;

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
        $products = Product::all();
        return view('index' ,compact(['products']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'title' => 'required',
        //     'price' => 'required|numeric',
        //     'image' => 'required|max:1024',
        // ]);
        // return $request->file('image')->store('produk');
        // $upload_image = $request->file('image')->store('produk');
        // if($request->file('image')){
        //     $validateData['image'] = $request->file('image')->store('produk');
        // }
        $product = Product::create($request->all());
            if($request->hasFile('image')){
                $request->file('image')->move('produk', $request->file('image')->getClientOriginalName());
                $product->image = $request->file('image')->getClientOriginalName();
                $product->save();
            }


        return redirect('/products');
        // return redirect()->route('/products');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        return view('edit', compact(['product']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'price' => 'required|numeric',
            'image' => 'required|max:1024',
        ]);
            $product = Product::find($id);
            $product -> update($request->all());
            if($request->hasFile('image')){
                $request->file('image')->move('produk', $request->file('image')->getClientOriginalName());
                $product->image = $request->file('image')->getClientOriginalName();
                $product->save();
            }

        return redirect('/products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product ->delete();
        return redirect('/products');
    }
}
