@extends('master')
@section('title','Form Tambah Menu')
@section('content')
    <div class="container mt-5">
        <h1>Form Tambah Menu</h1>
        <form action="/products" method="POST" enctype="multipart/form-data"  class="w-50">
            @csrf
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="exampleFormControlInput1" name="title" value="{{old('title')}}">
                @error('title')
                <div class="alert" style="height: 30px; padding-top: 10px; font-size: .9rem; color: red;">{{$message}}</div>
                @enderror
              </div>

              <div class="input-group mb-3">
                <span class="input-group-text">$</span>
                <input type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{old('price')}}">
                @error('price')
                <div class="alert" style="height: 30px; padding-top: 10px; font-size: .9rem; color: red;">{{$message}}</div>
                @enderror
              </div>
              <div class="mb-3">
                <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" value="{{old('image')}}">
                @error('image')
                <div class="alert" style="height: 30px; padding-top: 10px; font-size: .9rem; color: red;">{{$message}}</div>
                @enderror
              </div>
              <button class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
