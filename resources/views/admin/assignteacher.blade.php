@extends('layout.admin_app')

@section('content')
<div class="bg-white boxer container mt-3" >
    <div class="row" style="float:right">
        <div class="col-8">
    <h3 class="h3"><a href="#" data-toggle="modal" data-target="#myModal" class="btn-theme mt-4"> Assign Projects </a></h3>

        </div>
    </div>
</div>
<div class="bg-white boxer container mt-3">
    <h3 class="h3">Group and Teachere List</h3>
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
                <th class="text-center">Group Name</th>  
                <th class="text-center">Teacher Name</th>
                <th class="text-center">Action</th>
            </tr>
       </thead>
        <tbody>

            @if(count($data) > 0)
            @php
                $counter = 0;
            @endphp
            @foreach($data as $row)
          <tr>
              <td class="text-center">{{++$counter}}</td>
         
            <td class="text-center" scope="row">{{$row->group_name}}</td>
   
             <td class="text-center" scope="row">{{$row->name}}</td>
             <td class="text-center" scope="row">
                 <div class="row">
                     <a href="{{route('assigns.destroy1',array('id'=>$row->id))}}" class="btn-theme"> Delete </a>
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
    <!-- Modal assign projects-->

    <div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>

      </div>
      <div class="modal-body">

        <form method="post" action="{{route('assignteacher')}}">
        @csrf
        <div class="form-group">
            <label><b>Select Group:</b></label>
            <select class="form-control" name="group">

<option>Select Group</option>
@php

$projects = \App\Group::all();
@endphp
@foreach ($projects as $key)
<option value="{{ $key->id }}">
    {{ $key->group_name }}
</option>
@endforeach
</select>
                </div>
                <div class="form-group">
            <label><b>Select Teacher:</b></label>
            <select class="form-control" name="teacher">

<option>Select Teacher</option>
@php

$user = \App\User::where('userRole','3')->get();
@endphp
@foreach ($user as $key)
<option value="{{ $key->id }}">
    {{ $key->email }}
</option>
@endforeach
</select>
                </div>
<center>  <button type="submit" name="add" id="add" class="btn btn-danger">Submit</button></center>
<br></form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
</div>


@endsection
