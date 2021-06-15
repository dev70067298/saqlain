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
<title>Buyer Panel</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body{
            overflow-x: hidden;
        }
        a{
            text-decoration: none;
        }
        a:hover{
            text-decoration: none;
        }

    </style>
</head>
<body class="buyer_body" id="body" onload="">
@php
$buyer = Auth::user()->id;
$value=\App\cart::where('userid',$buyer)->orderBy('id','desc')->count();

@endphp



    <div class="row" style="overflow-y: scroll">
        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
            <div class="sidebar">
                <h1 class="text-white text-center">Menu</h1>
                <hr class="hro">
                @php
                    $user=Auth::user();
                    $credit=$user->credit;
                @endphp
                @if($user->image != null)
                <img src="{{asset('image/'.$user->image)}}" alt="" class="profile-image mx-auto d-block img-fluid">
                @else
                <img src="{{asset('img/boy.png')}}" alt="" class="profile-image mx-auto d-block img-fluid">
                @endif
            <h4 class="text-white text-center">{{ $user->name }}</h4>
            <br>
            <a href="{{route('order')}}"> <h5 class="text-success text-center" >   <i class="fa fa-shopping-cart" style="font-size:36px"></i> {{$value}} </h5> </a>
            <hr class="hr">
            <a href="{{route('buyerdash')}}" class="side-link">  <h5 style="font-weight: normal" class="text-white text-center nav-side">
                <img src="{{asset('img/icon/dashboard.PNG')}}" width="30" height="30" > Dashboard </h5>
            </a>
            <br clear="all">
            <a href="{{route('buyer_bid')}}" class="side-link">  <h5 style="font-weight: normal" class="text-white text-center nav-side">
                <img src="{{asset('img/icon/dashboard.PNG')}}" width="30" height="30" > Bidding </h5>
            </a>
            <br clear="all">
        <a href="{{route('buyer_researcher')}}" class="side-link">  <h5 style="font-weight: normal" class="text-white text-center nav-side">
                <img src="{{asset('img/icon/jobs.PNG')}}" width="30" height="30"> Sellers </h5>
            </a>
            <br clear="all">

        <a href="{{route('services')}}" class="side-link">  <h5 style="font-weight: normal" class="text-white text-center nav-side">
                <img src="{{asset('img/icon/research.PNG')}}" width="30" height="30"> Products </h5>
            </a>

            <br clear="all">

            <a href="{{route('buyer_profile')}}" class="side-link">  <h5 style="font-weight: normal" class="text-white text-center nav-side">
                <img src="{{asset('img/icon/profile.PNG')}}" width="30" height="30"> Profile </h5>
            </a>
            <br clear="all">

            <a href="{{route('chat_page')}}" class="side-link">  <h5 style="font-weight: normal" class="text-white text-center nav-side">
                <img src="{{asset('img/icon/profile.PNG')}}" width="30" height="30"> Chat </h5>
            </a>
            <br clear="all">

            <a href="{{route('user_logout')}}" class="side-link">  <h5 style="font-weight: normal" class="text-white text-center nav-side">
                <img src="{{asset('img/icon/setting.PNG')}}" width="30" height="30"> Logout </h5>
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
                    <a href="{{route('user_logout')}}" class="btn-theme mx-auto">Logout</a>
                    </div>

                  </div>
                </div>
              </div>


            </div>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
    @yield('content')
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

<script>
    $('.clicker').click(function()
    {
      var text=$(this).attr('id');
      $('#research_text').html(text);
    });
  </script>

</body>
</html>
