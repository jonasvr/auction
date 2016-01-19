<!DOCTYPE html>
<html lang="en">
<head>
  <title>@yield('title') | Auction</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="/img/favicon.gif" type="image/gif" sizes="16x16">
  <link rel="stylesheet" href="/css/bootstrap.min.css">
  <link rel="stylesheet" href="/css/style.css">

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
          <a class="navbar-brand" href="{{ url('/') }}"><img src="/img/logo.png" alt="logo" class="img-responsive"/></a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav upper col-md-6">

            @if(Auth::check())
              <li class="{{ Request::is('/watchlist') ? 'active' : '' }}"><a href="{{ url('/watchlist') }}"><span class="glyphicon glyphicon-align-justify"> {!! trans('master.watchlist') !!}</span></a></li>
              <li role="separator" class="divider-vertical"></li>
              <li class="{{ Request::is('profile') ? 'active' : '' }}"><a href="{{ url('/profile') }}"><span id="notes" class="glyphicon glyphicon-user"> {!! trans('master.profile') !!}</span></a></li>
              <li role="separator" class="divider-vertical"></li>
              <li><a href="/logout"> {!! trans('master.logout') !!}</a></li>
            @else
              <li><a href="{{ url('auth/login') }}"> login</a></li>
              <li><a href="{{ url('auth/register') }}"> {!! trans('master.register') !!}</a></li>
            @endif
          </ul>
          <div class="col-md-2">
            <ul class="nav navbar-nav navbar-right">
              {!! Form::open(array('url' => URL::route('search'), 'method' => 'post', 'class' => 'navbar-form', 'role' =>"search")) !!}

              <div class="input-group">
                  <input type="text" class="form-control" placeholder="Search" name="search">
                  <div class="input-group-addon">
                      <button class="glyphicon glyphicon-search" type="submit"></button>
                  </div>
              </div>
              {!! Form::close()!!}
            </ul>
          </div>
        </div>
      </div>


  @include('layout.nav')

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
            <li><a href="#">{!! trans('master.login') !!}</a></li>
            <li><a href="#">{!! trans('master.register') !!}</a></li>
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
            <li><p class="footerTitles">{!! trans('master.languages') !!}</p></li>
            <li><a href="#">Nederlands</a></li>
            <li><a href="#">English</a></li>
          </ul>
        </div>
        <div class="col-md-3">
          <ul class="nav nav-pills nav-stacked">
            <li><p class="footerTitles">{!! trans('styles.style') !!}</p></li>
            <li><a href="{{ URL::route('overviewStyle', ['style'=> 1]) }}">{!! trans('styles.Abstract') !!}</a></li>
            <li><a href="{{ URL::route('overviewStyle', ['style'=> 2]) }}">{!! trans('styles.African') !!}</a></li>
            <li><a href="{{ URL::route('overviewStyle', ['style'=> 3]) }}">{!! trans('styles.Asian') !!}</a></li>
            <li><a href="{{ URL::route('overviewStyle', ['style'=> 4]) }}">{!! trans('styles.Cemceptual') !!}</a></li>
            <li><a href="{{ URL::route('overviewStyle', ['style'=> 5]) }}">{!! trans('styles.Contemporary') !!}</a></li>
            <li><a href="{{ URL::route('overviewStyle', ['style'=> 6]) }}">{!! trans('styles.Emerging') !!}</a></li>
            <li><a href="{{ URL::route('overviewStyle', ['style'=> 7]) }}">{!! trans('styles.Figurative') !!}</a></li>
            <li><a href="{{ URL::route('overviewStyle', ['style'=> 8]) }}">{!! trans('styles.Middle') !!}</a></li>
            <li><a href="{{ URL::route('overviewStyle', ['style'=> 9]) }}">{!! trans('styles.Mini') !!}</a></li>
            <li><a href="{{ URL::route('overviewStyle', ['style'=> 10]) }}">{!! trans('styles.Modern') !!}</a></li>
            <li><a href="{{ URL::route('overviewStyle', ['style'=> 11]) }}">{!! trans('styles.Pop') !!}</a></li>
            <li><a href="{{ URL::route('overviewStyle', ['style'=> 12]) }}">{!! trans('styles.Urban') !!}</a></li>
            <li><a href="{{ URL::route('overviewStyle', ['style'=> 13]) }}">{!! trans('styles.Vintage') !!}</a></li>
          </ul>
           <ul class="nav nav-pills nav-stacked">
            <li><p class="footerTitles">{!! trans('styles.style') !!}</p></li>
            <li><a href="{{ URL::route('overviewStyle', ['style'=> 14]) }}">{!! trans('styles.Design') !!}</a></li>
            <li><a href="{{ URL::route('overviewStyle', ['style'=> 15]) }}">{!! trans('styles.Paintings') !!}</a></li>
            <li><a href="{{ URL::route('overviewStyle', ['style'=> 16]) }}">{!! trans('styles.Photographs') !!}</a></li>
            <li><a href="{{ URL::route('overviewStyle', ['style'=> 17]) }}">{!! trans('styles.Prints') !!}</a></li>
            <li><a href="{{ URL::route('overviewStyle', ['style'=> 18]) }}">{!! trans('styles.Sculpture') !!}</a></li>
          </ul>
        </div>
        <div class="col-md-3">
          <ul class="nav nav-pills nav-stacked">
            <li><p class="footerTitles">{!! trans('master.price') !!}</p></li>
            <li><a href="#">{!! trans('master.up') !!} 5,000</a></li>
            <li><a href="#">5,000-10,000</a></li>
            <li><a href="#">10,000-25,000</a></li>
            <li><a href="#">25,000-50,000</a></li>
            <li><a href="#">50,000-100,000</a></li>
            <li><a href="#">{!! trans('master.above') !!}</a></li>
          </ul>
          <ul class="nav nav-pills nav-stacked">
            <li><p class="footerTitles">{!! trans('master.era') !!}</p></li>
            <li><a href="#">{!! trans('master.pre') !!}</a></li>
            <li><a href="#">1940s-1950s</a></li>
            <li><a href="#">1960s-1980s</a></li>
            <li><a href="#">1980s-{!! trans('master.present') !!}</a></li>
          </ul>
          <ul class="nav nav-pills nav-stacked">
            <li><p class="footerTitles">{!! trans('master.ending') !!}</p></li>
            <li><a href="#">{!! trans('master.this') !!}</a></li>
            <li><a href="#">{!! trans('master.newly') !!}</a></li>
            <li><a href="#">{!! trans('master.now') !!}</a></li>
          </ul>
        </div>
        <div class="col-md-3">
          <ul class="nav nav-pills nav-stacked">
            <li><p class="footerTitles">{!! trans('master.find') !!}</p></li>
              {!! Form::open(array('url' => URL::route('search'), 'method' => 'post', 'class' => 'navbar-form', 'role' =>"search")) !!}
              <div class="input-group">
                  <input type="text" class="form-control" placeholder="Search" name="search">
                  <div class="input-group-btn">
                      <button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-search"></span></button>
                  </div>
              </div>
              {!! Form::close()!!}
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
@include('layout.nav')
            </div>
      </div>

  </body>

  <script src="/js/jquery.min.js"></script>
  <script src="/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script type="text/javascript" src="/js/notification.js"></script>
  @yield('js')



</html>



<!-- used links -->

<!-- set active:
http://stackoverflow.com/questions/29837555/setting-bootstrap-navbar-active-class-in-laravel-5 -->
