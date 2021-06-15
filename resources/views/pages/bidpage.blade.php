@extends('layout.page')

@section('content')
    <!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="utf-8" />
            <meta
                name="viewport"
                content="width=device-width, initial-scale=1, shrink-to-fit=no"
                />
            <meta name="description" content="" />
            <meta name="author" content="" />

            <title>Auction Master</title>

            <link href="img/Asset 8.png" rel="icon" />
            <!-- Bootstrap core CSS -->

            <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
            <link
                rel="stylesheet"
                href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
                />
            <!-- Custom styles for this template -->
            <link href="css/simple-sidebar.css" rel="stylesheet" />
            <link
                href="https://fonts.googleapis.com/icon?family=Material+Icons"
                rel="stylesheet"
                />
            <link
                href="https://fonts.googleapis.com/css2?family=Raleway:wght@500;700;900&display=swap"
                rel="stylesheet"
                />
            <script src="https://kit.fontawesome.com/a076d05399.js"></script>
            <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Lato" />
            <style>
                .button {
                    position: absolute;
                    width: 120px;
                    left:0;
                    top: 130px;
                    text-align: center;
                    opacity: 0;
                    transition: opacity .35s ease;
                }
                .card:hover .button {
                    opacity: 1;
                }

                .card {
                    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
                    max-width: 100%;
                    margin: auto;
                    text-align: center;
                    font-family: arial;
                }

                .price {
                    color: grey;
                    font-size: 22px;
                }


                .card button:hover {
                    opacity: 0.7;
                }

                .hh ul li::before {
                    content: "\2022";
                    color: #ecbe44;
                    font-weight: bold;
                    display: inline-block;
                    width: 1em;
                    margin-left: -1em;
                }

                h1,h2,h3,h5,h6,p,a,li{
                    font-family:Lato;

                }
                .aa:hover{

                    border:2px solid black;



                }
                .aa{

                    border:2px solid #F0F0F7;



                }
                .ll:hover{

                    background-color:#222222;
                    color:#ecbe44;
                }
                .ll{
                    border-radius: 20px;
                    height: 50px;
                    background-color: #333333;
                    color: white;
                    border-color: #333333;
                }
                .dropbtn {
                    background-color: #4CAF50;
                    color: white;
                    padding: 16px;
                    font-size: 16px;
                    border: none;
                    cursor: pointer;
                }

                .dropdown {
                    position: relative;
                    display: inline-block;
                }

                .dropdown-content {
                    display: none;
                    position: absolute;
                    background-color: #f9f9f9;
                    min-width: 160px;
                    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
                    z-index: 1;
                }

                .dropdown-content a {
                    color: black;
                    padding: 12px 16px;
                    text-decoration: none;
                    display: block;
                }

                .dropdown-content a:hover {background-color: #f1f1f1}

                .dropdown:hover .dropdown-content {
                    display: block;
                }

                .dropdown:hover .dropbtn {
                    background-color: #3e8e41;
                }

            </style>
        </head>

        <body style="background-color: #eae8e8;">
            <div class="d-flex" id="wrapper">
                <div id="page-content-wrapper">
                    <div class="container-fluid">
                        <br />

                        <div
                            class="col-md-12"
                            >
                            <div class="container">
                                <br>
                                <div class="row">
                                    @foreach ($bids as $row)
                                    @php
                                        $service=\App\service::find($row->product_id);
                                        $imageurl=$service->file;
                                        $price=$service->price;
                                     @endphp
                                        <div class="col-md-3">
                                            <div class="card" style="height:340px;width:1000px;margin-top:10px;font-family:raleway;">
                                                <img src="{{asset($imageurl)}}" alt="no image" style="width:90%;height:180px;margin-top:10px;margin-left:8px" class="img-fluid">  <div class="button d-flex justify-content-center text-center" style="justify-content: center;width:100%" ><a href="{{route('your_bid',array('id'=>$row->id))}}" class="btn " style="background-color:#9F0C40;color:white" > Bidd Now </a></div>
                                            <p class="text-align:justify" style="margin-top:4px;font-family:raleway"><b>Bid Date: </b>{{$row->date}}</p>
                                            <p class="text-align:justify" style="margin-top:4px;font-family:raleway"><b>Start Time: </b>{{$row->start}}</p>
                                            <p class="text-align:justify" style="margin-top:4px;font-family:raleway"><b>End Time: </b>{{$row->end}}</p>
                                            <center><h4 style="margin-top:-10px;font-family:raleway">Rs.{{$price}}</h4></center>
                                            </div>                                </div>

                                        @endforeach


                                </div>
                                <br>
                                <br>
                            </div>
                        </div>
                        <br />
                    </div>
                </div>
                <!-- /#page-content-wrapper -->
            </div>
            <!-- /#wrapper -->

        </body>
    </html>

@endsection
