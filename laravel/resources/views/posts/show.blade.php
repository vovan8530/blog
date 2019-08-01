@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>{{$post->title}}</h1>
            </div>
        </div>
        <div class="row">
            <div class="col">
                {!! $post->body !!}
            </div>
        </div>
    </div>
@endsection
