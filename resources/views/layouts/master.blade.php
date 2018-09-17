<!DOCTYPE html>
<html>
  <head>
    @include('includes.head')
</head>
  <body>
    <header class="row">
      @include('includes.header')
    </header>

    <div class="container">

      @include('includes.banner')
      @yield('content')
      @include('includes.about')
      @include('includes.history')


    </div>

    <div class="container-fluid">
      @include('includes.event')
    </div>
    <div class="container-fluid">
      @include('includes.news')
    </div>
    <div class="container-fluid">
      @include('includes.faculty')
    </div>
    <div class="container-fluid">
      @include('includes.leader')
    </div>
    <div class="container-fluid">
      @include('includes.gallery')
    </div>
    <div class="container-fluid">
      @include('includes.where')
    </div>
    <footer class="row">
      @include('includes.footer')
    </footer>
  </body>
</html>
