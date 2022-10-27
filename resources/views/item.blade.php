@extends('layout')

@section('item')
    <!-- Product section-->
    <section class="pt-0 pb-2">
        <div class="container px-4 px-lg-5 my-5 mt-4">
            <div class="container mb-4">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Գլխավոր</a></li>
                        <li class="breadcrumb-item"><a href="/?category={{ $item->category->name }}">{{ $item->category->name }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{$item->name}}</li>
                    </ol>
                </nav>
            </div>
            <div class="row gx-4 gx-lg-5 align-items-center">
                <div class="col-md-6 d-flex flex-wrap">
                    <img class="col-12 card-img-top mb-5 mb-md-0" src="{{$item->image}}" alt="..." />
                </div>

                <div class="col-md-6">
                    <div class="small mb-1">SKU: BST-498</div>
                    <h1 class="display-5 fw-bolder">{{$item->name}}</h1>
                    <div class="fs-5 mb-5">
{{--                        <span class="text-decoration-line-through">$45.00</span>--}}
                        <span><span class="badge bg-success">{{number_format(intval($item->price),2,'.',',')}}</span>{{' ֏'}} դրամ</span>
                    </div>
                    <p class="lead">{{$item->item_description}}</p>
                    <form action="/buy" class="d-flex mt-2">
                        @csrf
                        <input class="form-control text-center me-3" id="inputQuantity" type="num" value="1" style="max-width: 3rem" name="quantity" />
                        <button class="btn btn-outline-dark flex-shrink-0" type="submit">
                            <i class="bi-cart-fill me-1"></i>
                            Գնել
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
{{--    <ul class="list-group">--}}
{{--        <li class="list-group-item">Конструкция - внутриканальные</li>--}}
{{--        <li class="list-group-item">Подключение - Bluetooth 5.0</li>--}}
{{--        <li class="list-group-item">Тип зарядки кейса - micro USB</li>--}}
{{--        <li class="list-group-item">Степень защиты	IPX4 - IPX4</li>--}}
{{--        <li class="list-group-item">Количество микрофонов - 2</li>--}}
{{--        <li class="list-group-item">Тип излучателей - динамические</li>--}}
{{--        <li class="list-group-item">Время работы - 4 ч</li>--}}
{{--        <li class="list-group-item">Время работы от аккумулятора в кейсе - 14 ч</li>--}}
{{--        <li class="list-group-item">Импеданс - 32 Ом</li>--}}
{{--        <li class="list-group-item">Диапазон воспроизводимых частот - 20-20000 Гц</li>--}}
{{--        <li class="list-group-item">Чувствительность - 93 дБ</li>--}}
{{--    </ul>--}}
    <!-- Related items section-->
    <section class="py-5 pt-0 bg-light">
        <div class="container px-4 px-lg-5">
            <h2 class="fw-bolder mb-4">Նմանատիպ ապրանքներ</h2>
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                @foreach(\App\Models\Item::take(4)->get() as $item)
                    <a href="/item/{{$item->id}}" class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="{{$item->image}}" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">{{$item->name}}</h5>
                                    <!-- Product reviews-->
                                    <div class="d-flex justify-content-center small text-warning mb-2">
                                        @php
                                            $x = rand(2,5);
                                        @endphp
                                        @for($i=1;$i<=$x;$i++)
                                            <div class="bi-star-fill"></div>
                                        @endfor
                                        @for($i=1;$i<=5 - $x;$i++)
                                            <div class="bi-star"></div>
                                        @endfor
                                    </div>
                                    <!-- Product price-->
                                    {{$item->price}} դրամ
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>
@endsection
