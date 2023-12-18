<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Posts</a>
    </div>
    <ul class="nav navbar-nav">
          <li class="active"><a href="{{ route('posts') }}">Home</a></li>
          <li><a href="{{ route('addPost') }}">Add Post</a></li>
          <li><a href="{{ route('trashedPost') }}">Trashed</a></li>
          <li><a href="#">Page 1-3</a></li>
        </ul>
  </div>
</nav>