@extends('layouts.app')
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
  </head>
  <body>

    @section('content')
    @if (count($errors) > 0)

    <div class="alert alert-danger">

    <ul>

    @foreach ($errors->all() as $error)

    <li>{{ $error }}</li>

    @endforeach

    </ul>

    </div>

    @endif
    <div class="container">
      <div class="row">
        <div class="col-sm">

        </div>
        <div class="col-sm">
          <h2 class="card-title text-center">Data HandShakes</h2>
          <form action="/upload" method="post" enctype="multipart/form-data">

          {{ csrf_field() }}

          <div class="form-group">

          <label>Return file names</label>

          <input type="text" name="name" class="form-control">

          </div>
          <div class="form-group">
            <label>Files (can attach more than one):</label>
            <input type="file" id="file" class="form-control" name="photos[]" multiple />
          </div>
          <div class="form-group text-center">
            <input type="submit" class="text-center btn btn-primary" value="Upload" />
          </div>

          </form>
        </div>
        <div class="col-sm">

        </div>
      </div>
    </div>


    @endsection

  </body>
</html>
