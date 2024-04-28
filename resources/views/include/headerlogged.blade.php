<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">E-Library</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{route('allBooks')}}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('UserBooks')}}">My Books</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('ShowProfile')}}">Profile</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#logout" data-toggle="modal">Logout</a>
        </li>
      </ul>
      <div id="logout" class="modal fade">
        <div class="modal-dialog custom-modal-dialog">
            <div class="modal-content">
                <form method="GET" action=" {{ route('logout') }}">
                    @csrf
                    @method('post')
                    <div class="modal-body">
                        <p class="text-danger" align="center"><big>Are you sure you want to logout?</big></p>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-success" data-dismiss="modal" value="Cancel">
                        <input type="submit" class="btn btn-danger" value="Logout"
                            onclick="showNotification('Goodbye')">
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
  </div>
</nav>