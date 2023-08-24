<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All Courses</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}

</head>

<body>


    <div class="container my-5">
        <h1 class="text-center m-5">All Courses</h1>

        <div class="d-flex align-items-center mb-2">
            <p class="m-0">Sort By</p>
            <form class="mx-2 d-flex" action="{{ route('courses.index') }}" method="GET">

                @if (request()->has('page'))
                    <input type="hidden" name="page" value="{{ request()->page }}">
                @endif

                <select name="column" class="form-select">
                    <option @selected(request()->column == 'id') value="id">ID</option>
                    <option @selected(request()->column == 'name') value="name">Name</option>
                    <option @selected(request()->column == 'price') value="price">Price</option>
                    <option @selected(request()->column == 'created_at') value="created_at">Created At</option>
                </select>

                <select name="type" class="form-select mx-2">
                    <option @selected(request()->type == 'asc') value="asc">ASC</option>
                    <option @selected(request()->type == 'desc') value="desc">DESC</option>
                </select>

                <button class="btn btn-primary">Sort</button>
                {{-- btn-sm --}}
            </form>

        </div>


        <table class="table table-bordered table-hover table-striped">
            <tr class="table-dark ">
                <th>ID</th>
                <th>Image</th>
                <th>Name</th>
                <th>Price</th>
                <th>Hours</th>
                <th>Status</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Actions</th>
            </tr>

            @foreach ($courses as $course)
                <tr>
                    <td>{{ $course->id }}</td>
                    <td><img width="100" src="{{ $course->image }}" alt=""></td>
                    <td>{{ $course->name }}</td>
                    <td>${{ $course->price }}</td>
                    <td>{{ $course->hours }}</td>
                    <td>{{ $course->status }}</td>
                    <td>{{ $course->created_at }}</td>
                    <td>{{ $course->updated_at }}</td>
                    <td>
                        <a href="">Edie</a>
                        <a href="">Delete</a>
                    </td>
                </tr>
            @endforeach


        </table>

        {{ $courses->links() }}
    </div>







    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
</body>

</html>
