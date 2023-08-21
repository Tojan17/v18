<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contact Us</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container my-5">
        <h1>Contact Us Form</h1>
        <form action="{{ route('contact_data') }}" method="POST" enctype="multipart/form-data">
            @csrf


            <div class="mb-3">
                <label">Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Name"
                        name="name">

                    @error('name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
            </div>


            <div class="mb-3">
                <label">Email</label>
                    <input name="email" type="email" class="form-control @error('email') is-invalid @enderror"
                        placeholder="Email">

                    @error('email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
            </div>


            <div class="mb-3">
                <label">Phone</label>
                    <input type="text" class="form-control @error('phone') is-invalid @enderror" placeholder="Phone"
                        name="phone">

                    @error('phone')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
            </div>


            <div class="mb-3">
                <label">Subject</label>
                    <input type="text" class="form-control @error('subject') is-invalid @enderror"
                        placeholder="Subject" name="subject">

                    @error('subject')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
            </div>

            <div class="mb-3">
                <label">Image</label>
                    <input type="file" multiple class="form-control  @error('image') is-invalid @enderror"
                        name="image">

                    @error('image')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
            </div>


            <div class="mb-3">
                <label">Message</label>
                    <textarea class="form-control @error('message') is-invalid @enderror" placeholder="Message"
                        name="message" rows="5">
                    </textarea>

                    @error('message')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
            </div>


            <button class="btn btn-success">Upload</button>

        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
