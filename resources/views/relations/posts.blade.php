<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <title>All Posts</title>

    <style>
        .card-title{
            height: 48px;
        }
        .card-text{
            height: 72px;
        }
    </style>

</head>
<body>
    <div class="container my-5 mb-4">
        <h1 class="text-center mb-4">All Posts</h1>
        <div class="row">
            @foreach ($posts as $post)
            <div class="col-md-3 mb-4">
                <div class="card">
                    <img src="{{ $post->image }}" class="card-img-top" alt="{{ $post->title }}">
                    <div class="card-body">
                      <h5 class="card-title">{{ $post->title }}</h5>
                      <b><i class="fas fa-user"></i> {{ $post->user->name }}</b>
                      <br>
                      {{-- <b><i class="fas fa-comments"></i> {{ $post->comments->count() }} Comments</b> --}}
                      <b><a href="{{ route('relation.posts_single', $post->id) }}#comments_id"><i class="fas fa-comments"></i> {{ $post->comments_count }} Comments</a></b>
                      <p class="card-text">{{ Str::words($post->body, 10, '...') }}</p>
                      <a href="{{ route('relation.posts_single', $post->id) }}" class="btn btn-dark w-100">Read More..</a>
                    </div>
                  </div>
            </div>
            @endforeach

        </div>
        {{ $posts->links() }}
    </div>

</body>
</html>
