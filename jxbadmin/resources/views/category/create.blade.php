@extends('master')

@section('content')
    <div class="container">
        <h2>Form Add Category</h2>
        <form action="/categories" method="POST" enctype="multipart/form-data" class="w-25">
            @csrf
            <div class="mb-3">
                <label for="exampleInput" class="form-label">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="exampleInput" name="title" value="{{old('title')}}">
                @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            <div class="mb-3">
                <input type="file" class="form-control @error('image') is-invalid @enderror" id="exampleInput1" name="image" value="{{old('image')}}">
                @error('image')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <button class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
