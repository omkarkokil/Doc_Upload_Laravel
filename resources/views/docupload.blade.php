<div class="vh-100">
@include('layouts.header')
@include('layouts.nav')

<div class="container d-flex align-items-center justify-content-center h-75 flex-column my-4">
    <h1 class="text-primary fw-bold">Upload Your Documents</h1> 
    <form action="{{url("/uploadFile")}}" method="POST" enctype="multipart/form-data" class="my-4">
        @csrf
        <div class="mb-3">
          <label for="" class="form-label">Add file Name</label>
          <input type="text"
            class="form-control" name="name" id="" aria-describedby="helpId" placeholder="Enter file name">
        </div>
        <div class="mb-3">
          <label for="" class="form-label">Add description</label>
          <input type="text"
            class="form-control" name="desc" id="" aria-describedby="helpId" placeholder="Enter description">
        </div>
        <div class="mb-3">
          <label for="" class="form-label">Add description</label>
          <input type="file" class="form-control" name="file" id="" aria-describedby="helpId" placeholder="Add your document">
          <span class="text-danger">@error('file')
              {{"* ".$message}}
              @enderror</span>
        </div>
      
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</div>
@include('layouts.footer')