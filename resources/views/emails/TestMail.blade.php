<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Auction Master</title>
</head>
<body>
    <h1>{{$details['title']}}</h1>
<div  style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);max-width: 300px;margin: auto;text-align: center;font-family: arial;">
    <img src="{{asset($details['image'])}}" alt="Denim Jeans" style="width:100%">
    <h1>{{$details['name']}}</h1>
    <p style="  color: grey;font-size: 22px;">Rs.{{$details['price']}}</p>
    <p><b>Bid Start Date: </b>{{$details['date']}}</p>
    <p><b>Bid Start Time: </b>{{$details['start']}}</p>
    <p><b>Bid End Time: </b>{{$details['end']}}</p>
    <p><a href="{{route('Biddingpage')}}"><button style="background-color:#9F0B41;color:white">Bidd Now</button></a></p>
    <hr>
    <h6>By Auction Master</h6>
    <hr>
  </div>
</body>
</html>
