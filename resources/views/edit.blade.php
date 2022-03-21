<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update</title>
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

    <h4 class="text-center">update</h4>

    <form action="{{url('update')}}" method="POST" enctype="multipart/form-data" autocomplete="off">
        @csrf
    <div class="mb-3">
        <label class="form-label">name</label>
        <input type="text" class="form-control" value="{{$data->name}}" name="name">
        <div class="form-text">required</div>
    </div>
    <div class="row">
    <div class="col">
        <div class="mb-3">
            <label class="form-label">email</label>
            <input type="email" class="form-control" value="{{$data->email}}" name="email">
            <div class="form-text">required</div>
        </div>
    </div>
    <div class="col">
        <div class="mb-3">
            <label class="form-label">password</label>
            <input type="password" class="form-control" value="{{$data->password}}" name="password">
            <div class="form-text">required</div>
        </div>
    </div>
    </div>
    <div class="row">
    <div class="col">
        <div class="mb-3">
            <label class="form-label">address</label>
            <input type="address" class="form-control" value="{{$data->address}}" name="address">
        </div>
    </div>
    <div class="col">
        <div class="mb-3">
            <label class="form-label">phone</label>
            <input type="phone" class="form-control" value="{{$data->phone}}" name="phone">
        </div>
    </div>
    </div>
    <div class="row">
    <div class="col">
        <div class="mb-3">
            <label class="form-label">age</label>
            <input type="number" class="form-control" value="{{$data->age}}" name="age">
        </div>
    </div>
    <div class="col">
        <div class="mb-3">
            <label class="form-label">image</label>
            <input class="form-control" type="file" name="image">
        </div>
    </div>
    </div>
    <div class="row">
    <div class="col">
        <div class="mb-3">
        <button type="submit" class="btn btn-primary">update</button>
        </div>
    </div>
    <div class="col">
    <div class="mb-3 mx-auto w-50">
            <img class="img-fluid" src='{{asset("upload/$data->image")}}' alt="">
        </div>
    </div>
    </div>
    <input type="hidden" class="form-control" value="{{$data->id}}" name="id">
    </form><!-- end form -->

    </div><!-- end container -->

    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
</body>
</html>