@section('CSS')
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <meta name="viewport" content="width=device-width, initial-scale=1">
@endsection

@section('JS')
@endsection
@auth

    <div class="dashboard">
        <ul class="dashboard-buttons">
            <li><a href="" class="sidebarbutton">🏠 Home Page</a></li>
        </ul>
        @switch(Auth::user()->role_id)
            {{-- admin side bar --}}
            @case(1)
            <ul class="dashboard-buttons">
                <li><a href="" class="sidebarbutton">📚 Books</a></li>
            </ul>
            @break
            @case(2)
                <ul class="dashboard-buttons">
                    <li class="dropdown">
                        <hr style="border-color:rgb(141, 137, 137)">
                        <a onclick="toggleOptions('products')">📚 Books</a>
                        <hr style="border-color:rgb(141, 137, 137)">
                    </li>
                </ul>
            @break
            @default
        @endswitch
        <ul class="dashboard-buttons">
            <li><a href="" class="sidebarbutton">🧑 Profile</a></li>
            <li>
                <a class="sidebarbutton" href="#logout" data-toggle="modal">🚪 logout</a>
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
    @endauth
