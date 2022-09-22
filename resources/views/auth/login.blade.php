<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Login</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5 w-50">
        <div class="card">
            @if (session()->has('message'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>{{session()->get('message')}}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
  
            <div class="card-header bg-dark text-white text-center">
                <h5>Login Form</h5>
            </div>
            <div class="card-body">
                <form action="{{url('/admin/login')}}" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" value="{{old('email')}}">
                    </div>
                    <div class="form-group mb-3">
                        <label for="" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control">
                    </div>
                    <input type="submit" class="btn btn-primary me-1" value="Login">
                </form>
            </div>
        </div>
    </div>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>
</html>