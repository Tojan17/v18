<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Information</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"> </head>
  <body>

    <div class="container mt-5">
        <h1>Your Name And Date Of Bairth</h1>

        <br>
        <br>

        <form action="{{ route('user_data') }}" method="POST">
            @csrf
            <div>
                <label>Name</label>
                <input type="text" name="name" placeholder="" class="form-control">
            </div>

            <br>

            <div>
                <label>Age</label>
                <input type="date" name="age" placeholder="" class="form-control">
            </div>

            <br>

            <button class="btn btn-success">Send</button>

        </form>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
