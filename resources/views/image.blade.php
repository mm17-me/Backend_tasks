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
<div class="container">
  <form action="{{ route('imageUpload') }}" method="post" enctype="multipart/form-data">
    @csrf
  <div class="form-group">
      <input type="file" class="form-control"  name="image">
    </div>
    <div class="form-group">
      <input type="submit" class="form-control"  value="upload">
    </div>
 </form>
</div>

</body>
</html>