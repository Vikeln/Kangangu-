<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// // use XmlParser;
// use Illuminate\Container\Container;
// use Orchestra\Parser\Xml\Document as OrchestraDocument;
// use Orchestra\Parser\Xml\Reader as OrchestraReader;

//
// use Orchestra\Parser\Xml\Facade as XmlParser;
// use App\User;
use View;

class dataHandling extends Controller
{
    public function execute_users(){
      //read xml file
      $app = new \Illuminate\Container\Container;
$document = new \Orchestra\Parser\Xml\Document($app);
$reader = new \Orchestra\Parser\Xml\Reader($document);



      //
      // $app = new Container;
      // $doc = new OrchestraDocument(app());
      // $reader = new OrchestraReader($doc);
      $path = asset('data/users.xml');
      $xml = $reader -> load($path);
      //parse data
      $users = $xml->parse([
        // 'users' => ['uses' => 'table.column[::eng,::hsc]']
        'users' => ['uses' => 'table[column,column,column,column,column,column,column]']
        //
        // 'id' => ['uses' => 'table.column:id'],
        // 'reg_no' => ['uses' => 'table.column:reg_no'],
        // 'first_name' => ['uses' => 'table.column:id'],
        // 'last_name' => ['uses' => 'table.column:last_name'],
        // 'surname' => ['uses' => 'table.column:surname'],
        // 'email' => ['uses' => 'table.column:email'],
        // 'phone_number' => ['uses' => 'table.column:phone_number'],
        // 'dob' => ['uses' => 'table.column:dob'],
        // 'gender' => ['uses' => 'table.column:gender'],
        // 'username' => ['uses' => 'table.column:username'],
        // 'password' => ['uses' => 'table.column:password'],
        // 'remember_token' => ['uses' => 'table.column:remember_token'],
        // 'role' => ['uses' => 'table.column:role'],
        // 'gender' => ['uses' => 'table.column:gender'],
        // 'alumnus' => ['uses' => 'table.column:alumnus'],
        // 'class_id' => ['uses' => 'table.column:class_id'],
        // 'subjects_taken' => ['uses' => 'table.column:subjects_taken'],
        // 'subject1' => ['uses' => 'table.column:subject1'],
        // 'subject2' => ['uses' => 'table.column:subject2'],
        // 'kcpe_marks' => ['uses' => 'table.column:kcpe_marks'],
        // 'class_id' => ['uses' => 'table.column:class_id'],
        // 'birth_cert_no' => ['uses' => 'table.column:birth_cert_no'],
        // 'next_of_kin_name' => ['uses' => 'table.column:next_of_kin_name'],
        // 'next_of_kin_phone' => ['uses' => 'table.column:next_of_kin_phone'],
        // 'address' => ['uses' => 'table.column:address'],
        // 'national_id' => ['uses' => 'table.column:national_id'],
        // 'tsc_no' => ['uses' => 'table.column:tsc_no'],
        // 'status' => ['uses' => 'table.column:status'],
        // 'created_at' => ['uses' => 'table.column:created_at'],
        // // 'deleted' => ['uses' => 'table.column:deleted']

      ]);

      $user_count = count($users);
      //   //load table column names and toArray
      //   $heads = ['','','',''];
      //
      //
      //
      //   //dataHandling
      // for ($m=0; $m < $user_count; $m++) {
      //   // create new user and save data
      //   $user = new User();
      //   foreach ($heads as $key => $value) {
      //     $head = $value[$key];
      //     $user -> $head = $users[$m][$head];
      //   }
      //   $user -> save();
      // }
      // //done
      // return redirect('uploads/adta') -> with('success','Users table has been successfully updated');
      return View::make('uploads/adta',compact('users','user_count'));


      // create sql query
      // $count = count($users) - 1;
      // $sql="";
      // for ($i=0; $i <= $count; $i++) {
      //   if ($i = $count) {
      //   $sql = $sql.$users[$i];
      //   }
      //   else {
      //   $sql = $sql.$users[$i].",";
      //   }
      // }
      // //data insertion
      // $insert = DB::table('users')
      //   ->insert(array())
      //   ->        ;



      // <exam_results>
      //       <exam_result_id>23</exam_result_id>
      //       <exam_id>1</exam_id>
      //       <student_id>1</student_id>
      //       <total>288</total>
      //       <mean>0</mean>
      //       <points>NULL</points>
      //       <class_po>0</class_po>
      //       <form_po>0</form_po>
      //       <totalled>0</totalled>
      //       <uploaded>0</uploaded>
      //       <eng>63</eng>
      //       <mat>59</mat>
      //       <kis>61</kis>
      //       <bio>60</bio>
      //       <geo>45</geo>
      //       <chem>NULL</chem>
      //       <hsc>NULL</hsc>
      //   </exam_results>

      // //create arrays use headers from our tables
      // $users[] = [''];
      // $exam_results[] = ['','','',''];
      // $events[] = ['','','',''];
      // $classes[] = ['','','',''];
      // $exams[] = ['','','',''];
      // $exam_results[] = ['','','',''];
      // $subjects[] = ['','','',''];
    }
}
