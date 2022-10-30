@extends('admin-layout')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active"><p>All items count: <span class="fw-bold">{{count(\App\Models\Item::all())}}</span></p></li>
        </ol>
        <div class="row">
            <div class="col-xl-3 col-md-6" type="button" data-bs-toggle="modal" data-bs-target="#addModal">
                <div class="card bg-success text-white mb-4">
                    <div class="card-body"><i class="bi bi-plus-square me-1"></i> Add item</div>
                </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">New item</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form enctype="multipart/form-data" action="/save" method="post" class="d-flex my-3 justify-content-center flex-wrap">
                                @csrf
                                <div class="d-flex justify-content-center align-items-start flex-wrap">
                                    <div class="mb-3 col-10 mx-auto">
                                        <label for="exampleFormControlInput1" class="form-label">Item name</label>
                                        <input required type="text" class="form-control" id="exampleFormControlInput1" name="name">
                                    </div>
                                    <div class="mb-3 col-10 mx-auto">
                                        <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                                        <textarea required class="form-control" id="exampleFormControlTextarea1" rows="3" name="item_description"></textarea>
                                    </div>
                                    <div class="mb-3 col-10 mx-auto">
                                        <label for="exampleFormControlInput2" class="form-label">Price</label>
                                        <input required type="number" class="form-control" id="exampleFormControlInput2" name="price">
                                    </div>
                                    <div class="mb-3 col-10 mx-auto">
                                        <label for="exampleFormControlInput2" class="form-label">Category</label>
                                        <select required class="form-select" aria-label="Default select example" name="category_id">
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3 col-10 mx-auto">
                                        <label for="formFile" class="form-label">Image file</label>
                                        <input required class="form-control" type="file" id="image" name="image" accept="image/*">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <input type="submit" class="btn btn-success px-4" value="Save">
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
            <a href="/edit-categories" class="col-xl-3 col-md-6">
                <div class="card bg-warning text-white mb-4">
                    <div class="card-body"><i class="bi bi-pen me-1"></i> Edit categories</div>
                </div>
            </a>
            <a href="/parser" class="col-xl-3 col-md-6">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body"><i class="bi bi-arrow-repeat me-1"></i> Parser</div>
                </div>
            </a>
            <a href="/reset" class="col-xl-3 col-md-6">
                <div class="card bg-danger text-white mb-4">
                    <div class="card-body"><i class="bi bi-trash me-1"></i> Reset database</div>
                </div>
            </a>
        </div>
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
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Item data table. @isset($_GET['page'])Page: <strong class="badge rounded-pill bg-primary">{{$_GET['page']}}@endisset</strong>
            </div>
            <div class="card-body">
                <table id="datatablesSimple" class="table table-hover table-bordered align-middle">
                    <thead>
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Description</th>
                        <th>Category</th>
                        <th>Date</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($items as $item)
                        <tr>
                            <td><a href="/item/{{$item->id}}" class="text-dark"><img src="{{$item->image}}" style="width: 40px;height: 40px;object-fit: cover"></a></td>
                            <td><a href="/item/{{$item->id}}" class="text-dark hover-underline">{{$item->name}}</a></td>
                            <td>{{$item->price}}</td>
                            <td>{{substr($item->item_description,0,50)}}</td>
                            <td><a href="/?category={{$item->category->name}}" class="btn-sm btn-primary">{{$item->category->name}}</a></td>
                            <td class="text-nowrap">{{explode(' ',$item->created_at)[0]}}</td>
                            <td>
                                <button data-bs-toggle="modal" data-bs-target="#itemEditModal{{$item->id}}" class="btn btn-outline-primary text-nowrap"><i class="bi bi-pen me-1"></i>Edit</button>
                                <!-- Modal -->
                                <div class="modal fade" id="itemEditModal{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">{{$item->name}}</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form enctype="multipart/form-data" action="/edit" method="post" class="d-flex my-3 justify-content-center flex-wrap">
                                                    @csrf
                                                    <input style="display: none" type="text" name="id" value="{{$item->id}}">
                                                    <div class="d-flex justify-content-center align-items-start flex-wrap">
                                                        <div class="mb-3 col-5 mx-auto">
                                                            <img src="{{ $item->image }}" alt="" class="img-thumbnail">
                                                        </div>
                                                        <div class="mb-3 col-10 mx-auto">
                                                            <label for="exampleFormControlInput1" class="form-label">Item name</label>
                                                            <input required type="text" class="form-control" id="exampleFormControlInput1" name="name" value="{{$item->name}}">
                                                        </div>
                                                        <div class="mb-3 col-10 mx-auto">
                                                            <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                                                            <input aria-label="With textarea" required class="form-control" id="exampleFormControlTextarea1" name="item_description" value="{{$item->item_description}}"></input>
                                                        </div>
                                                        <div class="mb-3 col-10 mx-auto">
                                                            <label for="exampleFormControlInput2" class="form-label">Price</label>
                                                            <input required type="number" class="form-control" id="exampleFormControlInput2" name="price" value="{{trim(strtr($item->price, array_flip(get_html_translation_table(HTML_ENTITIES, ENT_QUOTES))), chr(0xC2).chr(0xA0))}}">
                                                        </div>
                                                        <div class="mb-3 col-10 mx-auto">
                                                            <label for="exampleFormControlInput2" class="form-label">Category</label>
                                                            <select required class="form-select" aria-label="Default select example" name="category">
                                                                @foreach($categories as $category)
                                                                    @if($category->id == $item->category_id)
                                                                        <option selected value="{{$category->id}}" class="bg-warning">{{$category->name}}</option>
                                                                    @else
                                                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                                                    @endif
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <input type="submit" class="btn btn-success px-4" value="Save">
                                                    </div>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <button data-bs-toggle="modal" data-bs-target="#itemDeleteModal{{$item->id}}" class="btn btn-outline-danger text-nowrap"><i class="bi bi-trash me-1"></i>Delete</button>
                                <!-- Modal -->
                                <div class="modal fade" id="itemDeleteModal{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">{{$item->name}}</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body d-flex justify-content-center align-items-center flex-wrap">
                                                <div class="col-12 text-center">
                                                    Are you sure you want to delete this item ?
                                                </div>
                                                <div class="col-12 d-flex justify-content-center">
                                                    <div class="col-4 mt-1">
                                                        <img src="{{ $item->image }}" class="img-thumbnail" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <a href="/delete/{{$item->id}}">
                                                    <button type="button" class="btn btn-danger">Delete</button>
                                                </a>
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div>
                    {{$items->links()}}
                </div>
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-user me-1"></i>
                Users table. @isset($_GET['page'])Page: <strong class="badge rounded-pill bg-primary">{{$_GET['page']}}@endisset</strong>
            </div>
            <div class="card-body">
                <table id="datatablesSimple" class="table table-hover table-bordered align-middle">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Is admin</th>
                        <th>Created at</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>@if($user->is_admin == 1) <i class="bi bi-person-circle"></i> @endif</td>
                            <td>{{$user->created_at}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div>
                    {{$users->links()}}
                </div>
            </div>
        </div>
    </div>
@endsection
