<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="css/custom.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous"> --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <title>Admin Panel</title>
</head>
<body class="" id="body">

<h1 class="text-center text-white mt-5"> Welcome to Admin Panel </h1>

<div class="container">
    <center><div>
    @if(Session::has('success'))
<p class="col-lg-4 col-md-4 col-sm-4 col-xs-4 alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('success') }}</p>
@endif
@if(Session::has('error'))
<p class="col-lg-4 col-md-4 col-sm-4 col-xs-4 alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('error') }}</p>
@endif
</div></center>
    <div class="row">
        <div class="lagend offset-lg-3 offset-md-3 col-lg-6 col-md-6 col-sm-10 col-xs-10 rounded">
        <form action="{{route('admin_login')}}" method="POST" class="form">
            @csrf
                  <div class="form-group mt-3">
                    <input type="text" value="{{ old('user') }}" class="form-control border-top-0 border-right-0 border-left-0" placeholder="UserName" name="user" required>
                    @if ($errors->has('user')) <p style="color:red;">{{ $errors->first('user') }}</p> @endif
                </div>

                  <div class="form-group">
                    <input type="password" class="form-control border-top-0 border-right-0 border-left-0" placeholder="Password" name="password" required>
                    @if ($errors->has('password')) <p style="color:red;">{{ $errors->first('password') }}</p> @endif
                </div>


                    <br>
                    <center>
                  <input type="submit" name="submit" value="Login" class="btn-theme mb-3">
                </center>

            </form>
        </div>
    </div>
</div>


<script>
    $('#body').attr('class','register_body')
</script>
</body>
</html>
