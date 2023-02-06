@extends('layout')

@section('content')
    @include('components.header')
    <div class="col-12 mt-5">
        <div class="container">
            {{ $category->name }}
        </div>
    </div>
@endsection
