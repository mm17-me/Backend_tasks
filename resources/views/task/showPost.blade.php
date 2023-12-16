<!DOCTYPE html>
<html lang="en">
<head>
  <title>Show Post</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    @include('includes.postsNav')
    <h1>Title: {{ $post->title}}</h1>
    <h3>Author: {{ $post->author}}</h3>
    <p><b>Description</b> :{{ $post->description}}</p>
    <h5><b>Created At:</b> {{ $post->created_at}}</h5>
    <h5><b>Updated At:</b> {{ $post->updated_at}}</h5>
    {{ $post->published?"Published" : "Not Published"}}

</body>
</html>
