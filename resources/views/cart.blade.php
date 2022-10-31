@extends('layout')

@section('content')
    <div class="container my-5">
        <div class="col-10 p-2 shadow mx-auto d-flex justify-content-center flex-wrap">
            <div class="col-11 my-4 mx-auto d-flex gap-1 flex-wrap">
                @php
                    $total = 0;
                @endphp
                @foreach($items as $item)
                    <div class="col-12 d-flex p-2 border rounded align-items-center">
                        <img src="{{$item->image}}" class="rounded" style="width: 60px" alt="">
                        <div class=" ms-3">
                            <p>{{$item->name}}</p>
                        </div>
                        <div class="ms-auto fw-bold d-flex">
                            <p class="text-nowrap fw-light text-muted me-2">{{$item->price}}</p>
                            <p id="quantityMultiplicated{{$loop->index}}" class="text-nowrap">{{$item->price}}</p>
                        </div>
                        <div class="ms-3">
                            <button id="addButton{{$item->id}}" class="btn btn-success">+</button>
                        </div>
                        <div class="col-1 mx-2">
                            <input readonly type="number" id="quantity{{$item->id}}" value="{{$item->quantity}}" class="form-control">
                        </div>

                        <script>
                            $(document).ready(function(){
                                let counter = $('#quantity{{$item->id}}').val();
                                $('#quantity{{$item->id}}').val(counter);
                                let price = {{ $item->price }};
                                let x = price * counter
                                $("#quantityMultiplicated{{ $loop->index }}").text(x)

                                $('#addButton{{$item->id}}').click( function() {
                                    let counter = $('#quantity{{$item->id}}').val();
                                    counter++ ;
                                    $('#quantity{{$item->id}}').val(counter);
                                    let price = {{ $item->price }};
                                    let x = price * counter
                                    $("#quantityMultiplicated{{ $loop->index }}").text(x)
                                    let arr = [];

                                    arr.push(+($('#quantityMultiplicated{{ $loop->index }}').text()))


                                    let z = arr.reduce((accumulator, value) => {
                                        return accumulator + value;
                                    }, 0);

                                    $('#total').text(z)
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
                    @php
                        $total += intval($item->price);
                    @endphp
                @endforeach
                    <div class="col-12 d-flex p-2 border rounded align-items-center">
                        <div class="ms-auto">
                            <p>Ընդհանուր - <span id="total" class="fw-bold">{{$total}}</span></p>
                        </div>
                        <div class="ms-3">
                            <a id="link">
                                <button id="addButton{{$item->id}}" class="btn btn-success">Վճարել</button>
                            </a>
                            <script>
                                document.getElementById('link').href = '/pay?sum=' + $('#total').text()
                            </script>
                        </div>
                    </div>

            </div>
        </div>
    </div>
@endsection
