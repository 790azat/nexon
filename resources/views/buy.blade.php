@extends('layout')

@section('buy')
    <div class="col-8 mx-auto my-5 p-3 shadow" style="background: white">
        <div class="d-flex justify-content-center align-items-center flex-wrap">
            <div class="col-12 text-center">
                <p class="fs-3">Վճարում</p>
            </div>
            <div class="col-12 p-3">
                <form action="/" class="d-flex justify-content-center align-items-center gap-3 flex-wrap">
                    <div class="col-12">
                        <div class="input-group input-group-lg">
                            <span class="input-group-text" id="inputGroup-sizing-lg"><i class="bi bi-credit-card"></i></span>
                            <input type="text" placeholder="Card number" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
                        </div>
                    </div>
                    <div class="col">
                        <div class="input-group input-group-lg">
                            <span class="input-group-text" id="inputGroup-sizing-lg"><i class="bi bi-person-circle"></i></span>
                            <input type="text" placeholder="Cardholder's name" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
                        </div>
                    </div>
                    <div class="col">
                        <div class="input-group input-group-lg">
                            <span class="input-group-text" id="inputGroup-sizing-lg"><i class="bi bi-calendar-date"></i></span>
                            <input type="text" placeholder="Exp. date" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="input-group input-group-lg">
                            <span class="input-group-text" id="inputGroup-sizing-lg"><i class="bi bi-credit-card-2-back-fill"></i></span>
                            <input type="text" placeholder="CVV" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
                        </div>
                    </div>
                    <div class="col-12 d-flex justify-content-center">
                        <input type="submit" class="btn btn-success" value="Վճարել">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
