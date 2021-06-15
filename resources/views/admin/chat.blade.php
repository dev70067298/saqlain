@extends('layout.admin_app')

@section('content')
<h2 class="h2 text-center text-muted">Chat With {{$user->name}}</h2>
    <div class="row">
        <div id="pointer" class="col-md-6 col-lg-6 col-sm-12 col-xs-12 offset-md-3 offset-lg-3 bg-white boxer1 mb-3 chatbox">
            @foreach ($chats as $chat)
            <div class="row container">
                @if ($chat->sender == Auth::user()->id)
                    <div class="col-md-8 col-lg-8 col-sm-9 col-xs-9 mt-2 mb-2 make-it-slow me boxer">
                           <p class="inline_para"> {{$chat->message}}</p> 
                    </div>
                    @else
                    <div class="boxer mt-2 mb-2 make-it-slow other offset-md-4 offset-lg-4 offset-sm-3 offst-xs-3 col-md-8 col-lg-8 col-sm-9 col-xs-9">
                        <p class="inline_para"> {{$chat->message}}</p> 
                    </div>
                @endif
            </div>
            @endforeach
            <div class="sender">
                     <form action="{{route('send_message')}}" method="POST">
            @csrf
                <div class="row">
                <div class="col-md-8 col-lg-8 col-sm-10 col-xs-10 form-group">
                    <input type="text" name="message" class="form-control" placeholder="Enter Your Message">
                <input type="text" style="display: none;" name="receiver" value="{{$user->id}}">
                </div>
                <div class="form-group col-md-1 col-lg-1 col-sm-2 col-xs-2">
                    <i class="fa fa-paperclip btn btn-success mt-1" aria-hidden="true" id="attach"></i>
                    <input type="file" name="file" id="file" style="display: none;">
                </div>
                <div class="form-group col-md-2 col-lg-2 col-sm-2 col-xs-2">
                    <input type="submit" name="submit" value="Send" class="btn btn-primary">
                </div>
            </div>
            </form>
        </div>
        </div>
    </div>
@endsection