@extends('admin.main')

@section('content')
    <div class="container">
        <h2>Register</h2>
        <form action="/register" method="POST" class="w-50">
            @csrf
            <div class="form-floating mb-3">
                <input type="text" class="form-control text-capitalize @error('name') is-invalid @enderror" id="floatingInput" name="name" value="{{old('name')}}" autofocus>
                <label for="floatingInput">Email address</label>
              </div>
            <div class="form-floating mb-3">
                <input type="email" class="form-control text-capitalize @error('email') is-invalid @enderror" id="floatingInput" name="email" value="{{old('email')}}">
                <label for="floatingInput">Email address</label>
              </div>
              <div class="form-floating">
                <input type="password" class="form-control" id="floatingPassword" name="password">
                <label for="floatingPassword">Password</label>
              </div>
              <button class="btn btn-primary w-100">Register Now</button>
              <p style="font-size: .9rem;">I have account <a style="text-decoration: none;" href="/login">Login</a></p>
        </form>
    </div>
@endsection
