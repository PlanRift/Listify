<header class="p-3 text-bg-dark">
  <div class="container">
    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
      <h3 class="display-5 fs-2">Listify</h3>

      <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
      </ul>

      <div class="text-end">
        @guest
        <a href="{{ route("login")}}" class="btn btn-outline-light me-2">Login</a>
        <a href="{{ route("register")}}" class="btn btn-outline-light me-2">Register</a>
        @else
        <div class="dropdown">
          <button class="btn btn-dark dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            {{ Auth::user()->name}}
          </button>
          <ul class="dropdown-menu dropdown-menu-dark">
            <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('form-logout').submit();">Logout</a></li>

            <form action="{{ route('logout') }}" method="post" id="form-logout">
              @csrf
            </form>
          </ul>
        </div>
        @endguest
      </div>
    </div>
  </div>
</header>