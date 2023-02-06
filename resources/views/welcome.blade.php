@extends('layout')

@section('content')
    <div class="col-12">
        <div class="container">
            <div class="col-12 d-flex justify-content-center mb-4">
                <div class="col-auto d-flex justify-content-center">
                    <div class="btn-group" role="group" aria-label="Basic example">
                        @if(Route::current()->uri != '/')
                            <button type="button" class="btn btn-primary"><a href="/">All</a></button>
                        @endif
                        @foreach($categories as $category)
                            <button type="button" class="btn btn-primary @if(Route::current()->name == $category->name) active @endif"><a href="/category/{{ $category->name }}">{{ ucfirst($category->name) }}</a></button>
                        @endforeach
                    </div>
                </div>
                <div class="col-auto ms-auto">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Item name" aria-describedby="button-addon2">
                        <button class="btn btn-primary" type="button" id="button-addon2"><i class="fa-solid fa-search"></i></button>
                    </div>
                </div>
            </div>
            <div class="col-12 d-flex flex-wrap row-cols-4 shadow">
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
