@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Pictures list</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-auto">
                <a href="{{route('admin.pictures.create')}}" class="btn btn-info mb-2">Create new picture</a>
            </div>
        </div>

        <div class="row">
                @foreach($pictures as $picture)
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 my-3">
                    <div class="card bg-dark text-white">
                        <img src="/{{$picture->thumbnail}}" class="card-img">
                        </div>
                    </div>
                @endforeach
            </div>
        <div class="row my-3">
            {{$pictures->links()}}
        </div>
    </div>
@endsection
