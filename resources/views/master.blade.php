<!DOCTYPE html>
<html lang="en">
<head>
  <title>@yield('title')</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  </head>
<body>
<nav class="navbar">
  <div class="container-float">
    <div class="row">
      <div class="navbar-header col-md-offset-2 col-md-1">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span> 
        </button>
        <a class="navbar-brand" href="#">landoretti</a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav upper col-md-6">
          <li class="active"><a href="#"><span class="glyphicon glyphicon-align-justify"> watchlist</a></li>
          <li role="separator" class="divider-vertical"></li>
          <li><a href="#"><span class="glyphicon glyphicon-user"> profile</a></li>
          <li role="separator" class="divider-vertical"></li>
          <li><a href="#">logout</a></li> 
        </ul>
        <div class="col-md-2">
          <ul class="nav navbar-nav navbar-right">
            <form class="navbar-form" role="search">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search" name="q">
                <div class="input-group-btn">
                    <button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-search"></span></button>
                </div>
            </div>
            </form>
          </ul>
        </div>
      </div>
    </div>

    
      <div class="collapse navbar-collapse row" id="myNavbar2">
        <div class="col-md-offset-3 col-md-6">
          <ul class="nav navbar-nav upper ">
            <li><a href="#">home</a></li>
            <li><a href="#">art</a></li>
            <li><a href="#">search</a></li> 
            <li><a href="#">myauctions</a></li>
            <li><a href="#">Mybids</a></li>
            <li><a href="#">contact</a></li> 
          </ul>
        </div>
        <div class="col-md-2">
          <ul class="nav navbar-nav navbar-right upper">
            <li><a href="#">nl</a></li>
            <li><a href="#">fr</a></li>
            <li><a href="#">en</a></li> 
          </ul>
        </div>
        <div class="col-md-1"></div>
      </div>
    
  </div>
</nav>

<div class="container-float">
   @if(Session::get('errors'))
        <div class="alert alert-danger alert-dismissable">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h5>Er waren errors bij het toevoegen</h5>
          @foreach($errors->all(':message') as $message)
           <li > {{$message}} </li>
          @endforeach
        </div>
      @endif
      @if (!empty($success))
        <div class="alert alert-success">
          {{ $success }}
        </div>
      @endif
  @yield('container')
</div>
</body>
	<!-- <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"> 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>-->
  <link rel="stylesheet" href="/css/bootstrap.min.css">
  <script src="/js/jquery.min.js"></script>
  <script src="/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="/css/style.css">
  
  
 
</html>