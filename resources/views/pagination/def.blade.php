<?php
// config
$link_limit = 7; // maximum number of links (a little bit inaccurate, but will be ok for now)
?>

@if ($paginator->lastPage() > 1)
    <ul class="pagination">
        <li class="{{ ($paginator->currentPage() == 1) ? ' disabled' : '' }}">
            <a href="{{ $paginator->url(1) }}">First</a>
         </li>
        @for ($i = 1; $i <= $paginator->lastPage(); $i++)
            <?php
            $half_total_links = floor($link_limit / 2);
            $from = $paginator->currentPage() - $half_total_links;
            $to = $paginator->currentPage() + $half_total_links;
            if ($paginator->currentPage() < $half_total_links) {
               $to += $half_total_links - $paginator->currentPage();
            }
            if ($paginator->lastPage() - $paginator->currentPage() < $half_total_links) {
                $from -= $half_total_links - ($paginator->lastPage() - $paginator->currentPage()) - 1;
            }
            ?>
            @if ($from < $i && $i < $to)
                <li class="{{ ($paginator->currentPage() == $i) ? ' active' : '' }}">
                    <a href="{{ $paginator->url($i) }}">{{ $i }}</a>
                </li>
            @endif
        @endfor
        <li class="{{ ($paginator->currentPage() == $paginator->lastPage()) ? ' disabled' : '' }}">
            <a href="{{ $paginator->url($paginator->lastPage()) }}">Last</a>
        </li>
    </ul>
@endif

<div class="container">
  <div class="row">
    <div class="col-sm">

    </div> <div class="col-sm-2">
      <a class="card-link" href="/adta">dataHandling</a>
    </div>
  </div>
  <div class="card card-primary">
    <div class="card-header">
      <h4 class="card-title text-center">KANGANGU HIGH SCHOOL STUDENT EXAM REPORTS</h4>

    </div>
    <div class="card-body">
      <div class="row">
        <div class="col-sm">
          <h5>EXAM DETAILS</h5>
          @foreach($examd  as $key => $exams)
            <p>Exam: ID {{ $exams -> id }} {{ $exams -> name }}, Term {{ $exams -> term }} {{ $exams -> year }}</p>
        @endforeach
        </div>
        <div class="col-sm">
          <a class="card-link" href="/academic">Change Exam</a>
        </div>
      </div>
    </div>
  </div>
</div> <br>
<div class="container-fluid">
  <table class="table table-stripped">
    <thead>
      <th>Pos</th>
      <th>Student_ID</th>
      <th>Name</th>
      <th>Class</th>
      @foreach($subjects as $key => $subhh)
        <th>{{$subhh->subject_alias}}</th>
      @endforeach
      <th>Total</th>
      <th>Mean</th>
      <th>Points</th>
      <th>Grade</th>
      <th>Class_Pos</th>
    </thead>
    <tbody>
      @foreach($results as $key => $mr)
        <tr>
            <td>{{$mr -> form_pos}}</td>
            <td>{{$mr->student_id}}</td>
            <td>{{$mr -> surname}} {{$mr->first_name}} {{$mr->last_name}}</td>
            <td>{{$mr->form_name}} {{$mr->class}}</td>
            @foreach($subjects as $key => $subhh)
              @php
                  $sub = strtolower($subhh -> subject_alias);
               @endphp
              <td>{{$mr -> $sub}}</td>
            @endforeach
            <td>{{$mr->total}}</td>
            <td>{{$mr->mean}}</td>
            <td>{{$mr->points}}</td>
            @php
            $ooo = $mr->points;
                if ($ooo>=9){
                  $e='A';
                }else if ($ooo == 0){
                  $e='B';
                }
             @endphp
            <td>{{$e}}</td>
            <td>{{$mr->class_pos}}</td>
        </tr>
      @endforeach
    </tbody>

  </table>

</div><div class="card-block text-center card-body">

</div>
<br><br>
