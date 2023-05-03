<!-- Bootstrap and Fontawesome because i dont want headers in my login page -->
<script src="https://kit.fontawesome.com/627d8294ec.js" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>

@section('title', 'Listify')
<div class="bg-dark py-5" style="height:100vh;">
<h1 style="font-size: 4rem;" class="text-white text-center display-1">Listify</h1>
  <div class="col-md-3 mx-auto my-5">
    <div class="card">
      <div class="card-header text-center display-6">
        Welcome Back!
      </div>
      <div class="card-body">
        <form method="POST" action="{{ url('login')}}">
          @csrf

          @if (session()->has('error_message'))
          <div class="alert alert-danger">{{ session()->get('error_message') }}</div>
          @endif
          
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control" id="emailInput" aria-describedby="emailHelp" name="email">
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" id="passwordInput" name="password">
            @if($errors->has('email'))
            <small class="text-danger">wrong email or password</small>
            @endif
          </div>
          
          <div class="text-center d-grid">
            <button type="submit" class="btn btn-dark">Login</button>
            <h5>or</h5>
            <a href="{{ url('register')}}" class="btn btn-warning">Register</a>
          </div>
        </form>
      </div>
    </div>
    <div class="alert alert-warning alert-dismissible fade show mt-3" role="alert">
            You have logged out!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
  </div>
</div>