@extends('layout.admin_app')

@section('content')
<div class="bg-white boxer container mt-3">
    <h3 class="h3">Seller Requests</h3>
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
    <div class="table-responsive">
    <table class="table table-borderless table-hover table-md table-lg table-responsive" style="overflow-x:auto">
       <thead>
            <tr>
                <th class="text-center">No. </th>

                <th class="text-center">Name</th>
                <th class="text-center">UserName</th>
                <th class="text-center">Email</th>
                <th class="text-center">Added</th>
                <th class="text-center">Certificates</th>
                <th class="text-center">Action</th>
            </tr>
       </thead>
        <tbody>
          @if(count($request) > 0)
          @php
          $counter = 0;
      @endphp
          @foreach ($request as $row)
          <tr>
          <td class="text-center">{{++$counter}}</td>
            <td class="text-center" scope="row">{{$row->name}}</td>
            <td class="text-center" scope="row">{{$row->user}}</td>
             <td class="text-center" scope="row">{{$row->email}}</td>
             <td class="text-center" scope="row">{{$row->created_at}}</td>
          <td class="text-center" scope="row"><a href="{{asset($row->file)}}" download>
            <i class="fa fa-download" style="font-size:48px;color:red"></i>
              </a>
              </td>
             <td class="text-center" scope="row">
             <a href="{{route('reject_researcher',array('id'=>$row->id))}}" class="btn-theme-border"> Reject </a>
                 <a href="{{route('accept_researcher',array('id'=>$row->id))}}" class="btn-theme"> Accept </a>
                </td>

          </tr>
          @endforeach
          @else
          No Record Found
          @endif
        </tbody>
      </table>
    </div>
</div>
@endsection
