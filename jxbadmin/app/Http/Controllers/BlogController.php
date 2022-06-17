<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Kategori;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategoris = Kategori::with('blogs')->get();

        return view('blog.blog', compact('kategoris'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blog.create',[
            'kategoris' => Kategori::all()
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
            'desc' => 'required',
            'image' => 'required|file|max:1024'
        ]);

        $blog = Blog::create($request->all());

        $blog->title = ucwords($blog->title);

        if($request->hasFile('image'))
        {
            $request->file('image')->move('blog', $request->file('image')->getClientOriginalName());
            $blog->image = $request->file('image')->getClientOriginalName();
            $blog->save();
        }

        return redirect('/blogs')->with('Success','Add Blog Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        return view('blog.detail', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        return view('blog.edit',[
            'kategoris' => Kategori::all()
        ], compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'title' => 'required',
            'desc' => 'required',
            'image' => 'required|file|max:1024'
        ]);

        $blog = Blog::find($blog->id);
        $blog->update($request->all());

        $blog->title = ucwords($blog->title);

        if($request->hasFile('image'))
        {
            $request->file('image')->move('blog', $request->file('image')->getClientOriginalName());
            $blog->image = $request->file('image')->getClientOriginalName();
            $blog->save();
        }

        return redirect('/blogs')->with('Success','Update Blog Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        Blog::destroy($blog->id);

        return redirect('/blogs')->with('Success','Delete Blog Successfully');
    }
}
