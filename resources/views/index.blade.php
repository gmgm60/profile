<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
</head>
<body>
    
    <div class="container">

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
            </li>
        </ul>
        </div>
    </div>
    </nav><!-- end nav -->

    <h4 class="text-center">index</h4>

    <table class="table">
    <thead>
        <tr>
        <th scope="col">id</th>
        <th scope="col">name</th>
        <th scope="col">email</th>
        <th scope="col">phone</th>
        <th scope="col">show</th>
        <th scope="col">edit</th>
        <th scope="col">delete</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $user)
        <tr>
        <th scope="row">{{$user->id}}</th>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
        @isset($user->phone)
        <td>{{$user->phone}}</td>
        @endisset
        @empty($user->phone)
        <td>no data</td>
        @endempty
        <td><a class="btn btn-primary" href='{{url("show/$user->id")}}'>show</a></td>
        <td><a class="btn btn-warning" href='{{url("edit/$user->id")}}'>edit</a></td>
        <td><a class="btn btn-danger" href='{{url("destroy/$user->id")}}'>delete</a></td>
        </tr> 
        @endforeach

    </tbody>
    </table><!-- end table -->

    </div><!-- end container -->

    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
</body>
</html>