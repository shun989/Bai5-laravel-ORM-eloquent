<!doctype html>
<html lang="en">
<head>
    <title>Danh sách Customer</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<style>
    .w-5{
        display: none;
    }
    p{
        margin-top: 10px;
    }
</style>
<body>
<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                           data-bs-toggle="dropdown" aria-expanded="false">
                            Dropdown
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                    </li>
                </ul>
                <form class="d-flex" method="post" action="">
                    <input class="form-control me-2" type="search" placeholder="Search" name="search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
</div>

<div class="container">
    <a class="btn btn-primary" href="{{route('customers.createForm')}}">Create Customer</a>
    <a class="btn btn-success" href="{{ route('students.list') }}">Students List</a>
    <a class="btn btn-success" href="{{ route('users.list') }}">Users List</a>
    <h1>Danh Sách Khách Hàng</h1>
    <table class="table table-striped table-hover">
        <thead>
        <tr>
            <th scope="col">STT</th>
            <th scope="col">customerNumber</th>
            <th scope="col">Customer Name</th>
            <th scope="col">contactLastName</th>
            <th scope="col">contactFirstName</th>
            <th scope="col">phone</th>
            <th scope="col">addressLine</th>
            <th scope="col">city </th>
            <th scope="col">country</th>
            <th colspan="2">Thao tác</th>
        </tr>
        </thead>
        <tbody>
        @if(count($customers) == 0)
            <tr>
                <td colspan="10">No data</td>
            </tr>
        @else
            @foreach($customers as $key => $customer)
                <tr>
                    <th scope="row">{{ ++$key }}</th>
                    <td>{{ $customer->customerNumber }}</td>
                    <td>{{ $customer->customerName }}</td>
                    <td>{{ $customer->contactLastName }}</td>
                    <td>{{ $customer->contactFirstName }}</td>
                    <td>{{ $customer->phone }}</td>
                    <td>{{ $customer->addressLine1 }}</td>
                    <td>{{ $customer->city }}</td>
                    <td>{{ $customer->country }}</td>
                    {{--                    <td><a class="btn btn-primary" href="">Detail </a></td>--}}
                    <td><a class="btn btn-warning" href="">Edit</a></td>
                    <td><a class="btn btn-danger" href="">Delete</a></td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
    {{$customers->links()}}
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>
</html>

