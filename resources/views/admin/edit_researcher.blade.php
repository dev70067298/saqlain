@extends('layout.admin_app')

@section('content')
<div class="bg-white boxer container mt-3">
<h3 class="h3 text-center">Edit {{$user->name}}</h3>
<center><div>
    @if(Session::has('success'))
    <p class="col-lg-4 col-md-4 col-sm-4 col-xs-4 alert {{ Session::get('alert-class', 'alert-success') }}">
    {{ Session::get('success') }} </p>
    @endif
    @if(Session::has('error'))
    <p class="col-lg-4 col-md-4 col-sm-4 col-xs-4 alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('error') }}</p>
    @endif
    </div></center>
    <div class="row">
        <div class="lagend offset-md-3 offset-lg-3 col-lg-6 col-md-6 col-sm-10 col-xs-10 rounded">
        <form action="{{route('researcher_update',array('id'=>$user->id))}}" method="POST" class="form">
        @csrf
        <div class="form-group mt-3">
            <div class="row">
            <div class="col-4 mt-2"><label>Enter Name</label> </div>
       <div class="col-8">
           <input type="text" name="name" value="{{$user->name}}" class="form-control border-top-0 border-right-0 border-left-0" required>
            @if ($errors->has('name')) <p style="color:red;">{{ $errors->first('name') }}</p> @endif
        </div>
        </div>
    </div>

    <div class="form-group mt-3">
        <div class="row">
        <div class="col-4 mt-2"><label>Enter User Name</label> </div>
   <div class="col-8">
       <input type="text" name="user" value="{{$user->user}}" class="form-control border-top-0 border-right-0 border-left-0" required>
        @if ($errors->has('user')) <p style="color:red;">{{ $errors->first('user') }}</p> @endif
    </div>
    </div>
</div>


<div class="form-group mt-3">
    <div class="row">
    <div class="col-4 mt-2"><label>Enter Email</label> </div>
<div class="col-8">
   <input type="email" name="email" value="{{$user->email}}"class="form-control border-top-0 border-right-0 border-left-0" required>
    @if ($errors->has('email')) <p style="color:red;">{{ $errors->first('email') }}</p> @endif
</div>
</div>
</div>


<div class="form-group mt-3">
    <div class="row">
    <div class="col-4 mt-2"><label>Select Status</label> </div>
<div class="col-8">
   <select  name="status" class="form-control border-top-0 border-right-0 border-left-0" required>
    <option selected disabled>Select Status</option>
    <option value="1" @if($user->status==1) selected @endif> Active</option>
    <option value="3" @if($user->status==2 || $user->status==3) selected @endif>Inactive</option>
  </select>
   @if ($errors->has('status')) <p style="color:red;">{{ $errors->first('status') }}</p> @endif
</div>
</div>
</div>
        <input type="submit" name="submit" value="Update" class="btn-theme mx-auto d-block">
      </form>
        </div>
    </div>

</div>
@endsection
