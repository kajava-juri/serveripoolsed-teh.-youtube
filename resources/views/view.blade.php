@extends('layout')

@section('content')
    <div class="card">
        <video src="{{$video->path}}" controls class="card-img-top" alt="..."></video>
        <div class="card-body">
            <h5 class="card-title">{{$video->title}}</h5>
            <p class="card-text">{{$video->description}}</p>
        </div>
        <div class="card-footer text-muted">
            {{$video->created_at->diffForHumans()}}
        </div>
    </div>

    <h3 class="my-3">{{$video->comments->count()}} Comments</h3>

    @auth
        <form action="{{route('comments.store', ['video' => $video])}}" method="POST">
            @csrf
            <input required type="text" name="body" id="body" placeholder="Add a comment..." class="form-control">
            <input type="submit" class="btn btn-primary" value="Add comment">
        </form>
    @endauth

    @foreach($video->comments as $comment)
        <div class="card mt-2">
            <div class="card-body">
                <p class="card-text">{{$comment->body}}</p>
            </div>
            <div class="card-footer text-muted">
                {{$comment->user->name}}
                {{$comment->created_at->diffForHumans()}}
            </div>
        </div>
    @endforeach
@endsection
