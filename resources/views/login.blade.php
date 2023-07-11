 @include('layouts.header')
    <div class="d-flex align-items-center justify-content-center" style="height: 100vh">
      <div class="Small shadow p-4"> 
      <form action="{{url('/')}}" class="" method="post">
        @csrf
        <h2 class="text-primary mb-3">SIGN IN</h2>
        
        <div class="mb-3">
          <input type="email" class="form-control" name="email" id="email" aria-describedby="helpId" placeholder="Enter your email">
        </div>
        <div class="mb-3">
          <input type="password" class="form-control" name="password" id="password" a ria-describedby="helpId" placeholder="Enter your password">
        </div>
        <span>Don't have an account? <a href="{{route('register')}}" class="text-dark">Register</a></span>  
        <div class="my-3" >
          <button type="submit" style="width: 100%" class="btn btn-primary">Log In</button>
        </div>
      </form>
      <a href="{{route('google-auth')}}" >
        <button class="btn btn-danger" style="width: 100%"> <i class="bi bi-airplane-engines-fill"></i>Login with google</button>
      </a>
      </div>
    </div>

  @include('layouts.Footer')