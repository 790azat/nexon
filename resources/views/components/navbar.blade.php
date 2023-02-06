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
