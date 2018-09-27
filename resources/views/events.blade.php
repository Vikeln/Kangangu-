@extends('layouts.app')
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
  <head>
    @section('title')
    <?php echo "EVENTS" ?>
    @endsection

  </head>
  <body>
    @section('content')
    
@foreach($events as $key => $data)
  <br>
  <div class="container">
    <div class="row">
      <div class="col-sm">
        <div class="card  bg-light">
        <div class="row">
          <div class="col-sm"><hr class="bottom-line">
            <h6 class="card-title text-center">EVENT</h6>
            <h4 class="card-body card-text"> <b>{{$data -> event_name}}</b> </h4>
            <hr class="bottom-line">
            <h6  class="text-center">{{$data -> event_date}}</h6>
          </div>
            <div class="col-sm">
              <img class="card-img img-responsive" src="{{URL::asset('/image/up.jpg')}}" alt="Event image">
            </div>
        </div>
      </div></div>
      <div class="col-sm">
        <div class="card bg-info animated fadeInRight">
          <div class="card-block">
            <p class="card-body text-white card-text">{{$data -> event_desc}}</p>
          </div>
        </div>

      </div>

    </div>
  </div>
@endforeach


<br><br>
@include('includes.footer')
    @endsection

  </body>
</html>
