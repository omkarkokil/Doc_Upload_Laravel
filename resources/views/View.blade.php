@include('layouts.header')
@include('layouts.nav')
<div class="vh-100">

    <iframe src="/assets/{{$data->file}}" height="100%" width="100%" frameborder="0"></iframe>
</div>

@include('layouts.footer')