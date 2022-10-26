@extends('admin-layout')

@section('parser')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Parser</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active"><p>All items count: <span class="fw-bold">{{count(\App\Models\Item::all())}}</span></p></li>
        </ol>

        {{--                <div class="row">--}}
        {{--                    <div class="col-xl-6">--}}
        {{--                        <div class="card mb-4">--}}
        {{--                            <div class="card-header">--}}
        {{--                                <i class="fas fa-chart-area me-1"></i>--}}
        {{--                                Area Chart Example--}}
        {{--                            </div>--}}
        {{--                            <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>--}}
        {{--                        </div>--}}
        {{--                    </div>--}}
        {{--                    <div class="col-xl-6">--}}
        {{--                        <div class="card mb-4">--}}
        {{--                            <div class="card-header">--}}
        {{--                                <i class="fas fa-chart-bar me-1"></i>--}}
        {{--                                Bar Chart Example--}}
        {{--                            </div>--}}
        {{--                            <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>--}}
        {{--                        </div>--}}
        {{--                    </div>--}}
        {{--                </div>--}}
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/" class="text-dark hover-underline">Home</a></li>
                <li class="breadcrumb-item"><a href="/admin" class="text-dark hover-underline">Admin</a></li>
                <li class="breadcrumb-item active" aria-current="page">Parser</li>
            </ol>
        </nav>
        <div class="card mb-4">
            <div class="card-header">
                <i class="bi bi-arrow-repeat me-1"></i>
                Parser
            </div>
            <div class="card-body">
                <div class="container d-flex justify-content-center py-4 flex-wrap">
                    <div class="col-12">
                        <div class="col-6 mx-auto">
                            <form action="/parse" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Link</label>
                                    <input required type="text" class="form-control" name="link" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Link">
                                    <label for="exampleFormControlInput2" class="form-label">Category</label>
                                    <select required class="form-select" aria-label="Default select example" name="category_id">
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                    <input type="submit" class="btn btn-success mt-3 mx-auto" value="Parse">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
