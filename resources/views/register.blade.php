@include('layouts.header')
<div class="d-flex align-items-center justify-content-center" style="height: 100vh">
  <div class="Small shadow p-4" style="width: 300px;" > 
    <form action="{{url('/register')}}" class="" method="POST">
      @csrf
      <h2 class="text-primary mb-3">SIGN UP</h2>
      <div class="mb-3">
        <input type="text" class="form-control" name="name" id="name" a ria-describedby="helpId" placeholder="Enter your name">
        <span class="text-danger">@error('name')
        {{"* ".$message}}
        @enderror</span>
      </div>
      <div class="mb-3">
        <input type="email" class="form-control" name="email" id="email" aria-describedby="helpId" placeholder="Enter your email">
        <span class="text-danger">@error('email')
          {{"* ".$message}}
          @enderror</span>
        </div>
        <div class="mb-3">
          <input type="password" class="form-control" name="password" id="password" aria-describedby="helpId" placeholder="Enter your password">
          <span class="text-danger">@error('password')
            {{"* ".$message}}
            @enderror</span>
          </div>
          <div class="mb-3">
            <input type="password" class="form-control" name="password_confirmation" id="cpassword" aria-describedby="helpId" placeholder="confirm password">
            <span class="text-danger">@error('password_confirmation')
              {{"* ".$message}}
              @enderror</span>
            </div>
            <span> have an account? <a href="{{route('login')}}" class="text-dark">Login</a></span>  
            <div class="my-3" >
              <button type="submit" style="width: 100%" class="btn btn-primary">Sign Up</button>
            </div>
          </form>
          <a href="{{route('google-auth')}}" >
            <button class="btn btn-danger" style="width: 100%"> Login with google</button>
          </a>
        </div>
      </div>
      
      
      @include('layouts.Footer')
  <!-- Bootstrap JavaScript Libraries -->
  