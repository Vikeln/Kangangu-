<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Charts;
use View;
use Auth;
class report extends Controller
{


      public function exam(){
        if ( Auth::check()) {
          $sessionid = \Auth::user()->id;
          $role = DB::table('users')
            ->select('role')
            ->where([['users.id','=', $sessionid]])
            ->first();
            if ( $role->role == 'student'){
              //get relevant exams list(id and name) for current student
                $exam = DB::table('exam_results')
                  ->join('exams','exam_results.exam_id','=','exams.exam_id')
                  ->select('exam_results.exam_id as id','exams.exam_name as name','exams.form as form','exams.term as term','exams.year as year')
                  ->where([['exam_results.student_id','=', $sessionid]])
                  ->orderBy('exam_results.exam_id','desc')
                  ->get();
                    // $dee = collect($deets) -> toArray();

                    // $exm = collect($exam) -> toArray();response()->
                    return View::make('academic',compact('exam'));

            }
            else {//if user is a teacher or admin get all exams
                $exam = DB::table('exams')
                  ->select('exams.exam_id as id','exams.exam_name as name','exams.form as form','exams.term as term','exams.year as year')
                  ->orderBy('exam_id','desc')
                  ->get();
                    // $dee = collect($deets) -> toArray();

                    // $exm = collect($exam) -> toArray();response()->
                    return View::make('academic',compact('exam'));

            }
          // echo "string".$sessionid;

      }
      else {
          // return redirectTo::route('Auth/login');

          return view('Auth/login');
      }

      }

