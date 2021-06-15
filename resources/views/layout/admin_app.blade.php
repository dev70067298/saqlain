<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="{{asset('css/custom.css')}}">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous"> --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<script src="https://use.fontawesome.com/119f1a8072.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<title>Admin Panel</title>

    <style>
        body{
            overflow-x: hidden;
        }
    </style>
</head>
<body class="" id="body" onload="">
    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
            <div class="sidebar">
                <h1 class="text-white text-center">Menu</h1>
                <hr class="hro">
                @php
                    $user=Auth::user();
                @endphp
                @if($user->image != null)
                <img src="{{asset('image/'.$user->image)}}" alt="" class="profile-image mx-auto d-block img-fluid">
                @else
                <img src="{{asset('img/boy.png')}}" alt="" class="profile-image mx-auto d-block img-fluid">
                @endif
            <h4 class="text-white text-center">{{ $user->name }}</h4>
            <hr class="hr">
            <a href="{{route('dashboard')}}" class="side-link">  <h5 style="font-weight: normal" class="text-white text-center nav-side">
                <img src="{{asset('img/icon/dashboard.PNG')}}" width="30" height="30" > Dashboard </h5>
            </a>
            <br clear="all">
        <a href="{{route('researcher_list')}}" class="side-link">  <h5 style="font-weight: normal" class="text-white text-center nav-side">
                <img src="{{asset('img/icon/research.PNG')}}" width="30" height="30"> Sellers </h5>
            </a>
            <br clear="all">
            <a href="{{route('buyer_list')}}" class="side-link">  <h5 style="font-weight: normal" class="text-white text-center nav-side">
                <img src="{{asset('img/icon/buyer.PNG')}}" width="30" height="30"> Buyers</h5>
            </a>
            <br clear="all">
        <a href="{{route('admin_profile')}}" class="side-link">  <h5 style="font-weight: normal" class="text-white text-center nav-side">
                <img src="{{asset('img/icon/profile.PNG')}}" width="30" height="30"> Profile </h5>
            </a>
            <br clear="all">
            <a href="#" class="side-link">  <h5 style="font-weight: normal" class="text-white text-center nav-side">
                <img src="{{asset('img/icon/payment.PNG')}}" width="30" height="30"> Payment </h5>
            </a>
            <br clear="all">

            <a href="{{route('admin_logout')}}" class="side-link">  <h5 style="font-weight: normal" class="text-white text-center nav-side">
                <img src="{{asset('img/icon/setting.PNG')}}" width="30" height="30"> Logout </h5>
            </a>
            <br clear="all">

            <a href="{{url('Frontend-Settings')}}" class="side-link">  <h5 style="font-weight: normal" class="text-white text-center nav-side">
                <img src="{{asset('img/icon/setting.PNG')}}" width="30" height="30"> Frontend </h5>
            </a>
            <br clear="all">

            <div class="modal fade" id="setting" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Settings</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                    <a href="{{route('admin_logout')}}" class="btn-theme">Logout</a>
                    <a href="{{route('assets')}}" class="btn-theme"> Assets </a>
                    <a href="{{route('admin_service')}}" class="btn-theme"> Service </a>
                    <a href="{{route('market')}}" class="btn-theme"> Market </a>
                    </div>

                  </div>
                </div>
              </div>


            </div>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
    @yield('content')

    <div class="row">
        <div class="offset-lg-10 offset-md-10 offset-sm-10 offset-xs-10 col-lg-2 col-md-2 col-sm-2 col-xs-2">
    <div id="all_users" class="chat-div" style="display: none;">
        <div class="row p-2">
            <h6 class="text-left text-white">Users List</h6>
            <i class="fa fa-times offset-md-5 text-white chat-modal1" aria-hidden="true" ></i>
        </div>


        <input id="myInput" class="form-control mb-3" type="text" placeholder="Search For Names">
          @foreach ($chat_users as $user)
        <ul id="chat_ul">
            <li>
            <a href="{{route('chat',array('id'=>$user->id))}}" style="text-decoration: none; color:white;">
        <div class="row">
          <div class="col-lg-8 col-md-8 col-sm-9 col-xs-9">
            <p>{{$user->name}}</p>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-3 col-xs-3">
            @if($user->userRole == 2)
                Buyer
            @else
            Seller
            @endif
        </div>
        </div>
    </a>
    <hr class="hro">
           </li>
        </ul>
        @endforeach
    </div>

</div>
<div class="offset-lg-11 offset-md-11 offset-sm-11 offset-xs-11 col-lg-1 col-md-1 col-sm-1 col-xs-1 text-right">

    <a class="chat-modal h1">  <i class="fa fa-comments" aria-hidden="true"></i>  </a>
</div>
</div>


    </div>
</div>

<script>
    $('.chat-modal').click(function()
    {
        $('#all_users').slideToggle(800);
    });
    $('.chat-modal1').click(function()
    {
        $('#all_users').slideToggle(800);
    });



</script>


<script>
    $(document).ready(function(){
      $("#myInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#chat_ul li").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
    });
    </script>

<script>
    $('#attach').click(function()
    {
        $('#file').trigger("click");
    });
</script>

<script>
    $('.chatbox').scrollTop($('.chatbox')[0].scrollHeight);
</script>
<script>
    $('#img-select').click(function()
    {
        $('#img-collect').trigger("click");
    });
</script>
</body>
</html>
