@extends('layout.researcher_app')

@section('content')


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
                <th class="text-center">Group Name</th>
            </tr>
       </thead>
        <tbody>
            @if(count($data) > 0)
            @foreach ($data as $row)
          <tr>
          <td class="text-center" scope="row"><a href="{{route('group_teacher_data',array('id'=>$row->id))}}" class="btn btn-danger">{{$row->group_name}}</a></td>
          </tr>
          @endforeach
         @else
         No Record Found
         @endif

        </tbody>
      </table>
</div>



@endsection
