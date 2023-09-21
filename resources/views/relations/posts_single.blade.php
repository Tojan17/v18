<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <title>All Posts</title>


</head>

<body>
    <div class="container my-5 text-center">
        <h1 class="text-center mb-4">{{ $post->title }}</h1>
        <img src="{{ $post->image }}" alt="">

        <p class="mt-5">{{ $post->body }}</p>

        @foreach ($post->tags as $tag)
        <a href="{{ route('relation.posts_tag', $tag->id) }}" class="badge bg-dark">{{ '#'.$tag->name }}</a>

        @endforeach


        <hr>

        <h4 id="comments_id">All Comments ( {{ $post->comments_count }} )</h4>

        <div class="text-start">

            @foreach ($post->comments as $comment)

                <h6>{{ $comment->user->name }}</h6>
                <p>{{ $comment->body }}</p>
            @endforeach
        </div>



    </div>

</body>

</html>
