@extends('layout')

@section('content')
    @include('components.header')
    <div class="col-12">
        <div class="container">
            @include('components.navbar')
            @include('components.items')
        </div>
    </div>
@endsection
