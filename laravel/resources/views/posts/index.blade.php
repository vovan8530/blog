@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <h1>Posts list</h1>
        </div>
    </div>
    <div class="row">
        @foreach($posts as $post)
            <div class="col-12">
                <div class="card mb-3">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{$post->title}}</h5>
                        <p class="card-text">{{$post->body}}</p>
                        <p class="card-text">
                            <a href="{{route('posts.show',[$post->slug])}}" class="btn btn-default">Show more</a>
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection