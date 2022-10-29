@extends('layout')

@section('monster')

    <!-- Header-->
    <header class="bg-dark py-1">
        <div class="container px-2 px-lg-5 my-3 d-flex justify-content-center">
            <div class="p-4 ps-0 col-2 d-sm-block d-none">
                <img src="orange.png" width="100%" alt="">
            </div>
            <div class="text-center text-white ms-0 ms-sm-4 col-10 col-sm-7 d-flex justify-content-center align-items-center flex-wrap align-content-center">
                <h1 class="fw-bolder text-nowrap">Կատարեք գնումներ</h1>
                <div class="container"></div>
                <h4 class="lead fw-light text-white-50 mb-0 fs-6">Ամենացածր գներով ապրանքներ չինաստանից</h4>
            </div>
        </div>
    </header>
@endsection

@section('items')

    <div class="container">
        <div class="d-sm-none container mt-4">
            <div class="row row-cols-3 d-flex justify-content-center">
                    <a href="/" class="p-1">
                        <button class="btn btn-outline-secondary col-12 @if(\Illuminate\Support\Facades\URL::full() == 'http://127.0.0.1:8000') active  @endif">Բոլորը</button>
                    </a>
                @foreach($categories as $category)
                    <a href="/?category={{ $category->name }}" class="p-1">
                        <button class="btn btn-outline-secondary col-12 @if(isset($_GET['category']) and $_GET['category'] == $category->name) active @endif">{{ $category->name }}</button>
                    </a>
                @endforeach
            </div>
        </div>
    </div>



    <!-- Section-->
    <section class="container my-4 d-flex">
        <div class="col-auto d-none d-sm-block me-3 mt-1">
            <ul class="list-group gap-1">
                <a href="/">
                    <button type="button" aria-current="page" class="col-12 btn btn-outline-secondary my-auto">Բոլորը</button>
                </a>
                @foreach($categories as $category)
                    <a href="/?category={{ $category->name }}">
                        <button type="button" class="col-12 text-start btn btn-outline-secondary @if(isset($_GET['category']) and $_GET['category'] == $category->name) active @endif" aria-current="page"><i class="bi bi-{{$category->icon}}"></i> {{$category->name}}</button>
                    </a>
                @endforeach
            </ul>
        </div>
        <div class="container px-4 px-sm-0">
            <div class="row row-cols-md-3 row-cols-sm-2 row-cols-1 justify-content-start">
                @foreach($items as $item)
                    <div class="col p-2 d-flex">
                        <div class="shadow d-block rounded-1 overflow-hidden card-hover">
                            <a href="item/{{$item->id}}" class="col-12 d-flex justify-content-start">
                                <img src="{{$item->image}}" style="width: 100%;object-fit: cover" alt="">
                            </a>
                            <div class="d-flex flex-wrap">
                                <a href="item/{{$item->id}}" class="col-12 pt-2 px-3 mb-auto">
                                    <p class="text-center fs-5 fw-bold text-hover" style="overflow: hidden;text-overflow: ellipsis;display: -webkit-box;-webkit-line-clamp: 3;line-clamp: 3;-webkit-box-orient: vertical;">{{$item->name}}</p>
                                </a>
                                <div class="col-12 pb-2 mt-auto">
                                    <p class="text-center">{{number_format(intval($item->price),2,'.',',') . ' ֏'}} դրամ</p>
                                </div>
                                <div class="col-12 pb-3 d-flex justify-content-center">
                                    @if(!\Illuminate\Support\Facades\Auth::check())
                                        <a href="/home">
                                            <button class="px-4 py-2 text-white btn btn-success">Ավելացնել</button>
                                        </a>
                                    @else
                                        <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" value="{{ $item->id }}" name="id">
                                            <input type="hidden" value="{{ $item->name }}" name="name">
                                            <input type="hidden" value="{{ $item->price }}" name="price">
                                            <input type="hidden" value="{{ $item->image }}"  name="image">
                                            <input type="hidden" value="1" name="quantity">
                                            <button class="px-4 py-2 text-white btn btn-success">Ավելացնել</button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <div class="container d-flex justify-content-center align-items-center flex-wrap mb-3">
        @if($items instanceof \Illuminate\Pagination\LengthAwarePaginator )

            {{$items->links()}}

        @endif
    </div>




@endsection
