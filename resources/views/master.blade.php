<!DOCTYPE html>
<html lang="en">
<head>
  <title>@yield('title')</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="img/favicon.gif" type="image/gif" sizes="16x16">
  </head>
  <body>
  <nav class="navbar navbar-default" role="navigation">
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
                  <div class="input-group-addon">
                      <button class="glyphicon glyphicon-search" type="submit"></button>
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


  <div class="container text-left text-capitalize">
      <hr />
    <div class="row footer ">
      <div class="col-lg-12">
        <div class="col-md-3">
          <ul class="nav nav-pills nav-stacked">
            <li><p class="footerTitles">help</p></li>
            <li><a href="#">login</a></li>
            <li><a href="#">register</a></li>
          </ul>
          <ul class="nav nav-pills nav-stacked">
            <li><p class="footerTitles">help</p></li>
            <li><a href="#">Terms of Service</a></li>
            <li><a href="#">Privacy Policy</a></li>
            <li><a href="#">FAQ</a></li>
            <li><a href="#">Contact Us</a></li>
            <li><a href="#">About Us</a></li>
          </ul>
          <ul class="nav nav-pills nav-stacked">
            <li><p class="footerTitles">Languages</p></li>
            <li><a href="#">Nederlands</a></li>
            <li><a href="#">Français</a></li>
            <li><a href="#">English</a></li>
          </ul>
        </div>
        <div class="col-md-3">
          <ul class="nav nav-pills nav-stacked">
            <li><p class="footerTitles">style</p></li>
            <li><a href="#">Abstract</a></li>
            <li><a href="#">African American</a></li>
            <li><a href="#">Asian Contemporary</a></li>
            <li><a href="#">Cemceptual</a></li>
            <li><a href="#">Contemporary</a></li>
            <li><a href="#">Emerging Artist</a></li>
            <li><a href="#">Figurative</a></li>
            <li><a href="#">Middle Eastern Contemporary</a></li>
            <li><a href="#">Minimalism</a></li>
            <li><a href="#">Modern</a></li>
            <li><a href="#">pop</a></li>
            <li><a href="#">Urban</a></li>
            <li><a href="#">Vintage Photographs</a></li>
          </ul>
           <ul class="nav nav-pills nav-stacked">
            <li><p class="footerTitles">style</p></li>
            <li><a href="#">design</a></li>
            <li><a href="#">paintings and Works on Paper</a></li>
            <li><a href="#">Photographs</a></li>
            <li><a href="#">prints and Multiples</a></li>
            <li><a href="#">Sculpture</a></li>
          </ul>
        </div>
        <div class="col-md-3">
          <ul class="nav nav-pills nav-stacked">
            <li><p class="footerTitles">Price</p></li>
            <li><a href="#">Up to 5,000</a></li>
            <li><a href="#">5,000-10,000</a></li>
            <li><a href="#">10,000-25,000</a></li>
            <li><a href="#">25,000-50,000</a></li>
            <li><a href="#">50,000-100,000</a></li>
            <li><a href="#">above</a></li>
          </ul>
          <ul class="nav nav-pills nav-stacked">
            <li><p class="footerTitles">era</p></li>
            <li><a href="#">Pre-War</a></li>
            <li><a href="#">1940s-1950s</a></li>
            <li><a href="#">1960s-1980s</a></li>
            <li><a href="#">1980s-Present</a></li>
          </ul>
          <ul class="nav nav-pills nav-stacked">
            <li><p class="footerTitles">ending</p></li>
            <li><a href="#">Nederlding this Weekands</a></li>
            <li><a href="#">Newly Listed</a></li>
            <li><a href="#">Purchase Now</a></li>
          </ul>
        </div>
        <div class="col-md-3">
          <ul class="nav nav-pills nav-stacked">
            <li><p class="footerTitles">find what you need.</p></li>
            <form class="navbar-form" role="search">
              <div class="input-group">
                  <input type="text" class="form-control" placeholder="Search" name="q">
                  <div class="input-group-btn">
                      <button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-search"></span></button>
                  </div>
              </div>
              </form>
          </ul>
          <ul class="nav nav-pills nav-stacked">
            <li><p class="footerTitles">contact</p></li>
            <li>Landerotti ART</li>
            <li>Straatnaam XXX</li>
            <li>XXX, Oostende</li>
            <br \>
            <li><span class="glyphicon glyphicon-earphone"></span> +XX, (0)X XXX XX XX</li>
            <li><span class="glyphicon glyphicon-envelope"></span><a href="mailto:info@landorettiart.com" target="_top">info@landorettiart.com</a></li>
          </ul>
        </div>  
      </div>
    </div>
    <hr>
    </div>
      <div class="container-float row">
          <div class="col-lg-12">
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
      </div>
  
  </body>
  <link rel="stylesheet" href="/css/bootstrap.min.css">
  <script src="/js/jquery.min.js"></script>
  <script src="/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="/css/style.css">
  
  
 
</html>