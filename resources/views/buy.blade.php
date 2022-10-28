@extends('layout')

@section('buy')
    <div class="container d-flex justify-content-center my-5">
        <div class="col-8 p-3 shadow d-flex flex-wrap gap-2 justify-content-center" style="background: white">
            <p class="text-center col-12 py-3">{{$item->name}}</p>
            <div class="col-3">
                <div class="d-flex flex-wrap justify-content-center">
                    <img src="{{$item->image}}" class="img-thumbnail" style="width: 100%;" alt="">
                </div>
            </div>
            <div class="col p-3 pt-0">
                <form action="/" method="get" class="d-flex justify-content-center gap-3 flex-wrap">
                    <div class="col-12">
                        <div class="input-group input-group">
                            <span class="input-group-text" id="inputGroup-sizing-lg"><i class="bi bi-credit-card"></i></span>
                            <input type="text" placeholder="Card number" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
                        </div>
                    </div>
                    <div class="col-12 d-flex flex-wrap gap-3">
                        <div class="col">
                            <div class="input-group input-group">
                                <span class="input-group-text" id="inputGroup-sizing-lg"><i class="bi bi-person-circle"></i></span>
                                <input type="text" placeholder="Cardholder's name" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
                            </div>
                        </div>
                        <div class="col">
                            <div class="input-group input-group">
                                <span class="input-group-text" id="inputGroup-sizing-lg"><i class="bi bi-calendar-date"></i></span>
                                <input type="date" placeholder="Exp. date" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
                            </div>
                        </div>
                        <div class="col-12 d-flex gap-3">
                            <div class="input-group input-group col">
                                <span class="input-group-text" id="inputGroup-sizing-lg"><i class="bi bi-credit-card-2-back-fill"></i></span>
                                <input type="text" placeholder="CVV" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
                            </div>
                            <div class="col d-flex">
                                <input type="submit" class="btn btn-success col-12" value="Վճարել">
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
