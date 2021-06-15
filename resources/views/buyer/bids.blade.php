@extends('layout.buyer_app')

@section('content')
<div class="bg-white boxer container mt-3">
<h3 class="h3 text-center mt-5"> Bidding Items List</h3>
    @if(Session::has('success'))
    <p class="offset-lg-4 offset-md-4 col-lg-4 col-md-4 col-sm-4 col-xs-4 alert {{ Session::get('alert-class', 'alert-success') }}">
    {{ Session::get('success') }} </p>
    @endif
    @if(Session::has('error'))
    <p class="offset-lg-4 offset-md-4 col-lg-4 col-md-4 col-sm-4 col-xs-4 alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('error') }}</p>
    @endif

    <div class="table-responsive">
        <table class="table table-borderless table-hover table-md table-lg">
            <thead>
                 <tr>
                     <th class="text-center">Product Image</th>
                     <th class="text-center">Product Name</th>
                     <th class="text-center"> Bidding Date </th>
                     <th class="text-center"> Bidding Start Time </th>
                     <th class="text-center"> Bidding End Time </th>
                     <th class="text-center">Action</th>
                 </tr>
            </thead>
             <tbody>
                 @if(count($bids) > 0)

                 @foreach ($bids as $row)
                 @php
                 $product=\App\service::find($row->product_id);
                 $start=$row->start;
                 $end=$row->end;
                 $date=$row->date;
                 if($time > $end)
                 {
                  $finish=\App\bidding::find($row->id);
                  $finish->winner=$finish->last_bider;
                  $finish->save();
                 }
              @endphp
               <tr>
               <td class="text-center" scope="row"> <img src="{{asset('image/'.$product->file)}}"  class="profile-image mx-auto d-block img-fluid">
               </td>
               <td class="text-center" style=" padding: 30px 0;" scope="row">{{$product->product_name}}</td>
                <td class="text-center" scope="row" style=" padding: 30px 0;">{{$date}}</td>
                <td class="text-center" scope="row" style=" padding: 30px 0;">{{$row->start}}</td>
                <td class="text-center" scope="row" style=" padding: 30px 0;">{{$row->end}}</td>
                <td class="text-center" scope="row" style=" padding: 30px 0;">
                    @if ($time >= $start  && $time <= $end && $dater == $date)
                <a href="{{route('your_bid',array('id'=>$row->id))}}" class="btn-theme-border"> Bid </a>
                    @endif
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
