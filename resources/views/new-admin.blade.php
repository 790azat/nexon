<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard - SB Admin</title>
    <link rel="icon" type="image/x-icon" href="{{asset('orange.png')}}">
    @include('scripts')
    @vite(['resources/sass/app.scss','resources/js/app.js'])
    <style>
        a {color: white !important;}
        .hover-underline:hover {
            text-decoration: underline !important;
        }
    </style>
</head>
<body class="sb-nav-fixed">
<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3" href="/new-admin">
        <img src="{{asset('orange.png')}}" style="width: 30px;height: 30px" alt="">
            Nexon
    </a>
    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
    <!-- Navbar Search-->
    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
        <div class="input-group">
            <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
            <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
        </div>
    </form>
    <!-- Navbar-->
    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i> {{Auth::user()->name}}</a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item text-dark" href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">Log out</a></li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </ul>
        </li>
    </ul>
</nav>
<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">Core</div>
                    <a class="nav-link" href="/new-admin">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard
                    </a>
                    <div class="sb-sidenav-menu-heading">Interface</div>
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Layouts
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="layout-static.html">Static Navigation</a>
                            <a class="nav-link" href="layout-sidenav-light.html">Light Sidenav</a>
                        </nav>
                    </div>
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                        <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                        Pages
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                Authentication
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="login.html">Login</a>
                                    <a class="nav-link" href="register.html">Register</a>
                                    <a class="nav-link" href="password.html">Forgot Password</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                Error
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="401.html">401 Page</a>
                                    <a class="nav-link" href="404.html">404 Page</a>
                                    <a class="nav-link" href="500.html">500 Page</a>
                                </nav>
                            </div>
                        </nav>
                    </div>
                    <div class="sb-sidenav-menu-heading">Addons</div>
                    <a class="nav-link" href="charts.html">
                        <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                        Charts
                    </a>
                    <a class="nav-link" href="tables.html">
                        <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                        Tables
                    </a>
                </div>
            </div>
            <div class="sb-sidenav-footer">
                <div class="small">Logged in as:</div>
                {{Auth::user()->name}}
            </div>
        </nav>
    </div>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Dashboard</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active"><p>All items count: <span class="fw-bold">{{count(\App\Models\Item::all())}}</span></p></li>
                </ol>
                <div class="row">
                    <div class="col-xl-3 col-md-6" type="button" data-bs-toggle="modal" data-bs-target="#addModal">
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
                        <div class="card bg-success text-white mb-4">
                            <div class="card-body"><i class="bi bi-plus-square me-1"></i> Add item</div>
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
                            <tfoot>
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
                            </tfoot>
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
            </div>
        </main>
        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid px-4">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright &copy; Your Website 2022</div>
                    <div>
                        <a href="#">Privacy Policy</a>
                        &middot;
                        <a href="#">Terms &amp; Conditions</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>

</body>
</html>

