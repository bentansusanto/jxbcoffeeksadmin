@extends('admin.main')

@section('content')
    <div class="container">
        <h2>Register</h2>
        <form action="/login" method="POST">
            @csrf
            <div class="form-floating mb-3">
                <input type="email" class="form-control text-capitalize @error('email') is-invalid @enderror" id="floatingInput" name="email" value="{{$user->name}}">
                <label for="floatingInput">Email address</label>
              </div>
              <div class="form-floating">
                <input type="password" class="form-control" id="floatingPassword" name="password">
                <label for="floatingPassword">Password</label>
              </div>
              <button class="btn btn-primary w-100">Login Now</button>
              <p style="font-size: .9rem;">I dont have account <a style="text-decoration: none;" href="/login">Register Now</a></p>
        </form>
    </div>
@endsection
