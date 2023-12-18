<!DOCTYPE html>
<html lang="en">
<head>
  <title>Trashed Posts</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
@include('includes.postsNav')
<div class="container">
  <h2>Trashed Posts Table Of Content</h2>
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Title</th>
        <th>Created at</th>
        <th>Restore</th>
        <th>Force Delete</th>
      </tr>
    </thead>
    <tbody>

      @foreach($posts as $post)
      
      <tr>
        <td>{{ $post->title }}</td>
        <td>{{ $post->created_at}}</td>
        <td><a href="restorePost/{{ $post->id }}" onclick="return confirm('Are you sure you want to Restore It?')">Restore</a></td>
        <td><a href="forceDelete/{{ $post->id }}" onclick="return confirm('Are you sure you want to delete It Forever?')">Force Delete</a></td>
      </tr>

      @endforeach
    </tbody>
  </table>
</div>

</body>
</html>
