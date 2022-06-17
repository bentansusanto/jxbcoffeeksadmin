@extends('master')

@section('content')
    <div class="container">
        <div class="card mb-3 mt-3" style="width: 300px;">
            <img src="{{asset('produk/'.$product->image)}}" class="card-img-top">
            <div class="card-body">
              <h5 class="card-title">{{$product->title}}</h5>
              <p class="card-text">{{$product->desc}}</p>
              <p class="card-text">${{$product->price}}</p>
              <a href="/products" style="text-decoration: none; color: #ffff;" class="badge bg-danger rounded-pill">kembali</a>
              {{-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> --}}
            </div>
          </div>
    </div>
@endsection
