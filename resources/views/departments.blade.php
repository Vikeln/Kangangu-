@extends('layouts.app')

<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
  <head>
    @section('title')
    <?php echo "DEPARTMENTS" ?>
    @endsection
  </head>
  <body>
    @section('content')

    <div class="container">
      <div class="row">
        <div class="col-md-6">
            <div class="card">
              <img class="card-img img-rounded img-responsive" src="{{URL::asset('/image/up.jpg')}}" alt="Image alternative">
            </div>

        </div>
        <div class="col-md-6">
          <div class="detail-info">
            <hgroup>
              <h3 class="det-txt">ICT Department</h3>
              <h4 class="sm-txt">(Headed by Mr.Ombati)</h4>
            </hgroup>
            <p class="det-p card-body card-text">Kangangu High is a center of excellence, where good morals and citizenship are modelled. We pride ourselves to be one of the best schools in the country, even having very notable alumni.</p>
          </div>
        </div>
      </div>
    </div>

    <br>

    <div class="container">
      <div class="row">
        <div class="col-md-6">
            <div class="card">
              <img class="card-img img-rounded img-responsive" src="{{URL::asset('/image/up.jpg')}}" alt="Image alternative">
            </div>

        </div>
        <div class="col-md-6">
          <div class="detail-info">
            <hgroup>
              <h3 class="det-txt">ICT Department</h3>
              <h4 class="sm-txt">(Headed by Mr.Ombati)</h4>
            </hgroup>
            <p class="det-p card-body card-text">Kangangu High is a center of excellence, where good morals and citizenship are modelled. We pride ourselves to be one of the best schools in the country, even having very notable alumni.</p>
          </div>
        </div>
      </div>
    </div>

    <br>

    <div class="container">
      <div class="row">
        <div class="col-md-6">
            <div class="card">
              <img class="card-img img-rounded img-responsive" src="{{URL::asset('/image/up.jpg')}}" alt="Image alternative">
            </div>

        </div>
        <div class="col-md-6">
          <div class="detail-info">
            <hgroup>
              <h3 class="det-txt">ICT Department</h3>
              <h4 class="sm-txt">(Headed by Mr.Ombati)</h4>
            </hgroup>
            <p class="det-p card-body card-text">Kangangu High is a center of excellence, where good morals and citizenship are modelled. We pride ourselves to be one of the best schools in the country, even having very notable alumni.</p>
          </div>
        </div>
      </div>
    </div>

    <br>

    <div class="container">
      <div class="row">
        <div class="col-md-6">
            <div class="card">
              <img class="card-img img-rounded img-responsive" src="{{URL::asset('/image/up.jpg')}}" alt="Image alternative">
            </div>

        </div>
        <div class="col-md-6">
          <div class="detail-info">
            <hgroup>
              <h3 class="det-txt">ICT Department</h3>
              <h4 class="sm-txt">(Headed by Mr.Ombati)</h4>
            </hgroup>
            <p class="det-p card-body card-text">Kangangu High is a center of excellence, where good morals and citizenship are modelled. We pride ourselves to be one of the best schools in the country, even having very notable alumni.</p>
          </div>
        </div>
      </div>
    </div><br>


    @include('includes.footer')
    @endsection

  </body>
</html>
