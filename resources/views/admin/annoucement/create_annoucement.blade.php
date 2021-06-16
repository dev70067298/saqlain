@extends('layout.admin_app')

@section('content')
<div class="bg-white boxer container mt-3">
<h3 class="h3 text-center">Add Announcement </h3>
<center><div>
    @if(Session::has('success'))
    <p class="offset-lg-4 offset-md-4 col-lg-4 col-md-4 col-sm-4 col-xs-4 alert {{ Session::get('alert-class', 'alert-success') }}">
    {{ Session::get('success') }} </p>
    @endif
    @if(Session::has('error'))
    <p class="offset-lg-4 offset-md-4 col-lg-4 col-md-4 col-sm-4 col-xs-4 alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('error') }}</p>
    @endif
    </div></center>
    <div class="row">
        <div class="lagend offset-md-3 offset-lg-3 col-lg-6 col-md-6 col-sm-10 col-xs-10 rounded">
        <form action="{{route('announcements.store')}}" method="POST" class="form" enctype="multipart/form-data">
        @csrf
        <div class="form-group mt-3">
            <div class="row">
            <div class="col-4 mt-2"><label>Announcement</label> </div>
       <div class="col-8">
           <input type="text" name="title" value="" class="form-control border-top-0 border-right-0 border-left-0" required>
            @if ($errors->has('name')) <p style="color:red;">{{ $errors->first('name') }}</p> @endif
        </div>
        </div>
    </div>
</div>

</div>
</div>

        <input type="submit" name="submit" value="Save" class="btn-theme mx-auto d-block">
      </form>
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
$('#blah').attr('class','profile-image mx-auto d-block img-fluid mt-3');
readimg(this);
});
</script>


@endsection
