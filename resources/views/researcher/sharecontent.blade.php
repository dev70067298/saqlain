@extends('layout.researcher_app')

@section('content')
<div class="bg-white boxer container mt-3">
    <div class="row">
        <div class="col-8">
    <h3 class="h3">Add Files</h3>
    
        </div>
        <div class="col-4">
        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Upload Files</button>
        
        </div>
    </div>
</div>

<div class="bg-white boxer container mt-3">
    <center><div>
    @if(Session::has('success'))
    <p class="col-lg-4 col-md-4 col-sm-4 col-xs-4 alert {{ Session::get('alert-class', 'alert-success') }}">
    {{ Session::get('success') }} </p>
    @endif
    @if(Session::has('error'))
    <p class="col-lg-4 col-md-4 col-sm-4 col-xs-4 alert {{ Session::get('alert-class', 'alert-danger') }}">
        {{ Session::get('error') }}</p>
    @endif
</div></center>
    <table class="table table-borderless table-hover table-md table-lg mt-5">
       <thead>
            <tr>
                <th class="text-center">Title</th>
                <th class="text-center">Action</th>

            </tr>
       </thead>
        <tbody>
            @if(count($data) > 0)
            @foreach ($data as $row)
          <tr>
          <td class="text-center" scope="row"><a href="{{url($row->path)}}" class="btn btn-danger" download>{{$row->title}}</a></td>
          <td class="text-center" scope="row"><a href="{{route('group_teacher_data',array('id'=>$row->id))}}" class="btn btn-danger">Delete</a></td>

          </tr>
          @endforeach
         @else
         No Record Found
         @endif

        </tbody>
      </table>
</div>

<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
      </div>
      <div class="modal-body">
      <form method="post" action="{{route('storecontent')}}" enctype='multipart/form-data'>
      @csrf
      <div class="form-group">
      <label>Enter Title:</label>
      <input type="hidden" name="g_id"  value="{{$group_id}}">

<input type="text" name="title" placeholder="Enter Title">
      </div>
      <div class="form-group">
      <label>Chose a content to share:</label>
<input type="file" name="path" placeholder="chose file">
      </div>

<button type="submit" name="submit" class="btn btn-success" >Submit</button>
      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>



@endsection
