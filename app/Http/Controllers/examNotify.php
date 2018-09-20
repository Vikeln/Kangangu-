<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class examNotify extends Controller
{
    //new exam notify users
    public function newExamAvailable(){
      $options = array('cluster' => env(PUSHER_APP_CLUSTER),
                      'encrypted' => true);

      $pusher = new Pusher (
        env('PUSHER_APP_KEY'),
        env('PUSHER_APP_SECRET'),
        env('PUSHER_APP_ID'),
        $options
      );

      $data['message'] = 'New exams results available! Login to checkout';
      $pusher -> trigger('channel','App\\Events\\examEvent',$data);

    }
}
