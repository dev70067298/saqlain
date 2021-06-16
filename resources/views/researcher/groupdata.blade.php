@extends('layout.researcher_app')

@section('content')


<div class="bg-white boxer container mt-3">
 <div class="bg-white boxer container mt-3">   
   <label><h3> Project Title: </h3></label> <p>{{$gp[0]->title}}</p>
    
    <label><h3> Project Description:</h3> </label>    <p>{{$gp[0]->description}}</p>
    </div>
    <center><div>
    @if(Session::has('success'))
    <p class="col-lg-4 col-md-4 col-sm-4 col-xs-4 alert {{ Session::get('alert-class', 'alert-success') }}">
    {{ Session::get('success') }} </p>
    @endif
    @if(Session::has('error'))
    <p class="col-lg-4 col-md-4 col-sm-4 col-xs-4 alert {{ Session::get('alert-class', 'alert-danger') }}">
        {{ Session::get('error') }}</p>
    @endif
</div></center>
<h3>Student List</h3>
    <table class="table table-borderless table-hover table-md table-lg mt-5">
       <thead>
            <tr>
                <th class="text-center">Student Name</th>
                <th class="text-center">Student Email</th>
            </tr>
       </thead>
        <tbody>
            @if(count($student) > 0)
            @foreach ($student as $row)
          <tr>
          <td class="text-center" scope="row">{{$row->name}}</td>
          <td class="text-center" scope="row">{{$row->email}}</td>

          </tr>
          @endforeach
         @else
         No Record Found
         @endif

        </tbody>
      </table>
</div>



@endsection
