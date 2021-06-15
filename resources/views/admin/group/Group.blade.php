@extends('layout.admin_app')

@section('content')
<div class="bg-white boxer container mt-3">
    <div class="row">
        <div class="col-8">
    <h3 class="h3">Create New Group</h3>

        </div>
        <div class="col-4">
        <a class=" btn-theme mt-4" data-toggle="modal" data-target="#myModal">Create Group</a>
        </div> 
    </div>
</div>
<div class="bg-white boxer container mt-3">
    <h3 class="h3">Group List</h3>
    <center><div>
    @if(Session::has('success'))
    <p class="col-lg-4 col-md-4 col-sm-4 col-xs-4 alert {{ Session::get('alert-class', 'alert-success') }}">
    {{ Session::get('success') }} </p>
    @endif
    @if(Session::has('error'))
    <p class="col-lg-4 col-md-4 col-sm-4 col-xs-4 alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('error') }}</p>
    @endif
    </div></center>
    <table class="table table-borderless table-md table-lg">
       <thead>
            <tr>
                <th class="text-center">No. </th>
                <th class="text-center">Title</th>  
                <th class="text-center">Created Date</th>
                <th class="text-center">Action</th>
            </tr>
       </thead>
        <tbody>

            @if(count($events) > 0)
            @php
                $counter = 0;
            @endphp
            @foreach($events as $row)
          <tr>
              <td class="text-center">{{++$counter}}</td>
         
            <td class="text-center" scope="row">{{$row->group_name}}</td>
   
             <td class="text-center" scope="row">{{$row->created_at}}</td>
             <td class="text-center" scope="row">
                 <div class="row">
                     <a href="{{route('groups.destroy',array('group'=>$row->id))}}" class="btn-theme"> Delete </a>
                    </div>
                </div>
                </td>

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
      <h4 class="modal-title">Create Group</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
      </div>
      <div class="modal-body">
      <form action="{{route('groups.store')}}" method="POST" class="form" enctype="multipart/form-data">
        @csrf
        <div class="form-group mt-3">
            <div class="row">
            <div class="col-4 mt-2"><label>Group Title</label> </div>
       <div class="col-8">
           <input type="text" name="title" value="" class="form-control border-top-0 border-right-0 border-left-0" required>
            @if ($errors->has('title')) <p style="color:red;">{{ $errors->first('title') }}</p> @endif
        </div>
        </div> 
    </div>
    <input type="submit" name="submit" value="Save" class="btn-theme mx-auto d-block">
      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>


@endsection
