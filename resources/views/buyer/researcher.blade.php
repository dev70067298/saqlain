@extends('layout.buyer_app')

@section('content')
<div class="bg-white boxer container mt-3">
<h3 class="h3 text-center mt-5">Seller List</h3>
<center><div>
    @if(Session::has('success'))
    <p class="offset-lg-4 offset-md-4 col-lg-4 col-md-4 col-sm-4 col-xs-4 alert {{ Session::get('alert-class', 'alert-success') }}">
    {{ Session::get('success') }} </p>
    @endif
    @if(Session::has('error'))
    <p class="offset-lg-4 offset-md-4 col-lg-4 col-md-4 col-sm-4 col-xs-4 alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('error') }}</p>
    @endif
    </div></center>

    <div class="table-responsive">
        <table class="table table-borderless table-hover table-md table-lg">
            <thead>
                 <tr>
                     <th class="text-center">No. </th>
                     <th class="text-center">Image</th>
                     <th class="text-center">Name</th>
                     <th class="text-center">Email</th>
                     <th class="text-center">Action</th>
                 </tr>
            </thead>
             <tbody>
                 @if(count($researcher) > 0)
                 @php
                 $counter = 0;
             @endphp
                 @foreach ($researcher as $row)
               <tr>
                   <td class="text-center" style=" padding: 30px 0;">{{++$counter}}</td>
               <td class="text-center" scope="row"> <img src="{{asset('image/'.$row->image)}}"  class="profile-image mx-auto d-block img-fluid">
               </td>
               <td class="text-center" style=" padding: 30px 0;" scope="row">{{$row->name}}</td>
                <td class="text-center" scope="row" style=" padding: 30px 0;">{{$row->email}}</td>
                <td class="text-center" scope="row" style=" padding: 30px 0;">
                   <a href="{{route('service_list',array('id'=>$row->id))}}" class="btn-theme-border"> Products </a>
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
