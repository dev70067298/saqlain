<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Auction Master</title>
</head>
<body>
    <h1>{{$detail['title']}}</h1>
    <center><p style="color:green;font-size:30px;margin-top:20px;margin-bottom:20px">Congratulation on Winning Bidd</p></center>
<div  style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);max-width: 300px;margin: auto;text-align: center;font-family: arial;">
    <img src="{{asset($detail['image'])}}" alt="Denim Jeans" style="width:100%">
    <h1>{{$detail['name']}}</h1>
    <p style="  color: grey;font-size: 22px;"><b>Bid Winning Price: </b>Rs.{{$detail['price']}}</p>
    <p style="  color: grey;font-size: 22px;"><b>Seller Name: </b>{{$detail['seller']}}</p>
    <p style="  color: grey;font-size: 22px;"><b>Buyer Name: </b>{{$detail['buyer']}}</p>
    <p><b>Bid Start Date: </b>{{$detail['date']}}</p>
    <p><b>Bid Start Time: </b>{{$detail['start']}}</p>
    <p><b>Bid End Time: </b>{{$detail['end']}}</p>
    <hr>
    <h6>By Auction Master</h6>
    <hr>
  </div>
</body>
</html>
