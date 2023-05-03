@section('title', 'Forgot Password')
<!-- Bootstrap and Fontawesome because i dont want headers in my login page -->
<script src="https://kit.fontawesome.com/627d8294ec.js" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>


<div class="bg-dark py-5" style="height:100vh;">
  <h1 style="font-size: 4rem;" class="text-white text-center display-1">Listify</h1>
  <div class="col-md-3 mx-auto my-5">
    <div class="card">
      <div class="card-header text-center display-6">
        Forgot Password
      </div>
      <div class="card-body">
        @if (session('status'))
        <div class="alert alert-success">
          {{ session('status')}}
        </div>
        @endif
        <form method="POST" action="{{ route('password.email') }}">
          @csrf

          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control" id="emailInput" aria-describedby="emailHelp" name="email">
            @if($errors->has('email'))
            <small class="text-danger">wrong email</small>
            @endif
          </div>

          <div class="text-center d-grid">
            <button type="submit" class="btn btn-dark">Send Link</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>