@extends('master')

@section('title', 'Daftar Menu Coffee')

@section('content')
    <div class="container mt-4">
        <h1>Daftar Menu Coffee</h1>
        <a class="btn btn-primary" href="/products/create">Create</a>
        <table class="table" style="width: 70%;">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Kategori</th>
                <th scope="col">Title</th>
                <th scope="col">Deskripsi</th>
                <th scope="col">Harga</th>
                <th scope="col">Image</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                <tr>
                  <th scope="row">{{($product->id)}}</th>
                  <td>{{($product->kategori)}}</td>
                  <td>{{($product->title)}}</td>
                  <td>{{($product->desc)}}</td>
                  <td>{{($product->price)}}</td>
                  <td><img style="width: 100px;" src="{{asset('produk/'. $product->image)}}" alt=""></td>
                  <td>
                      <form action="/products/{{$product->id}}" method="POST">
                        @method('DELETE')
                        @csrf
                        <input type="Submit" class="btn btn-danger" value="Delete">
                      </form>
                  </td>
                  <td><a class="btn btn-dark" href="/products/{{$product->id}}/edit">Update</a></td>
                </tr>
                @endforeach
            </tbody>
          </table>
    </div>

@endsection
