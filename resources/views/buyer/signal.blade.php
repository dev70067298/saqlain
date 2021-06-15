@extends('layout.buyer_app')
@section('content')
<div class="grid grid_12" id="blow">
<h1 class="grey2 text-center"><span class="grey">—</span> Order  <span class="grey">—</span></h1>
<center><div>
@if(Session::has('success'))
<p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('success') }}</p>
@endif
@if(Session::has('error'))
<p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('error') }}</p>
@endif
</div></center>
<div class="nicdark_space20"></div>

<div class="row">
<div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
<div class="grid grid_6">
<div class=" nicdark_activity">
<div class="nicdark_archive1 nicdark_border_grey img-magnifier-container">
<h3 class="text-center"><label for="">{{$product->Service}}</label></h3>
<img id="main_image" class="main_image" style="width:250px; height:400px; " alt="" src="{{ asset('image/'.$product->file) }}">
</div>
</div>
</div>
</div>

<div class="col-md-6 col-lg-6 col-sm-12 col-xs-12" style="margin-top: 5px;">
<h1 >${{$product->price}}</h1>
<h3><label for="">Description</label></h3> <p style="text-align: justify;">@php
   echo $product->description;
@endphp</p>
<form action="{{route('cart')}}" method="POST">
@csrf
<div class="row">
<div class="form-group col-md-12 col-sm-12" style="display: none">
<input type="number" name="pId" value="{{$product->id}}">
<input id="product_price" name="product_price"  value="{{$product->price}}">

</div>


<div class="form-group col-md-12 col-sm-12">
<h3><label for="">Quantity</label></h3> <p style="text-align: justify;">
<input type="number" id="myNumber" oninput="myFunction()" name="quantity" placeholder="0" class="form-control" style="width:100px" required>
<h5 style="font-weight: bold;">Price: <span style="font-weight: normal;"> $</span><span id="pricer" style="font-weight: normal;">{{$product->price}} </span> </h5>
</div>
<div class="form-group col-md-12 col-sm-12">
<label for="exampleFormControlTextarea1"><b>Enter Detail</b></label>
<textarea id="lolo" class="form-control" name="detail" rows="3" placeholder="(Optional)">{{ old('detail') }}</textarea>
</div>
<div class="form-group col-md-12 col-sm-12" style="display: none">
<input type="number" name="product" value="{{$product->id}}">
</div>
<div class="form-group col-md-12 col-sm-12" style="display: none">
<input type="number" name="user" value="{{Auth::user()->id}}">
</div>
<center>  <input type="submit" name="submit" value="Add to Cart" class="btn btn-primary"> </center>
</form>
</div>
</div>


</div>
</div>
</div>
<script src="{{asset('js/vendor/jquery.min.js')}}"></script>
<script src="{{asset('js/vendor/bootstrap.min.js')}}"></script>
<script src="{{asset('js/plugins.js')}}"></script>
<script src="{{asset('js/app.js')}}"></script>
<script src="{{asset('js/pages/ecomDashboard.js')}}"></script>
<script>$(function(){ EcomDashboard.init(); });</script>

<script>
function myFunction(){
    var x = document.getElementById("myNumber").value;
    var y = document.getElementById("product_price").value;
    var z = x*y;
    document.getElementById("pricer").innerHTML = z;

}
</script>
@endsection
