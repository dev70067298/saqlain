@extends('layout.admin_app')
@section('content')

<div class="bg-white boxer container mt-3">
    <h3 class="h3">Reviews</h3>
    @foreach ($comment as $row)
        
   <div class="row mt-5 make-it-slow bg-light container">
    <div class="col-2">
        <img src="{{asset('img/profile.png')}}" width="50" height="40" alt="">
    </div>
    <div class="col-10">
        <h3> {{$row->user}} </h3>
    </div>

    <div class="col-12">
    <p>{{$row->comment}}</p>
    </div>
   </div>
        <hr>
    @endforeach
</div>

    
@endsection
