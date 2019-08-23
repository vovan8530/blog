@extends('layouts.admin')

@section('content')

    <admin_pictures_index-component
        :routes = "{{collect($routes)}}"
        :pictures="{{collect($pictures)}}"
    ></admin_pictures_index-component>

@endsection
