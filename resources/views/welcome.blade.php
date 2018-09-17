@extends('layouts.app')
<html lang="{{ app()->getLocale() }}">
    <body>
      @section('title')
      <?php echo "HOME" ?>
      @endsection

            <div>
              @section('content')
              <div class="container-fluid">
                @include('includes.banner')
                @include('includes.about')
              </div>
              <div class="container-fluid">
                @include('includes.gallery')
              </div>
              <div class="container-fluid">
                @include('includes.faculty')
              </div>
              <div class="container-fluid">
                @include('includes.leader')
              </div>
              <div class="container-fluid">
                @include('includes.contacts')
              </div>
              <footer class="row">
                @include('includes.footer')
              </footer>
              @endsection
            </div>
    </body>
</html>
