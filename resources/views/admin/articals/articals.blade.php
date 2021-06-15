@extends('layout.admin_app')

@section('content')
<div class="bg-white boxer container mt-3">
    <div class="row">
        <div class="col-8">
    <h3 class="h3">Create New Artical</h3>

        </div>
        <div class="col-4">
        <a href="{{route('articals.create')}}" class="btn-theme mt-4">Create Artical</a>
        </div> 
    </div>
</div>
<div class="bg-white boxer container mt-3">
    <h3 class="h3">Articals List</h3>
    <center><div>
    @if(Session::has('success'))
    <p class="col-lg-4 col-md-4 col-sm-4 col-xs-4 alert {{ Session::get('alert-class', 'alert-success') }}">
    {{ Session::get('success') }} </p>
    @endif
    @if(Session::has('error'))
    <p class="col-lg-4 col-md-4 col-sm-4 col-xs-4 alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('error') }}</p>
    @endif
    </div></center>
    <table class="table table-borderless table-md table-lg">
       <thead>
            <tr>
                <th class="text-center">No. </th>
                <th class="text-center">Image</th>
                <th class="text-center">Title</th>
                <th class="text-center">Descrption</th>
                <th class="text-center">Created Date</th>
                <th class="text-center">Action</th>
            </tr>
       </thead>
        <tbody>

            @if(count($events) > 0)
            @php
                $counter = 0;
            @endphp
            @foreach($events as $row)
          <tr>
              <td class="text-center">{{++$counter}}</td>
          <td class="text-center" scope="row"> <img src="{{asset('image/'.$row->image)}}" width="50" height="40" alt=""> </td>
            <td class="text-center" scope="row">{{$row->title}}</td>
            <td class="text-center" scope="row">{{$row->description}}</td>
             <td class="text-center" scope="row">{{$row->created_at}}</td>
             <td class="text-center" scope="row">
                 <div class="row">
                 <div class="col-6"> <a href="{{route('articals.edit',array('artical'=>$row->id))}}" class="btn-theme-border"> Edit </a> </div>
                     <a href="{{route('articals.destroy',array('artical'=>$row->id))}}" class="btn-theme"> Delete </a>
                    </div>
                </div>
                </td>

          </tr>
          @endforeach
         @else
          No Record Found
         @endif

        </tbody>
      </table>
</div>
@endsection
