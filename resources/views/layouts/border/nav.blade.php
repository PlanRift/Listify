<header class="p-3 text-bg-dark">
  <div class="container">
    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
      <h3 class="fw-bold"><i class="fa-solid fa-list me-1" style="color: #ffffff;"></i>Listify</h3>

      <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
      </ul>

      <div class="text-end">
        <div class="dropdown">
          <button class="btn btn-dark dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            {{ Auth::user()->name}}
          </button>
          <ul class="dropdown-menu dropdown-menu-dark">
            <li><a class="dropdown-item" href="{{ ('login') }}">Logout</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</header>