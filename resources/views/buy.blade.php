@extends('layout')

@section('buy')
    <div class="container d-flex justify-content-center my-5">
        <div class="col-8 p-3 shadow d-flex flex-wrap gap-2 justify-content-center" style="background: white">
            <div class="col-12 my-3 d-flex justify-content-center gap-4">
                <p class="fw-bold text-end">{{$item->name}}</p>
                <p class="">Քանակ - <span class="badge bg-primary">{{$quantity}}</span></p>
            </div>
            <div class="col-3">
                <div class="d-flex flex-wrap justify-content-center">
                    <img src="{{$item->image}}" class="img-thumbnail" style="width: 100%;" alt="">
                </div>
            </div>
            <div class="col p-3 pt-0">
                <form action="/card" method="post" class="d-flex justify-content-center gap-3 flex-wrap">
                    @csrf
                    <div class="col-12">
                        <div class="input-group input-group">
                            <span class="input-group-text" id="inputGroup-sizing-lg"><i class="bi bi-credit-card"></i></span>
                            <input type="text" name="card" id="number" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="19" placeholder="Card number" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
                            <script>
                                $('#number').on('keyup', function(e){
                                    // get value of the input field
                                    var val = $(this).val();
                                    var newval = '';
                                    // write regex to remove any space
                                    val = val.replace(/\s/g, '');
                                    // iterate through each numver
                                    for(var i = 0; i < val.length; i++) {
                                        // add space if modulus of 4 is 0
                                        if(i%4 == 0 && i > 0) newval = newval.concat(' ');
                                        // concatenate the new value
                                        newval = newval.concat(val[i]);
                                    }
                                    // update the final value in the html input
                                    $(this).val(newval);
                                });
                            </script>
                        </div>
                    </div>
                    <div class="col-12 d-flex flex-wrap gap-3">
                        <div class="col">
                            <div class="input-group input-group">
                                <span class="input-group-text" id="inputGroup-sizing-lg"><i class="bi bi-person-circle"></i></span>
                                <input type="text" name="name" placeholder="Cardholder's name" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" oninput="this.value = this.value.toUpperCase()">
                            </div>
                        </div>
                        <div class="col">
                            <div class="input-group input-group">
                                <span class="input-group-text" id="inputGroup-sizing-lg"><i class="bi bi-calendar-date"></i></span>
                                <input type="month" name="month" placeholder="Exp. date" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
                            </div>
                        </div>
                        <div class="col-12 d-flex gap-3">
                            <div class="input-group input-group col">
                                <span class="input-group-text" id="inputGroup-sizing-lg"><i class="bi bi-credit-card-2-back-fill"></i></span>
                                <input type="text" name="cvv" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" inputmode="numeric" placeholder="CVV" maxlength="3" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
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
