<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    <div class="container my-5" >
        <h1>Register Form</h1>
        {{-- @dump($errors->any()) --}}

        @if($errors->any())

        <div class="alert alert-danger">
            <ul>
                {{-- عبارة عن array  السطر التالي --}}
                @foreach ($errors->all() as $error )
                <li>
                    {{ $error }}
                </li>
                @endforeach
            </ul>
        </div>

        @endif
        <form action="{{ route('form2_data') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label">First Name</label>
                <input type="text" class="form-control" placeholder="" name="first_name">
            </div>

            <div class="mb-3">
                <label">Last Name</label>
                <input type="text" class="form-control" placeholder="" name="last_name">
            </div>

            <div class="mb-3">
                <label">Email</label>
                <input type="email" class="form-control" placeholder="" name="email">
            </div>

            <div class="mb-3">
                <label">Password</label>
                <input type="password" class="form-control" placeholder="" name="password">
            </div>


            <div class="mb-3">
                <label">Confirm Password</label>
                <input type="password" class="form-control" placeholder="" name="password_confirmation">
            </div>

            <button class="btn btn-dark px-3">Register</button>

        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
