<nav class="navbar navbar-expand-sm navbar-light Regular shadow" style="background: ghostwhite">
    <span class="navbar-brand mx-3" >PDF UPLOADER</span>
    <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId"
        aria-expanded="false" aria-label="Toggle navigation"></button>
    <div class="collapse navbar-collapse" id="collapsibleNavId">
        <ul class="navbar-nav me-auto mt-2 mt-lg-0">
            <li class="nav-item">
                <a class="nav-link active" href="{{url("/home")}}" aria-current="page">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{url("/upload")}}">Upload documents</a>
            </li>
            <li class="nav-item">
                    <a class="nav-link" href="{{url("/showdocuments")}}">Documents</a>
            </li>
        </ul>
        <div class="d-flex align-items-center justify-content-center mx-2 my-lg-0">
            <h4 class="text-primary my-2">Welcome {{session('username.name')}}</h4>
            <a href="{{url('/logout')}}"><button class="btn btn-danger mx-4">Log Out</button></a> 
        </div>
    </div>
</nav>