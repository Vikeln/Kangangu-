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
    $date = //today's date
    $photos = $request->file('photos');
    if (//insert into database
    DB::table('uploads')->insert(array('file_names' => $names, 'created_at' => $date));
  ) {
    $paths  = [];
    foreach ($photos as $photo) {
        $filename  = $photo->getClientOriginalName();
        $extension = $photo->getClientOriginalExtension();
        $paths[]   = $photo->storeAs('data', $filename);
    }

    }

    return view('uploads/uploadForm')->with('success','File uploading successfully completed');
    // dd($paths);
}
//       $this -> validate($request , [
//         'name' => 'required',
//         'files' => 'required'
// ]);
//
// if($request->hasFile('files'))
//
// {
//
// $allowedfileExtension=['xml'];
//
// $filess = $request->file('files');
//
// foreach($filess as $file){
//
// $filename = $file->getClientOriginalName();
//
// $extension = $file->getClientOriginalExtension();
//
// $check=in_array($extension,$allowedfileExtension);
//
// // dd($check);
//
// if($check)
//
// {
//
// // $exists = Storage::disk('s3')->exists('file.jpg');
// // $contents = Storage::get('file.jpg');
// foreach ($request->files as $photo) {
//
//   // dd($filename);
// $filename = $photo -> store('data');
// // ItemDetail::create([
// //
// // 'item_id' => $items->id,
// //
// // 'filename' => $filename
// //
// // ]);
//
// }
//
// echo "Upload Successful";
//
// }
//
// else
//
// {
//
// echo '<div class="alert alert-warning"><strong>Warning!</strong> Sorry Only Upload xml</div>';
//
// }
//
// }
//
// }
//
// }
}
