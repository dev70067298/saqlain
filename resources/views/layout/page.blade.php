<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/custom.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <title>Auction Master</title>

</head>
<body class="" id="body">

     <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">

         <a class="navbar-brand" href="/">Auction Master</a>
         <ul class="navbar-nav">
              <li class="nav-item">
              <a class="btn-theme" href="{{route('home')}}">Home</a>
              </li>
              <li class="nav-item">
              <a class="btn-theme" href="{{route('about')}}">About</a>
              </li>

            <li class="nav-item">
                <a class="btn-theme" href="{{route('Biddingpage')}}">Biddings</a>
                </li>
              <li class="nav-item">
              <a class="btn-theme" href="{{route('login')}}">Login</a>
              </li>
              <li class="nav-item">
              <a class="btn-theme" href="{{route('register')}}">Join</a>
              </li>


          </ul>

    </div>
      </nav>



    @yield('content')
</body>
</html>
