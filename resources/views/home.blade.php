<div class="vh-100">

  @include('layouts.header')
  @include('layouts.Nav')
  <div class="container d-flex align-items-center justify-content-center h-75 flex-column">
    <h1 class="text-danger fw-bold" style="font-size: 3.5em">Welcome to PDF Uploader</h1>
    <p class="w-75 text-center fs-5">Upload your important and useful docuement on cloud it is one of the secured platform which provides and access to get docuement over the network</p>
    <a href="{{url("/upload")}}">
      <button class="btn btn-danger">Upload Your Docs</button>
    </a>
  </div>
  
  @include('layouts.Footer')
</div>
