@extends('master')

@section('title', 'Form Edit Menu')

@section('content')
<div class="container mt-5">
    <h1>Form Edit Menu</h1>
    <form action="/products/{{$product->id}}" method="POST" class="w-50">
        @method('PUT')
        @csrf
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Kategori</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" name="kategori" value="{{$product->kategori}}">
            @error('kategori')
            <div class="alert" style="height: 30px; padding-top: 10px; font-size: .9rem; color: red;">{{$message}}</div>
            @enderror
          </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Title</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" name="title" value="{{$product->title}}">
            @error('title')
            <div class="alert" style="height: 30px; padding-top: 10px; font-size: .9rem; color: red;">{{$message}}</div>
            @enderror
          </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Description</label>
            <textarea type="text" class="form-control" id="exampleFormControlInput1" name="desc" value="{{$product->desc}}"></textarea>
            @error('desc')
            <div class="alert" style="height: 30px; padding-top: 10px; font-size: .9rem; color: red;">{{$message}}</div>
            @enderror
          </div>
          <div class="input-group mb-3">
            <span class="input-group-text">$</span>
            <input type="text" class="form-control" name="price" value="{{$product->price}}">
            @error('title')
            <div class="alert" style="height: 30px; padding-top: 10px; font-size: .9rem; color: red;">{{$message}}</div>
            @enderror
          </div>
          <div class="mb-3">
            <input class="form-control" type="file" id="formFile" name="image" value="{{$product->image}}">
            @error('title')
            <div class="alert" style="height: 30px; padding-top: 10px; font-size: .9rem; color: red;">{{$message}}</div>
            @enderror
          </div>
          <button class="btn btn-primary">Simpan</button>
    </form>
</div>

@endsection
