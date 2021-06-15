@extends('layout.admin_app')

@section('content')
<div class="bg-white boxer container mt-3">
    <h3 class="h3" style="display: inline;">Assets List</h3>
    <a data-toggle="modal" href="#asset" class="btn-theme mt-3" style="float: right;">Add New Asset</a>
    <br clear="all">
    <center><div>
    @if(Session::has('success'))
    <p class="col-lg-4 col-md-4 col-sm-4 col-xs-4 alert {{ Session::get('alert-class', 'alert-success') }}">
    {{ Session::get('success') }} </p>
    @endif
    @if(Session::has('error'))
    <p class="col-lg-4 col-md-4 col-sm-4 col-xs-4 alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('error') }}</p>
    @endif
    @if ($errors->has('asset')) <p style="color:red;">{{ $errors->first('asset') }}</p> @endif
    </div></center>
    <table class="table table-borderless table-md table-lg">
       <thead>
            <tr>
                <th class="text-center">No. </th>
                <th class="text-center">Name</th>
                <th class="text-center">Added</th>
                <th class="text-center">Action</th>
            </tr>
       </thead>
        <tbody>

            @if(count($asset) > 0)
            @php
                $counter = 0;
            @endphp
            @foreach($asset as $row)
          <tr>
             <td class="text-center">{{++$counter}}</td>
             <td class="text-center" scope="row">{{$row->name}}</td>
             <td class="text-center" scope="row">{{$row->created_at}}</td>
             <td class="text-center" scope="row">
                <a href="{{route('del_asset',array('id'=>$row->id))}}" class="btn-theme-border"> Delete </a>
            </td>

          </tr>
          @endforeach
         @else
          No Record Found
         @endif

        </tbody>
      </table>
</div>

<div class="modal fade" id="asset" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add New Asset</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form action="{{route('add_asset')}}" method="post">
            @csrf
                <div class="form-group">
                    <input type="text" name="asset" placeholder="Enter Asset Name" class="form-control" required>
                </div>

                <input type="submit" name="submit" value="Submit" class="btn btn-primary mx-auto d-block">
            </form>
        </div>

      </div>
    </div>
  </div>
@endsection
