@extends('layout.researcher_app')

@section('content')
<div class="bg-white boxer container mt-3">
<h3 class="h3 text-center mt-5">Edit {{$research->researchName}} Research</h3>
<center><div>
    @if(Session::has('success'))
    <p class="offset-lg-4 offset-md-4 col-lg-4 col-md-4 col-sm-4 col-xs-4 alert {{ Session::get('alert-class', 'alert-success') }}">
    {{ Session::get('success') }} </p>
    @endif
    @if(Session::has('error'))
    <p class="offset-lg-4 offset-md-4 col-lg-4 col-md-4 col-sm-4 col-xs-4 alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('error') }}</p>
    @endif
    </div></center>
    <div class="row">
        <div class="lagend offset-md-3 offset-lg-3 col-lg-6 col-md-6 col-sm-10 col-xs-10 rounded">
            <form action="{{route('update_research',array('id'=>$research->id))}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label>Research Name</label>
                <input type="text" value="{{$research->researchName}}" class="form-control" name="name" required>
                  @if ($errors->has('name')) <p style="color:red;">{{ $errors->first('name') }}</p> @endif

              </div>
                <hr>
                <div class="form-group">
                  <label>New Service Name</label>
                  <select name="service" class="form-control" id="" required>
                      @foreach ($services as $item)
                  <option value="{{$item->id}}" @if($research->service == $item->id) selected @endif>
                    {{$item->name}}</option>
                      @endforeach
                  </select>
                  @if ($errors->has('service')) <p style="color:red;">{{ $errors->first('service') }}</p> @endif

                </div>
                <hr>
                <div class="form-group">
                  <label>Research Status</label>
                 <select name="status" class="form-control" id="" required>
                     <option selected disabled>Select Research Status</option>
                     <option value="1" @if($research->status == 1) selected @endif>
                         Publish </option>
                     <option value="2" @if($research->status == 2) selected @endif>
                         UnPublish</option>
                 </select>
                 @if ($errors->has('status')) <p style="color:red;">{{ $errors->first('status') }}</p> @endif

                </div>
                <hr>
                <div class="form-group">
                  <label>Signal Price</label>
                  <input type="number" value="{{ $research->signalPrice }}" class="form-control" name="signal"  required>
                  @if ($errors->has('signal')) <p style="color:red;">{{ $errors->first('signal') }}</p> @endif

              </div>
                <hr>
                <div class="form-group">
                  <label>Monthly Subscription Price</label>
                  <input type="number" class="form-control" value="{{ $research->monthlyPrice }}" name="monthly" placeholder="Enter Monthly Subscription Price" required>
                  @if ($errors->has('monthly')) <p style="color:red;">{{ $errors->first('monthly') }}</p> @endif

              </div>
                <hr>
                <div class="form-group">
                  <label>Research Detail</label>
                  <textarea name="detail" rows="4" class="form-control" required>{{ $research->detail }}</textarea>
                  @if ($errors->has('detail')) <p style="color:red;">{{ $errors->first('detail') }}</p> @endif

              </div>
                <hr>
                <div class="form-group">
                  <label>Research Text</label>
                  <input type="text" class="form-control" name="plain" value="{{ $research->text }}">
                  @if ($errors->has('plain')) <p style="color:red;">{{ $errors->first('plain') }}</p> @endif

              </div>
                <hr>
                <div class="form-group">
                  <label>Research Document</label>
                  <br>
                  <a id="img-select" class="btn-theme">Select Research File</a>
                  @if ($errors->has('file')) <p style="color:red;">{{ $errors->first('file') }}</p> @endif

                  <input type="file" id="img-collect" class="form-control d-none" name="file">
                </div>

                <center><input type="submit" name="update" value="Update" class="btn btn-primary"></center>
            </form>
        </div>
    </div>

</div>
@endsection
