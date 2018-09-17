<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
class events extends Controller
{
  public function read()
  {
      if ( Auth::check()) {
    $events = DB::table('events')
      ->where('event_date','=>', date('Y-m-d'))//list only those events that haven't passed that year
      ->get();

      //check if null
      if ($events == null) {
        $events = "Sorry, there are no more events in our school calendar";
      }
      else{
          return view('events', ['events' => $events]);
      }



    }
    else {
        // return redirectTo::route('/login');
        return view('Auth/login');
    }
  }
}
