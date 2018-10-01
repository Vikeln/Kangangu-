<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App/Http/Requests;

class contact extends Controller
{
    //
    public function contactUSPost(Request $request)
 {
  $this->validate($request, [ 'name' => 'required', 'email' => 'required|email', 'query' => 'required' ]);
    Mail::send('email',
     array(
         'name' => $request->get('name'),
         'email' => $request->get('email'),
         'user_message' => $request->get('query')
     ), function($message)
 {
     $message->from($request->get('email'));
     $message->to('principal@kangangu.co', 'Admin')
              ->subject('KANGANGU Enquiries');
 });

  return back()->with('success', 'Thanks for contacting us!');
 }
}
