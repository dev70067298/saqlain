
@extends('layout.buyer_app')

@section('content')


<div class="bg-white boxer container mt-3">
 <div class="bg-white boxer container mt-3">   
   <div class="col-md-12">
   <div class="row">
   <div class="col-md-6">
   <label><h3> Project Title: </h3></label> <p>{{$gp[0]->title}}</p>
    
    <label><h3> Project Description:</h3> </label>    <p>{{$gp[0]->description}}</p>
    </div>
    <div class="col-md-6">
   <label><h3> Teacher Name: </h3></label> <p>{{$teacher[0]->name}}</p>
    
    <label><h3> Teacher Email:</h3> </label>    <p>{{$teacher[0]->email}}</p>
    </div>
    </div>
    </div>
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
<h3>Group Content</h3>
    <table class="table table-borderless table-hover table-md table-lg mt-5">
       <thead>
            <tr>
                <th class="text-center">File</th>
            </tr>
       </thead>
        <tbody>
          <tr>
          <td class="text-center" scope="row">Here is Your Content</td>
    
          </tr>
    
        </tbody>
      </table>
</div>



@endsection
