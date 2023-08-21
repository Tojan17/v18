<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container my-5">
        <h1>Upload Form</h1>
        <form action="{{ route('form4_data') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label">Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror"  placeholder="Name"
                        name="name">

                    @error('name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
            </div>

            <div class="mb-3">
                <label">Image</label>
                    <input type="file" multiple class="form-control  @error('image') is-invalid @enderror" name="image[]">

                    @error('image')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
            </div>

            <button class="btn btn-success">Upload</button>

        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
