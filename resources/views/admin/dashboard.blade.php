@extends('layout.admin_app')

@section('content')

    <div class="bg-white boxer container mt-3">
        <h3 class="h3 text-center">Dashboard</h3>
        <h5 class="h5 text-center">Welcome Admin</h5>

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
</div></center>
    <div class="bg-white boxer container mt-3">
        <h3 class="h3">Seller</h3>
        <table class="table table-borderless">
          <thead>
            <tr>
              <th scope="col"  class="text-center">Image</th>
              <th scope="col"  class="text-center">Name</th>
              <th scope="col"  class="text-center">Email</th>
              <th scope="col"  class="text-center">Action</th>

            </tr>
          </thead>
            <tbody>
              @foreach ($researcher as $research)


              <tr>
              <td class="text-center" scope="row"> <img src="{{asset('img/profile.png')}}" width="50" height="40" alt=""> </td>
                <td class="text-center" scope="row">{{$research->name}}</td>
                <td class="text-center" scope="row">{{$research->email}}</td>
                <td class="text-center" scope="row">
                  @if($research->status == 1)
                    <a href="{{route('deactive_researcher',array('id'=>$research->id))}}" class="btn-theme">Disable</a>
                  @endif
                  @if($research->status == 2 || $research->status == 3)
                    <a href="{{route('accept_researcher',array('id'=>$research->id))}}" class="btn-theme">Enable</a>
                  @endif
                  </td>

              </tr>
              @endforeach

            </tbody>
          </table>

    </div>

    <div class="bg-white boxer container mt-3">
        <h3 class="h3">Buyers</h3>
        <table class="table table-borderless">
          <thead>
            <tr>
              <th scope="col"  class="text-center">Image</th>
              <th scope="col"  class="text-center">Name</th>
              <th scope="col"  class="text-center">Email</th>
              <th scope="col"  class="text-center">Action</th>

            </tr>
          </thead>
          <tbody>
            @foreach ($buyer as $buy)
            <tr>
            <td class="text-center" scope="row"> <img src="{{asset('img/profile.png')}}" width="50" height="40" alt=""> </td>
              <td class="text-center" scope="row">{{$buy->name}}</td>
              <td class="text-center" scope="row">{{$buy->email}}</td>
              <td class="text-center" scope="row">
                @if($buy->status == 1)
                  <a href="{{route('deactive_buyer',array('id'=>$buy->id))}}" class="btn-theme">Disable</a>
                @endif
                @if($buy->status == 2 || $buy->status == 3)
                  <a href="{{route('accept_buyer',array('id'=>$buy->id))}}" class="btn-theme">Enable</a>
                @endif
                </td>

            </tr>
            @endforeach

          </tbody>
          </table>

    </div>








<script>
    $('#body').attr('class','admindash')
</script>

@endsection
