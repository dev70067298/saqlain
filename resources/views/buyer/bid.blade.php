@extends('layout.buyer_app')

@section('content')
<div class="bg-white boxer container mt-3">
<h3 class="h3 text-center mt-5">Your Bid for {{$product->product_name}}</h3>
<center><div>
    @if(Session::has('success'))
    <p class="offset-lg-4 offset-md-4 col-lg-4 col-md-4 col-sm-4 col-xs-4 alert {{ Session::get('alert-class', 'alert-success') }}">
    {{ Session::get('success') }} </p>
    @endif
    @if(Session::has('error'))
    <p class="offset-lg-4 offset-md-4 col-lg-4 col-md-4 col-sm-4 col-xs-4 alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('error') }}</p>
    @endif
    </div></center>
    <img src="{{asset('image/'.$product->file)}}" id="cropper" class="profile-image mx-auto d-block img-fluid">

    <h1 class="text-left text-success d-inline"> Maximum Bid: {{$bid->bid}}Rs </h1>
    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12 offset-md-3 offset-lg-3">
    <form action="{{route('send_bid',array('id'=>$bid->id))}}" method="post">
        @csrf
            <div class="form-group">
                <h4 class="text-center text-info"> Your Bid </h4>
            <input type="number" name="bid" class="form-control" min="{{$bid->bid + 1}}" value="{{$bid->bid + 1}}">
            </div>
            <input type="submit" name="submit" value="Send" class="btn btn-primary mb-3 mt-3 mx-auto d-block">
        </form>
    </div>

</div>
<script>
    $('#cropper').mouseenter(function()
    {
        $('#cropper').attr('class','mx-auto d-block img-fluid');
    });
    $('#cropper').mouseleave(function()
    {
        $('#cropper').attr('class','profile-image mx-auto d-block img-fluid');
    });
</script>

@endsection
