<!--Navigation bar-->
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="/">HOME</a></li>
        <li><a href="/#about">ABOUT US</a></li>
        <li><a href="/#events">UPCOMING EVENTS</a></li>
        <li><a href="/#gallery">GALLERY</a></li>
        <li><a href="/departments">DEPARTMENTS</a></li>
        <li class="btn-trial"><a href="/academic">ACADEMICS</a></li>
        @if(Auth::check())
          <li><a href="/logout">LOGOUT</a></li>
        @else
          <li><a href="/login">SIGN IN</a></li>
        @endif


      </ul>
    </div>
  </div>
</nav>
<!--/ Navigation bar-->
