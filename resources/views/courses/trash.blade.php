<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Trashed Courses</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />

</head>

<body>
    <div class="container my-5">
        <h1 class="text-center mb-4">Trashed Courses</h1>

        @if (session('msg'))
            <div class="alert alert-{{ session('type') }} alert-dismissible fade show"">
                {{ session('msg') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

            </div>
        @endif


        <a href="{{ route('courses.index') }}" class="btn btn-primary mb-3"><i class="fas fa-laptop"></i> All
            Courses</a>

        <table class="table table-bordered table-hover table-striped">
            <tr class="table-dark ">
                <th>ID</th>
                <th>Name</th>
                <th>Deleted At</th>
                <th>Actions</th>
            </tr>

            @forelse ($courses as $course)
                <tr>
                    <td>{{ $course->id }}</td>
                    <td>{{ $course->name }}</td>
                    <td>{{ $course->deleted_at->diffForHumans() }}</td>
                    <td>
                        <a class="btn btn-sm btn-primary" href="{{ route('courses.restore', $course->id) }}">
                            <i class="fas fa-undo"></i></a> {{-- edit --}}

                        <form class="d-inline" action="{{ route('courses.forcedelete', $course->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button onclick="return confirm('Are you sure, you can\'t rollback?!')"
                                class="btn btn-sm btn-danger"><i class="fas fa-times"></i></button>
                            {{-- trash --}}
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td class="text-center" colspan="4">No Trashed Course!</td>
                </tr>
            @endforelse

            {{-- @if ($courses->count() > 0)
                @foreach ($courses as $course)
                    <tr>
                        <td>{{ $course->id }}</td>
                        <td>{{ $course->name }}</td>
                        <td>{{ $course->deleted_at->diffForHumans() }}</td>
                        <td>
                            <a class="btn btn-sm btn-primary" href="{{ route('courses.restore', $course->id) }}">
                                <i class="fas fa-undo"></i></a>

                            <form class="d-inline" action="{{ route('courses.forcedelete', $course->id) }}"
                                method="POST">
                                @csrf
                                @method('delete')
                                <button onclick="return confirm('Are you sure, you can\'t rollback?!')"
                                    class="btn btn-sm btn-danger"><i class="fas fa-times"></i></button>

                            </form>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td class="text-center" colspan="4">No Trashed Course!</td>
                </tr>
            @endif --}}

        </table>

        {{-- {{ $courses->links() }} --}}
        {{-- {{ $courses->appends(['moh' => 20])->links() }} --}}
        {{ $courses->appends($_GET)->links() }}

        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>

    <script>
        if ($('.alert').length != 0) {
            setTimeout(() => {
                console.log("Done");
                $('.alert').fadeOut();

            }, 3000);
        }
    </script>
</body>

</html>
