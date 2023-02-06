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
