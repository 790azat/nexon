@extends('admin-layout')

@section('edit-categories')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Edit categories</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active"><p>All categories count: <span class="fw-bold">{{count(\App\Models\Category::all())}}</span></p></li>
        </ol>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/" class="text-dark hover-underline">Home</a></li>
                <li class="breadcrumb-item"><a href="/admin" class="text-dark hover-underline">Admin</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit categories</li>
            </ol>
        </nav>
        <div class="col-xl-3 col-md-6" type="button" data-bs-toggle="modal" data-bs-target="#addCategory">
            <div class="card bg-success text-white mb-4">
                <div class="card-body"><i class="bi bi-plus-square me-1"></i> Add Category</div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="addCategory" tabindex="-1" aria-labelledby="addCategory" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="addCategory">New category</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form enctype="multipart/form-data" action="/save-category" method="post" class="d-flex my-3 justify-content-center flex-wrap">
                            @csrf
                            <div class="d-flex justify-content-center align-items-start flex-wrap">
                                <div class="mb-3 col-10 mx-auto">
                                    <label for="exampleFormControlInput1" class="form-label">Category name</label>
                                    <input required type="text" class="form-control" id="exampleFormControlInput1" name="name">
                                </div>
                                <div class="mb-3 col-10 mx-auto">
                                    <label for="exampleFormControlInput2" class="form-label">Icon</label>
                                    <input required type="text" class="form-control" id="exampleFormControlInput2" name="icon">
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
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Item data table. @isset($_GET['page'])Page: <strong class="badge rounded-pill bg-primary">{{$_GET['page']}}@endisset</strong>
            </div>
            <div class="card-body">
                <table id="datatablesSimple" class="table table-hover table-bordered align-middle">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Icon</th>
                        <th>Name</th>
                        <th>Count</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td class="col-auto">{{$category->id}}</td>
                            <td class="col-auto"><a href="/?category={{$category->name}}" class="text-dark hover-underline"><span class="badge bg-primary fs-5 me-2"><i class="bi bi-{{$category->icon}}"></i></span></a></td>
                            <td class="col-12"><a href="/?category={{$category->name}}" class="text-dark hover-underline">{{$category->name}}</td>
                            <td class="col-auto align-middle text-center"><span class="badge bg-primary rounded-pill">{{$category->items_count}}</span></td>
                            <td class="col-auto">
                                <button data-bs-toggle="modal" data-bs-target="#categoryDeleteModal{{$category->id}}" class="btn btn-outline-danger text-nowrap"><i class="bi bi-trash me-1"></i>Delete</button>
                                <!-- Modal -->
                                <div class="modal fade" id="categoryDeleteModal{{$category->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">{{$category->name}}</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Are you sure you want to delete this category ?
                                            </div>
                                            <div class="modal-footer">
                                                <a href="/delete/category/{{$category->id}}">
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
            </div>
        </div>
    </div>
@endsection
