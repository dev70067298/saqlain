@extends('layout.researcher_app')

@section('content')


<div class="bg-white boxer container mt-3">

  <div class="row">
    <div class="col-md-4 col-lg-4 col-sm-3 col-xs-3"></div>
    <div class="col-md-2 col-lg-2 col-sm-2 col-xs-2">
        <h3 class="h3">Products</h3>
    </div>
    <div class="col-md-1 col-lg-1 col-sm-1 col-xs-1">
        <label class="switch">
            <input type="checkbox" id="toggle" >
            <span class="slider round"></span>
          </label>
    </div>
    <div class="col-md-4 col-lg-4 col-sm-4 col-xs-4">
        <h3 class="h3">Bids</h3>
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
    @if($errors->has('product_id')) <p style="color: red;"> {{$errors->first('product_id')}} </p> @endif
    @if ($errors->has('date')) <p style="color:red;">{{ $errors->first('date') }}</p> @endif
    @if ($errors->has('start')) <p style="color:red;">{{ $errors->first('start') }}</p> @endif
    @if ($errors->has('end')) <p style="color:red;">{{ $errors->first('end') }}</p> @endif
</div></center>
    <div id="product">
    <table class="table table-borderless table-hover table-md table-lg mt-5">
       <thead>
            <tr>
                <th class="text-center">Product Name</th>
                <th class="text-center">Image</th>
                <th class="text-center">Added</th>
                <th class="text-center">Action</th>
            </tr>
       </thead>
        <tbody>
            @if(count($services) > 0)
            @foreach ($services as $row)
            @php
            $product=\App\bidding::where('product_id',$row->id)->count();
        @endphp
        @if($product < 1)
          <tr>
          <td class="text-center" scope="row">{{$row->product_name}}</td>
          <td class="text-center" scope="row">
            @if($row->file != null)
            <img src="{{asset($row->file)}}" class="profile-image mx-auto d-block img-fluid" id="db_img" alt="">
            @else
            No Image Set
            @endif
          </td>
           <td class="text-center" scope="row">{{$row->created_at}}</td>
           <td class="text-center" scope="row">
               <a href="#" data-toggle="modal" data-target="#new" value="{{$row->id}}" id="{{$row->product_name}}" class="btn btn-primary poper"> Start Bid </a>
              </td>
          </tr>
          @endif
          @endforeach
         @else
         No Record Found
         @endif

        </tbody>
      </table>
   </div>



   <div id="bid" style="display: none;">
    <table class="table table-borderless table-hover table-md table-lg mt-5">
       <thead>
            <tr>
                <th class="text-center">Product Name</th>
                <th class="text-center">Image</th>
                <th class="text-center">Date</th>
                <th class="text-center">Start Time</th>
                <th class="text-center">End Time</th>
                <th class="text-center">Added</th>
                <th class="text-center">Action</th>
            </tr>
       </thead>
        <tbody>
            @if(count($bids) > 0)
            @foreach ($bids as $row)
           @php
               $prod=\App\service::find($row->product_id);
           @endphp
          <tr>
          <td class="text-center" scope="row">{{$prod->product_name}}</td>
          <td class="text-center" scope="row">
            @if($prod->file != null)
            <img src="{{asset($prod->file)}}" class="profile-image mx-auto d-block img-fluid" id="db_img" alt="">
            @else
            No Image Set
            @endif
          </td>
          <td class="text-center" scope="row">{{$row->date}}</td>
          <td class="text-center" scope="row">{{$row->start}}</td>
          <td class="text-center" scope="row">{{$row->end}}</td>
           <td class="text-center" scope="row">{{$row->created_at}}</td>
           <td class="text-center" scope="row">
           <a href="{{route('del_bid',array('id'=>$row->id))}}" class="btn btn-danger"> Delete </a>
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

<div class="modal fade" id="new" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Start Bid on <span id='placer'></span></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form action="{{route('add_bid')}}" method="post" enctype="multipart/form-data">
              @csrf
              <input type="text" value="" class="d-none" name="product_id" id="id_placer" required>
              <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mb-3">
                  <label>Select Date</label>
                 <input type="date" name="date" placeholder="Select Date" class="form-control" required>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                  <label>Start Time</label>
                  <input type="time" name="start" placeholder="Start Time" class="form-control" required>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                  <label>End Time</label>
                  <input type="time" name="end" placeholder="End Time" class="form-control" required>
                </div>


              </div>
              <center><input type="submit" name="submit" value="Submit" class="btn btn-primary mt-3"></center>
          </form>
        </div>

      </div>
    </div>
  </div>


  <script>
      function readimg(input) {
if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
        $('#blah').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
}
}
$('#blah').attr('style','display:none;');

$("#img-collect").change(function(){
$('#db_img').attr('class','d-none');
$('#blah').attr('class','profile-image mx-auto d-block img-fluid');
readimg(this);
});
  </script>

  <script>
    $('.poper').click(function()
    {
      var prod=$(this).attr('id');
      var id=$(this).attr('value');
      $('#placer').html(prod);
      $('#id_placer').val(id);


    });
  </script>
<script>
  $("#toggle").click(function() {
      $("#product").slideToggle();
      $("#bid").slideToggle();
  });
</script>
@endsection
