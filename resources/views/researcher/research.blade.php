@extends('layout.researcher_app')

@section('content')
<div class="bg-white boxer1 container mt-3">
    <div class="row container">
    <h3 class="h3">Signals</h3>
    <a href="#" data-toggle="modal" data-target="#new" class="btn-theme offset-md-9 offset-lg-9 offset-sm-5 offset-xs-5 mt-2">
      Add New Signal</a>
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
    @if ($errors->has('service')) <p style="color:red;">{{ $errors->first('service') }}</p> @endif
    @if ($errors->has('file')) <p style="color:red;">{{ $errors->first('file') }}</p> @endif
</div></center>
    <div class="table-responsive table-responsive-lg table-responsive-md table-responsive-sm table-responsive-xs mt-3">
    <table class="table table-hover table-striped table-bordered">
       <thead>
            <tr>
                <th class="text-center">No. </th>
                <th class="text-center">Service</th>
                <th class="text-center">Detail</th>
                <th class="text-center">Action</th>
            </tr>
       </thead>
        <tbody>
            @if(count($research) > 0)
            @php
            $counter = 0;
        @endphp
            @foreach ($research as $row)
            @php
                $service=\App\service::find($row->service);
                $serviceName=$service->service;
            @endphp
          <tr>
          <td class="text-center">{{++$counter}}</td>
          <td class="text-center" scope="row">{{$serviceName}}</td>
          <td class="text-center" scope="row">
            @if($row->detail != null)
          <a href="#" data-toggle="modal" data-target="#text" id="{{$row->detail}}" class="btn btn-success clicker">Signal Detail</a>
            @endif
          @if($row->file != null)
          <a href="{{asset('image/'.$row->file)}}" class="btn btn-success" download="Research Document"> Download</a>
           @endif
         </td>

           <td class="text-center" scope="row">

             <a href="{{route('edit_research',array('id'=>$row->id))}}" class="btn-theme-border"> Edit </a>

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

<div class="modal fade" id="text" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Research Text</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p id="research_text"></p>
      </div>

    </div>
  </div>
</div>


<div class="modal fade" id="new" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Publish a Signal</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form action="{{route('add_research')}}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="row">
                <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                  <div class="form-group">
                    <select name="service" class="form-control" required>
                      <option disabled selected>Service Name</option>
                      @foreach ($services as $service)
                    <option value="{{$service->id}}">{{$service->service}}</option>
                      @endforeach
                    </select>
                </div>
                </div>
                <div class="col-md-4 col-lg-4 col-sm-4 col-xs-4 offset-md-3 offset-lg-3 offset-sm-3 offset-xs-3 mt-2">
                  <div class="form-group">
                    <a id="img-select" class="btn_theme">Add a File</a>
                    <p id="para"></p>
                    <input type="file" id="img-collect" class="form-control d-none" name="file">
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label>Signal Detail</label>
                <textarea name="detail" rows="4" class="form-control" placeholder="Enter Signal Details" >{{ old('detail') }}</textarea>

            </div>

              <input type="submit" name="submit" value="Publish" class="btn-theme ml-auto d-block">
          </form>
        </div>

      </div>
    </div>
  </div>


  <script>

$('#para').attr('class','d-none');
$("#img-collect").change(function(){
$('#para').attr('class','text-success text-center mt-3');
$('#para').html('File Selected');
});
</script>


@endsection
