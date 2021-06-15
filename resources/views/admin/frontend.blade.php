@extends('layout.admin_app')

@section('content')
<div class="bg-white boxer container mt-3">
    <h3 class="h3">Frontend Setting</h3>
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
                <th class="text-center">Section</th>
                <th class="text-center">Actions</th>
            </tr>
       </thead>
        <tbody>
          <tr>
              <td class="text-center">1</td>
            <td class="text-center" scope="row">Events</td>
            <td class="text-center" scope="row">  <a href="{{url('events')}}" class="btn-theme"> Events Settings</a></td>
          </tr>

          <tr>
            <td class="text-center">2</td>
          <td class="text-center" scope="row">Articals</td>
          <td class="text-center" scope="row">  <a href="{{url('articals')}}" class="btn-theme"> Articals Settings </a></td>
        </tr>
        <tr>
            <td class="text-center">3</td>
          <td class="text-center" scope="row">Anounncements</td>
          <td class="text-center" scope="row">  <a href="{{url('projects')}}" class="btn-theme"> Delete </a></td>
        </tr>
        <tr>
            <td class="text-center">4</td>
          <td class="text-center" scope="row">Groups</td>
          <td class="text-center" scope="row">  <a href="{{url('groups')}}" class="btn-theme"> Groups </a></td>
        </tr>
        </tbody>
      </table>
</div>
@endsection
