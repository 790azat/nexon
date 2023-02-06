@extends('layout')

@section('content')
    <div class="col-12 mt-5">
        <div class="container">
            <div class="col-12 d-flex justify-content-center">
                <div class="btn-group" role="group" aria-label="Basic example">
                    @foreach($categories as $category)
                        <button type="button" class="btn btn-primary"><a href="/category/{{ $category->name }}">{{ ucfirst($category->name) }}</a></button>
                    @endforeach
                </div>
            </div>
            <div class="col-12 d-flex flex-wrap row-cols-4 mt-3">
                @foreach($items as $item)
                    <a href="" class="col shadow-sm rounded-1 p-3">
                        <div class="col-12">
                            <img src="{{ $item->image }}" style="width: 100%" alt="">
                        </div>
                        <div class="col-12 mt-4">
                            <p class="text-center fw-bold">{{ $item->name }}</p>
                        </div>
                        <div class="col-12 mt-1">
                            <p class="text-center">{{ $item->price }} AMD</p>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
@endsection
