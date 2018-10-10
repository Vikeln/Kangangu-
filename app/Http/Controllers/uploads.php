<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;
use DB;

class uploads extends Controller
{
    //
    public function uploadForm(){
      return view('uploads/uploadForm');
    }

    public function uploadHandle(Request $request){
      $photos = $request->all();
  //update database
    $names = $request->input('name');
    $date = date("Y-m-d");
    // dd($date);
    $photos = $request->file('photos');
    if (DB::table('uploads')->insert(array('file_names' => $names, 'created_at' => $date,'done' => 0)) )
    {
    $paths  = [];
    foreach ($photos as $photo) {
        $filename  = $photo->getClientOriginalName();
        $extension = $photo->getClientOriginalExtension();
        $folder = "data/".$date;//save files to their folder according to today's date
        $paths[]   = $photo->storeAs($folder, $filename);
    }
    }

    return view('uploads/uploadForm')->with('success','File uploading successfully completed');
}
}
