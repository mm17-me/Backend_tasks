<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
@include('includes.nav')
<div class="container">
  <h2>Hover Rows</h2>
  <p>The .table-hover class enables a hover state on table rows:</p>            
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Title</th>
        <th>Description</th>
        <th>Published</th>
      </tr>
    </thead>
    <tbody>
      @foreach($cars as $car)
      <tr>
        <td>{{ $car->title }}</td>
        <td>{{ $car->description }}</td>
        <td>{{ $car->published }}</td>
        <td><a href="updateCar/{{ $car->id }}">Edit</a></td>
        <td><a href="showCar/{{ $car->id }}">Show</a></td>

      </tr>

      @endforeach
    </tbody>
  </table>
</div>

</body>
</html>
