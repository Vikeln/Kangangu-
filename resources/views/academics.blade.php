@extends('layouts.app')
<!DOCTYPE html>
<html>
  <head>
    @section('title')
    {{ config('app.name') }}
    @endsection
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>


    <script type="text/javascript">
          google.charts.load('current', {'packages':['line']});
          google.charts.setOnLoadCallback(drawChart1);

            function drawChart1() {
              var chart_dat = <?php echo $mine; ?>;
            var data = new google.visualization.arrayToDataTable(chart_dat);

            var options = {
              height: 500
            };

            var chart = new google.visualization.AreaChart(document.getElementById('compare'));

            chart.draw(data, google.charts.Line.convertOptions(options));
            }


    </script>

    <style media="screen">
      .goat{
        width: 100%;
        min-height: 450px;
      }
    </style>

  </head>
  <body>
    @section('content')
    <div class="container">
      <div class="card card-primary">
        <div class="card-header">
          <h4 class="card-title text-center">KANGANGU HIGH SCHOOL STUDENT EXAM REPORTS</h4>

        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-sm">
              <h5>EXAM DETAILS</h5>
              @foreach($examd  as $key => $exams)
                <p>Exam: {{ $exams -> name }}, Term {{ $exams -> term }} {{ $exams -> year }}</p>
            @endforeach
            </div>
            <div class="col-sm">
              <a class="card-link" href="/academic">Change Exam</a>
            </div>
          </div>
        </div>
      </div>
    </div> <br>
    <div class="container-fluid" id="report" >
      <div class="row">
        <div class="col-sm-3">
          <div class="card-basic">
            <div class="card-header">
              <h4 class="card-title">STUDENT DETAILS</h4>
            </div>
            <div class="card-body">

              <img src="{{URL::asset('/image/up.jpg')}}" alt="Principle" class="img-thumbnail img-circle" />
              <p class="card-text">Name: {{ Auth::user()->surname }} {{Auth::user()->first_name}} {{Auth::user()->last_name}}</p>

              <p>Email: {{ Auth::user()->email }}</p>

              @foreach($deets  as $key => $deet)
                <p>Student ID: {{ Auth::user()->id }}</p>
                <p>Role: {{ $deet -> role }}</p>
                  <p>Class: Form {{ $deet -> form }} {{ $deet -> class }}</p>
            @endforeach

            </div>
            <div class="card-footer">
              STUDENT PROFILE
            </div>
          </div>
          </div>
        <div class="col-sm">
          <div class="row">
            <div class="col-sm ">
              <div class="card-basic">
                <div class="card-header">
                  <h4 class="card-title">STUDENT PERFOMANCE IN EXAM</h4>
                </div>
                <div class="card-body">
                    @foreach($examparts  as $key => $exampart)
                      <div class="row">
                    <div class="well col-sm">
                      <h5>Mean Marks</h5>
                      <h4>{{ ($exampart -> total)/5 }}</h4>
                    </div>
                    <div class="col-sm">
                      <h5>Points</h5>
                      <h4>@php if ((($exampart -> total)/5) > 80)
                    {$grad = '12';echo $grad;}
                     else if ((($exampart -> total)/5) > 75){
                    $grad = '11';echo $grad;
                  } else if ((($exampart -> total)/5) > 70){
                    $grad = '10';echo $grad;
                  } else if ((($exampart -> total)/5) > 65){
                    $grad = '9';echo $grad;
                  } else if ((($exampart -> total)/5) > 60){
                    $grad = '8';echo $grad;
                  } else if ((($exampart -> total)/5) > 55){
                    $grad = '7';echo $grad;
                  } else if ((($exampart -> total)/5) >= 50){
                    $grad = '6';echo $grad;
                  } else if ((($exampart -> total)/5) > 45){
                    $grad = '5';echo $grad;
                  } else if ((($exampart -> total)/5) > 40){
                    $grad = '4';echo $grad;
                  } else if ((($exampart -> total)/5) > 35){
                    $grad = '3';echo $grad;
                    } else {
                    $grad = '2';echo $grad;
                    }
                         @endphp</h4>
                    </div>
                    <div class="wall col-sm">
                      <h5>Class Position</h5>
                      <h4>{{ $exampart -> class_pos }}
                      </h4>

                    </div><div class="wall col-sm">
                      <h5>Overall Position</h5>
                      <h4>{{ $exampart -> form_pos }}
                      </h4>

                    </div></div>
                    <div class="row">

                      <div class="well col-sm">
                        <h5>Mean Grade</h5>
                        <h4>@php if ((($exampart -> total)/5) > 75){
                      $grad = 'A';echo $grad;
                    } else if ((($exampart -> total)/5) > 70){
                      $grad = 'A-';echo $grad;
                    } else if ((($exampart -> total)/5) > 65){
                      $grad = 'B+';echo $grad;
                    } else if ((($exampart -> total)/5) > 60){
                      $grad = 'B';echo $grad;
                    } else if ((($exampart -> total)/5) > 55){
                      $grad = 'B-';echo $grad;
                    } else if ((($exampart -> total)/5) >= 50){
                      $grad = 'C+';echo $grad;
                    } else if ((($exampart -> total)/5) > 45){
                      $grad = 'C-';echo $grad;
                    } else if ((($exampart -> total)/5) > 40){
                      $grad = 'C';echo $grad;
                    } else if ((($exampart -> total)/5) > 35){
                      $grad = 'D';echo $grad;
                      } else {
                      $grad = 'E';echo $grad;
                      }
                           @endphp</h4>
                      </div>
                      <div class="col-sm">
                        <h5>KCPE</h5>
                        <h4>{{$exampart -> kcpe}}</h4>
                      </div>
                      <div class="col-sm">

                      </div>
                    </div>
                  @endforeach


                </div>
                <div class="card-footer">

                </div>
              </div>
            </div>
            <div class="col-sm">
              <div class="card-basic">
                <div class="card-header">
                  <h4 class="card-title">SUBJECTS PERFOMANCE IN EXAM</h4>
                </div>
                <div class="card-body">
                  <table class="table table-stripped">
                    <thead>
                      <tr>
                        <th>SUBJECT</th>
                        <th>MARKS</th>
                        <th>GRADE</th>
                        <th>DEVIATION</th>
                        <th>REMARKS</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach( $subs as $key => $subd )
                        @php
                          $sub = $subd -> subject_alias;
                          $mar = $results -> $sub;
                          $prev = $prevs -> $sub;
                          $dev = $mar - $prev;

                          if ($mar > 75){
                       $grade = 'A';
                     } else if ($mar > 70){
                       $grade = 'A-';
                     } else if ($mar > 65){
                       $grade = 'B+';
                     } else if ($mar > 60){
                       $grade = 'B';
                     } else if ($mar > 55){
                       $grade = 'B-';
                     } else if ($mar >= 50){
                       $grade = 'C+';
                     } else if ($mar > 45){
                       $grade = 'C-';
                     } else if ($mar > 40){
                       $grade = 'C';
                     } else if ($mar > 35){
                       $grade = 'D';
                       } else {
                       $grade = 'E';
                       }

                       if ($mar > 75){
                    $rem = 'Excellent';
                  } else if ($mar > 70){
                    $rem = 'Great';
                  }  else if ($mar > 60){
                    $rem = 'Good';
                  } else if ($mar >= 50){
                    $rem = 'Above Average';
                  } else if ($mar > 40){
                    $rem = 'Below Average';
                  }  else {
                    $rem = 'Work Harder';
                    }


                          @endphp
                        <tr>
                          <td>{{$sub }}</td>
                          <td>{{$mar }}</td>
                          <td>{{$grade }}</td>
                          <td>{{$dev}}</td>
                          <td>{{$rem}}</td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
                <div class="card-footer">
                  <h6 class="text-center">SUBJECTS</h6>
                </div>
              </div>
            </div>
          </div> <br>

        </div>

      </div>
    </div>
    <div class="container-fluid" class="goat">
      <div class="container">
        <div class="card-basic">
          <div class="card-header">
            <h4 class="card-title">PERFOMANCE AGAINST CLASS AVERAGES</h4>
          </div>
          <div class="card-body" id="compare">

          </div>
          <div class="card-footer">
            <p>Student Against Class Comparator</p>
          </div>
        </div> <br>
        <div class="card-basic">
          <div class="card-header">
            <h4 class="card-title">STUDENT PERFOMANCE OVER TIME</h4>
          </div>
          <div class="card-body" id="trender">

          </div>
          <div class="card-footer">
            <p>Student Exam Performance trend Analyzer</p>
          </div>
        </div>
      </div>

    </div>
    <div class="container-fluid"> <br>
      <div class="row">
        <div class="col-sm-3">

        </div>
          <div class="col-sm">
          <p>Please note that all data provided on this platform belongs to Kangangu. Any issues found can be forwarded to us through the feedback form <a class="card-link" href="#">here.</a> </p>

          </div>
            <div class="col-sm-3">
              <!-- <a href="/charts">see charts</a> -->
            </div>
      </div>
      <hr>
    </div>
    @include('includes.footer')
    @endsection

    <script type="text/javascript">
      // google.charts.load('current', {'packages':['line']});
      google.charts.load('current', {packages: ['corechart']});
      google.charts.setOnLoadCallback(drawChart2);

    function drawChart2() {
    var chart = <?php echo $trend; ?>;

    var data = new google.visualization.arrayToDataTable(chart);

    var options = {
      chart: {
    title: ''
  },
      height: 500
    };
    var chart = new google.visualization.ColumnChart(document.getElementById('trender'));

    chart.draw(data,options);
    }



    $(window).resize(function(){
  drawChart1();
  drawChart2();
});
    </script>
  </body>
</html>
