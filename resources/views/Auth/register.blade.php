<!-- Bootstrap and Fontawesome because i dont want headers in my login page -->
<script src="https://kit.fontawesome.com/627d8294ec.js" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>

@section('title', 'Listify')
<div class="bg-dark py-5" style="height:100vh;">
  <h1 style="font-size: 4rem;" class="text-white fw-bold text-center"><i class="fa-solid fa-list me-1" style="color: #ffffff; font-size: 3.5rem;"></i>Listify</h1>
  <div class="col-md-3 mx-auto my-5">
    <div class="card">
      <div class="card-header text-center fs-2 fw-bold">
        Welcome!
      </div>
      <div class="alert alert-warning alert-dismissible start-50 translate-middle fade show position-absolute" role="alert">
        You have logged out!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      <div class="card-body">
        <form method="POST" action="{{ route('register')}}">
          @csrf

          @if (session()->has('error_message'))
          <div class="alert alert-danger">{{ session()->get('error_message') }}</div>
          @endif
          <div class="mb-3">
            <label for="name" class="form-label">Username</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
            @if($errors->has('name'))
            <small class="text-danger">{{$errors->first('name')}}</small>
            @endif
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control" id="emailInput" aria-describedby="emailHelp" name="email" value="{{ old('email') }}">
            @if($errors->has('email'))
            <small class="text-danger">{{$errors->first('email')}}</small>
            @endif
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" id="passwordInput" name="password">
            @if($errors->has('password'))
            <small class="text-danger">{{$errors->first('password')}}</small>
            @endif
          </div>
          <div class="mb-3">
            <label for="password_confirmation" class="form-label">Confirm Password</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
          </div>
          <div class="text-center">
            <button type="submit" class="btn btn-warning">Register</button>
            <h5>or</h5>
            <a href="{{ url('login')}}" class="btn btn-dark">Login</a>
          </div>
      </div>
      </form>
    </div>

  </div>

</div>
</div>