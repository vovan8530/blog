@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-sm-10">
                        <a href="{{route('admin.posts.index')}}"  class="btn btn-info">Back</a>
                    </div>
                </div>
                <form action="{{route('admin.posts.update',[$post->slug])}}" method="post">
                    @method('PUT')
                    @csrf
                    <div class="form-group row">
                        <label for="title" class="col-sm-2 col-form-label">Title</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="title" id="title" value="{{$post->title}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="title" class="col-sm-2 col-form-label">Body</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="body" name="body" rows="10">{{$post->body}}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="status" class="col-sm-2 col-form-label">Status</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="status" name="published_status">
                                @foreach($published_status as $status)
                                    <option
                                        @if($status==$post->published_status) selected @endif
                                    >{{$status}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection
