@extends('master')

@section('content')
    <div class="container mt-3">
        <h2>Product JXB Coffee</h2>
        @if (session()->has('Success'))
            <div class="alert alert-success alert-dismissible fade show my-3" style="width: 25rem;" role="alert">
                {{session('Success')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <a href="/categories/create" class="btn btn-primary shadow mt-3">Add Category</a>
        <a href="/products/create" class="btn btn-primary shadow mt-3">Add Product</a>
        @foreach ($categories as $category)
        <ul class="list-group mt-3" style="width: 25rem;">
            <li class="list-group-item disabled fw-bold" style="font-size: 1.5rem;" aria-disabled="true">{{$category->title}}</li>
            @foreach ($category->products as $product)
            <li class="list-group-item">{{$product->title}}
                &nbsp; <span>
                    <form action="/products/{{$product->id}}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button style="border: unset;" class="badge bg-danger rounded-pill">Delete</button>
                    </form>
                    <a href="/products/{{$product->id}}/edit" style="text-decoration: none;" class="badge bg-dark rounded-pill">Update</a>
                    <a href="/products/{{$product->id}}" style="text-decoration: none;" class="badge bg-success rounded-pill">Detail</a>
                </span>
            </li>
            @endforeach
          </ul>
        @endforeach
    </div>
@endsection
