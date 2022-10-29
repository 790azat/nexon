@extends('layout')

@section('cart')
    <div class="container my-5">
        <div class="col-10 p-2 shadow mx-auto d-flex justify-content-center flex-wrap">
            <div class="col-11 my-4 mx-auto d-flex gap-1 flex-wrap">
                @foreach($items as $item)
                    <div class="col-12 d-flex p-2 border rounded align-items-center">
                        <img src="{{$item->image}}" class="rounded" style="width: 60px" alt="">
                        <div class=" ms-3">
                            <p>{{$item->name}}</p>
                        </div>
                        <div class="ms-auto fw-bold">
                            <p id="quantityMultiplicated" class="text-nowrap">{{number_format((intval($item->price) * intval($item->quantity)),2,'.',',') . ' ֏'}}</p>
                        </div>
                        <div class="ms-3">
                            <button id="addButton{{$item->id}}" class="btn btn-success">+</button>
                        </div>
                        <div class="col-1 mx-2">
{{--                            <p class="text-center">Քանակ</p>--}}
                            <input type="number" id="quantity{{$item->id}}" value="{{$item->quantity}}" class="form-control">
                        </div>
                        <script>
                            $(document).ready(function(){
                                //var counter = $('#TextBox').val();
                                $('#addButton{{$item->id}}').click( function() {
                                    var counter = $('#quantity{{$item->id}}').val();
                                    counter++ ;
                                    $('#quantity{{$item->id}}').val(counter);
                                });

                            })
                        </script>
                        <div class="col-auto me-2">
                            <form action="/remove" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{$item->id}}">
                                <button class="btn btn-danger">Հեռացնել</button>
                            </form>
                        </div>
                    </div>
                @endforeach
                    <div class="col-12 d-flex p-2 border rounded align-items-center">
                        <div class="ms-auto">
                            <button id="addButton{{$item->id}}" class="btn btn-success">Վճարել</button>
                        </div>
                    </div>
            </div>
        </div>
    </div>
@endsection
