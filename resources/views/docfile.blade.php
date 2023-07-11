@include('layouts.header')
@include('layouts.nav')

<div class="container my-4">
    <h1 class="text-success fw-bold">Your Documents</h1>
    <div class="table-responsive my-4">

           @if (!$data->isEmpty())           
         
        <table class="table ">
            <thead class="table-success">
                <tr>    
                    <th scope="col">File Name</th>
                    <th scope="col">Decription</th>
                    <th scope="col">Action</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item) 
                <tr class="">
                    <td scope="row">{{$item->name}}</td>
                    <td>{{$item->desc}}</td>
                    <td> 
                        <a href="{{url('/view' , $item->id)}}"> <button class="btn btn-primary">View</button> </a>
                        <a  href="{{url('/download' , $item->file)}}"> <button class="btn btn-success">Download</button> </a>
                    </td>
                    <td>
                        <a href="{{url('/delete' , $item->id)}}"> <button class="btn btn-danger">delete</button> </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>              
          @else
          <h1 class="text-danger text-center">No Data found</h1>
          @endif
    </div>
    
</div>  
@include('layouts.footer')