      public function read(){
          $sessionid = \Auth::user()->id;
          if ($sessionid == null) {

                      return view('Auth/login');
          }
          else {
            $role = DB::table('users')
              ->select('role')
              ->where([['users.id','=', $sessionid]])
              ->first();

            if ($role->role == 'student') {
              $exam = request() -> post();
              $exam_id = $exam['form'];
              // echo $exam['form']."string";

              //student class deets
              $deets = DB::table('users')
                  ->join('classes','users.class_id','=','classes.class_id')
                  ->select('users.role as role','classes.class_name as class','classes.form_name as form')
                  ->where([['users.id','=',$sessionid]])
                  ->get();

                  //results are for..
              $examd = DB::table('exams')
                ->select('exam_name as name','exams.form','exams.term','exams.year')
                ->where([['exams.exam_id','=', $exam_id]])
                ->get();

                //position and total and kcpe
                $examparts = DB::table('exam_results')//student's marks for logged exam_id in an array
                ->join('users','exam_results.student_id','=','users.id')
                ->select('exam_results.total','users.kcpe_marks as kcpe','exam_results.class_pos','exam_results.form_pos')
                ->where([['exam_results.student_id','=', $sessionid]])
                ->where([['exam_results.exam_id','=', $exam_id]])
                ->get();

                //exam id's
                $ids = DB::table('exam_results')
                  ->join('exams','exam_results.exam_id','=','exams.exam_id')
                  ->select('exam_results.exam_id as ideng')
                  ->where([['exam_results.student_id','=', $sessionid]])
                  ->orderBy('exam_results.exam_id','desc')
                  ->get();

                  $ii = 0;
                  foreach($ids as $key => $idehg){
                    $exam_ids[$ii++] = $idehg->ideng;
                  }
                  //last exam id is in current exam id's index + 1
                  if ($ii = 1){// if theres only one result
                    $cc =  0;
                  }else{

                  for ($jj=0; $jj < $ii; $jj++) {

                      if ($exam_ids[$jj] = $exam_id) {
                        $cc = $jj + 1;
                        if ($cc == $ii) {//if index is the last exam already,
                            $cc -= 1;
                            // break;
                        }
                        break;
                      }
                      else{
                        // $ii -= 1;
                      }
                    }
                  }
                  $lastExam = $exam_ids[$cc]; //return same index to get same results

                //results average for the various subjects for the exam_id issued
                // $averages  = DB::table('exam_results')
                // ->avg(function ($query){
                // $query -> select('subject_alias')
                // ->from ('subjects');
                // })
                // ->where([['exam_results.exam_id','=', $exam_id]])
                // ->first();
                // raw(" (SELECT count(*) FROM user_followers WHERE user_followers.user_id = users.id ) as total_followers "))



                // // get sub aliases except eng,mat and kis then addselect
                $subs = DB::table('subjects')
                  ->select('subject_alias')
                  ->where('deleted','=',0)
                  ->get();

                  $i = 0;
                  foreach($subs as $key => $val){

                    $value[$i++] = $val->subject_alias;//all subjects $value[]
                  }
                    $count = count($value) - 1;
                    // echo "string".$count;
                    $stem="";
                    for ($m=0; $m <= $count ; $m++) {
                      if ($m == $count) {
                        $stem = $stem.$value[$m];
                      }else {
                        $stem = $stem.$value[$m].",";
                      }
                    }
                    $sql = " ".$stem;
                    //get subjects results
                    $results = DB::table('exam_results')
                      ->select(DB::raw($sql))
                      ->where([['exam_results.student_id','=', $sessionid]])
                      ->where([['exam_results.exam_id','=', $exam_id]])
                      ->first();

                    //previous results
                    $prevs = DB::table('exam_results')
                        ->select(DB::raw($sql))
                        ->where([['exam_results.student_id','=', $sessionid]])
                        ->where([['exam_results.exam_id','=', $lastExam]])
                        ->first();

                      //exam data for avg
                    $classData = DB::table('exam_results')
                      ->select(DB::raw($sql))
                      ->where([['exam_results.exam_id','=', $exam_id]])
                      ->get();
                      //loop and set averages
                      for ($n=0; $n <= $count ; $n++) {
                        $mark[$n] = round($classData->avg($value[$n]),0);// class averages for all subjects
                      }
                      for ($j=0; $j <= $count; $j++) {
                        $val = $value[$j];
                        $student_marks[$j] = $results->$val;//results for use in the compare func
                      }

                      //totals for all exams for performance trends
                      $tre = DB::table('exam_results')
                        ->join('exams','exam_results.exam_id','=','exams.exam_id')
                        ->select('exams.form as form','exams.exam_name as exam','exams.term as term','exam_results.mean as avg')
                        ->where([['exam_results.student_id','=', $sessionid]])
                        ->orderBy('exam_results.exam_id','asc')
                        ->get();

                        // $oo = 0;
                        $trender[] = ['Exam','Exam Average Mark'];
                      foreach ($tre as $key => $tree) {
                        $name = 'Form '.$tree->form.' '.$tree->exam.' term '.$tree->term;
                        $tot =  $tree->avg;
                        $trender[++$key] = [$name,$tot];
                      }
//

                      $chart_data[] = ['Subjects', 'Student_Data','Class_Averages'];
                      foreach($subs as $key => $value){

                        $su = $value->subject_alias;  //subject name
                        $ma = $results->$su;  //student mark for that subject
                        $maa = $mark[$key];   //class avg for that subject
                        // $chart_data[$key]['Subjects'] = $su;
                        // $chart_data[$key]['Student_Data'] = $ma;
                        // $chart_data[$key]['Class_Averages'] = $maa;
                        $chart_data[++$key] = [$su,$ma,$maa];
                        // $chart_data[$key] ="'".$su."'". ",".$ma. ",".$maa;
                      }
                      // // echo $chart_data[5]['Subjects'];
                      // $json_product =  json_encode($chart_data);
                      // echo($chart_data[0]);


                      $mine = json_encode($chart_data);//json data for chart
                      $trend = json_encode($trender); //trend analyzer
                      // $avgs = json_decode($mine);//class averages
                      // $sujs = json_encode($value);//subject aliases


                //
                // $subject = collect($subjects)->toArray();
                // $count = $subjects -> count();
                // //addSelect for all except
                // for ($i=0; $i < $count-1; $i++) {
                //   if ($subject[$i] == 'eng' | $subject[$i] == 'mat' | $subject[$i] == 'kis') {
                //     $subject[$i][$i] = "";
                //   }
                //   else {
                //     $subject[$i][$i] = $results->addSelect( $subject[$i] )->get();
                //   }
                // }

                // ExampleController.php
 $name = \Auth::user()->first_name;
 $name = $name."'s".' Performance Data';
 // echo $name;
// $chartjs = app()->chartjs
//         ->name('lineChartTest')
//         ->type('line')
//         ->size(['width' => 400, 'height' => 200])
//         ->labels(['January', 'February', 'March', 'April', 'May', 'June', 'July'])
//         ->datasets([
//             [
//                 "label" => "My First dataset",
//                 'backgroundColor' => "rgba(38, 185, 154, 0.31)",
//                 'borderColor' => "rgba(38, 185, 154, 0.7)",
//                 "pointBorderColor" => "rgba(38, 185, 154, 0.7)",
//                 "pointBackgroundColor" => "rgba(38, 185, 154, 0.7)",
//                 "pointHoverBackgroundColor" => "#fff",
//                 "pointHoverBorderColor" => "rgba(220,220,220,1)",
//                 'data' => [65, 59, 80, 81, 56, 55, 40],
//             ],
//             [
//                 "label" => "The second one",
//                 'backgroundColor' => "rgba(38, 185, 154, 0.31)",
//                 'borderColor' => "rgba(38, 185, 154, 0.7)",
//                 "pointBorderColor" => "rgba(38, 185, 154, 0.7)",
//                 "pointBackgroundColor" => "rgba(38, 185, 154, 0.7)",
//                 "pointHoverBackgroundColor" => "#fff",
//                 "pointHoverBorderColor" => "rgba(220,220,220,1)",
//                 'data' => [12, 33, 44, 44, 55, 23, 40],
//             ]
//         ])
//         ->options([]);


        return View::make('academics',compact('examd','deets','examparts','subs','sub','results','value','classData','mine','avgs','sujs','prevs','trend','chart_data'));

            }
            else {//admin or teacher, return results with pagination
              $exam = request() -> post();
                $exam_id = $exam['form'];
                // echo $exam_id;

                $subjects = DB::table('subjects')
                  ->select('subject_alias')
                  ->get();
                  // $i = 0;
                  // foreach($subjects as $key => $val){
                  //
                  //   $value[$i++] = $val->subject_alias;//all subjects $value[]
                  // }
                  //   $count = count($value) - 1;
                  //   // echo "string".$count;
                  //   $stem="";
                  //   for ($m=0; $m <= $count ; $m++) {
                  //     if ($m == $count) {
                  //       $stem = $stem.$value[$m].','.'form_pos as p'.','.'mean'.','.'points'.','.'student_id';
                  //     }else {
                  //       $stem = $stem.$value[$m].",";
                  //     }
                  //   }
                  //   $sql = " ".$stem;


                $examd = DB::table('exams')
                    ->select('exams.exam_id as id','exam_name as name','exams.form','exams.term','exams.year')
                    ->where([['exams.exam_id','=', $exam_id]])
                    ->get();

                //
                // $marks = DB::table('exam_results')
                // ->select(DB::raw($sql))
                //   ->where([['exam_id','=', $exam_id]])
                //   ->orderBy('form_pos','asc')
                //   ->get();
                //   foreach ($marks as $key => $name) {
                //     $pos[$key] = $name->p;
                //   }

                $results = DB::table('exam_results')
                  ->join('exams','exam_results.exam_id','=','exams.exam_id')
                  ->join('users','exam_results.student_id','=','users.id')
                  ->join('classes','users.class_id','=','classes.class_id')
                  ->select('exam_results.*','users.first_name','users.last_name','users.surname','classes.form_name as form_name','classes.class_name as class','exams.exam_name as examn','exams.form as examform','exams.term as term','exams.year as year')
                  ->where([['exam_results.exam_id','=', $exam_id]])
                  ->orderBy('exam_results.form_pos','asc')
                  ->simplePaginate(5);

                  $results->withPath('custom/url');

                return View::make('academia',compact('subjects','results','examd'));
            }
          }



          // echo "session ".$sessionid;
            // response()
    //         ->view('academics',['marks' => $mark],['sub_aves' => $averages],['exam_deets' => $exampart]);,'mark','averages','exampart'
  }

}
