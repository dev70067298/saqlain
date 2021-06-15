@extends('layout.buyer_app')

@section('content')
<div class="bg-white boxer container mt-3">
<h3 class="h3 text-center mt-5">Product List</h3>
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
                     <th class="text-center">Product Image</th>
                     <th class="text-center">Seller</th>
                     <th class="text-center">Product Name</th>
                     <th class="text-center">Product Price</th>
                     <th class="text-center">description</th>
                     <th class="text-center">Action</th>
                 </tr>
            </thead>
             <tbody>
                 @if(count($services) > 0)
                 @php
                 $counter = 0;
             @endphp
                 @foreach ($services as $row)
               <tr>
                   @php
                       $provider=$row->provider;
                       $user=\App\User::find($provider);
                   @endphp
                   <td class="text-center" style=" padding: 30px 0;">{{++$counter}}</td>
               <td class="text-center" scope="row"> <img src="{{asset('image/'.$row->file)}}"  class="profile-image mx-auto d-block img-fluid">
               </td>
               <td class="text-center" style=" padding: 30px 0;" scope="row">{{$user->name}}</td>
               <td class="text-center" style=" padding: 30px 0;" scope="row">{{$row->service}}</td>
                <td class="text-center" scope="row" style=" padding: 30px 0;">{{$row->price}}</td>
                <td class="text-center" scope="row" style=" padding: 30px 0;">
                <a  data-toggle="modal" href="#description" id="{{$row->description}}" class="clicker btn-theme"> View </a>
                </td>

                <td class="text-center" scope="row" style=" padding: 30px 0;">
                   <a href="{{route('signal_list',array('service'=>$row->id,'researcher'=>$user->id))}}" class="btn-theme-border"> Buy </a>
                </td>

               </tr>
               @endforeach
              @else
              No Record Found
              @endif

             </tbody>
           </table>
    </div>
    <div class="modal fade" id="description" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Settings</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
           <p id="shower" class="pop_up_data"></p>
            </div>

          </div>
        </div>
      </div>
</div>
<script>
    $('.clicker').click(function()
    {
        var text=$(this).attr('id');
        $('#shower').html(text);
    });
</script>
@endsection
