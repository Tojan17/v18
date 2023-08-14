{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css"
     rel="stylesheet">
    <title>Form 1</title>
</head>
<body>

    <div class="container mt-5 ms-5">
        <h1>Basic Form</h1>
        <form action="{{ route('form1_data') }}" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="mb-3">
                <label>Name</label>
                <input type="text" placeholder="Name" class="form-control">
            </div>

            <div class="mb-3">
                <label>Name</label>
                <input type="email" placeholder="Email" class="form-control">
            </div>

            <button class="btn btn-success">Send</button>
        </form>
    </div>

</body>
</html> --}}

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    <div class="container my-5" >
        <h1>Login Form</h1>
        <form action="{{ route('form1_data') }}" method="POST">
            @csrf
            {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}

            <div class="mb-3">
                <label">Email</label>
                <input type="email" class="form-control" placeholder="Email" name="email">
            </div>

            <div class="mb-3">
                <label">Password</label>
                <input type="password" class="form-control" placeholder="Password" name="password">
            </div>

            <button class="btn btn-success">Login</button>

        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
