<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class eventNotify extends Controller
{
  //events notifier starts a week to. Will be triggered thrice: week,three and today
    public function weekTo(){
      $options = array('cluster' => env(PUSHER_APP_CLUSTER),
                      'encrypted' => true);

      $pusher = new Pusher (
        env('PUSHER_APP_KEY'),
        env('PUSHER_APP_SECRET'),
        env('PUSHER_APP_ID'),
        $options
      );

      $data['message'] = 'There will be an event in school soon. Check it out!';
      $pusher -> trigger('channel','App\\Events\\newEvent',$data);

    }

}
