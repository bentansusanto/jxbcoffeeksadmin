@extends('master')

@section('content')
    <div class="container mt-3">
        <h2>Komentar Netizen</h2>
        @foreach($comments as $comment)
        <div class="card mt-3" style="width: 18rem;">
            <div class="card-body">
              <h5 class="card-title">{{$comment->name}}</h5>
              <p class="card-subtitle mb-2" style="color: #a4a4a4; font-size: .9rem;">{{$comment->email}}</p>
              <p class="card-text">{{$comment->message}}</p>
              <form class="d-inline" action="/comments/{{$comment->id}}" method="POST">
                @csrf
                @method('DELETE')
                <button style="border: none;" class="badge bg-danger">Delete</button>
              </form>
            </div>
          </div>
          @endforeach
    </div>
@endsection
