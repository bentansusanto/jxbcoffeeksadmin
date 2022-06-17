@extends('master')

@section('content')
    <div class="container mt-5">
        <h1>Form Ubah Menu</h1>
        <form action="/products/{{$product->id}}" method="POST" enctype="multipart/form-data" class="w-25">
            @method('PUT')
            @csrf
            <div class="mb-3">
                <label for="exampleInput1" class="form-label">Title</label>
                <input type="text" class="form-control text-capitalize @error('title') is-invalid @enderror" id="exampleInput1" name="title" value="{{$product->title}}">
                @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
                <select class="form-select" name="category_id" value="{{$product->category_id}}">
                    <option selected>Open this select menu</option>
                    @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->title}}</option>
                    @endforeach
                    @error('category_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </select>
            <div class="mb-3 mt-2">
                <label for="exampleFormControlInput1" class="form-label">Deskripsi</label>
                <textarea type="text" class="form-control @error('desc') is-invalid @enderror" id="exampleFormControlInput1" name="desc" value="{{$product->desc}}"></textarea>
                @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="input-group mb-3">
                <span class="input-group-text">$</span>
                <input type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{old('price')}}">
                @error('price')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="mb-3">
                <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" value="{{$product->image}}">
                @error('image')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <button class="btn btn-primary w-100">Submit</button>
        </form>
    </div>
@endsection
