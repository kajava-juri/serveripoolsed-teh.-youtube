@extends('layout')
@section('title', 'Home page')
@section('content')
    {{$videos->links()}}
    <div class="row">
        @foreach($videos as $video)
        <div class="col-3">
            <div class="card">
                <img src="{{$video->thumbnail}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{$video->title}}</h5>
                    <p class="card-text">{{$video->snippet}}</p>
                    <a href="{{route('public.video', ['video' => $video])}}" class="btn btn-primary">View</a>
                    <a href="{{route('video.like', ['video' => $video])}}" class="btn {{$video->authHasLiked() ? 'btn-danger' : 'btn-primary'}}">
                        @if($video->authHasLiked())
                            Unlike
                        @else
                            Like
                        @endif
                    </a>
                </div>
                <div class="card-footer text-muted">
                    Likes {{$video->likes()->count()}}<br>
                    {{$video->user->name}}<br>
                    {{$video->created_at->diffForHumans()}} <br>
                    <b>Comments:</b> {{ $video->comments()->count() }}
                    @foreach ($video->tags as $tag)
                        <a href="#">{{$tag->name}}</a>
                    @endforeach
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection
