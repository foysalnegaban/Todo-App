@extends("layouts.auth")
@section("style")
<style>
  html,
body {
  height: 100%;
}

.form-signin {
  max-width: 330px;
  padding: 1rem;
}

.form-signin .form-floating:focus-within {
  z-index: 2;
}

.form-signin input[type="email"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}

.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}
</style>

@endsection



@section("content") 

<main class="form-signin w-100 m-auto">
  <form method="POST" action="{{ route('postlogin') }}">
    @csrf
    <img class="mb-4" src="{{ asset("assets/image/images.svg") }}" alt="" width="72" height="57">
    <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
      @if(session()->has('craft'))
      <div class="alert alert-success">
        {{ session()->get('craft') }}
      </div>
      @endif

    <div class="form-floating">
      <input type="email" class="form-control" name="email" id="floatingInput" placeholder="name@example.com">
      <label for="floatingInput">Email address</label>
      @error('email')
      <span class="text-danger">{{ $message }}</span>
      @enderror
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="Password">
      <label for="floatingPassword">Password</label>
      @error('password')
      <span class="text-danger">{{ $message }}</span>
      @enderror
    </div>

    @if(session()->has('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}
    </div>
    @endif

    @if(session()->has('error'))    
    <div class="alert alert-danger">
      {{ session()->get('error') }}
    </div>
    @endif
    
    <button class="btn btn-primary w-100 py-2" type="submit">Sign in</button>
    <p class="mt-5 mb-3 text-body-secondary">&copy; 2017–2025</p>
  </form>
</main>

@endsection
