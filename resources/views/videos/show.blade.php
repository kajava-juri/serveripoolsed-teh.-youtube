@extends('layout')
@section('content')
    <table class="table table-striped">
        <tbody>
            <tr>
                <td>Id</td>
                <td>{{$video->id}}</td>
            </tr>
            <tr>
                <td>Title</td>
                <td>{{$video->title}}</td>
            </tr>
            <tr>
                <td>Description</td>
                <td>{{$video->description}}</td>
            </tr>
            <tr>
                <td>Duration</td>
                <td>{{$video->duration}}</td>
            </tr>
            <tr>
                <td>Created at</td>
                <td>{{$video->created_at}}</td>
            </tr>
            <tr>
                <td>Updated at</td>
                <td>{{$video->updated_at}}</td>
            </tr>
        </tbody>
    </table>
    <a href="{{route('videos.edit', ['video' => $video])}}" class="btn btn-warning">Edit</a>
    <a href="{{route('videos.destroy', ['video' => $video])}}" class="btn btn-danger">Delete</a>
@endsection

