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
              <li><a href="{{ url('auth/register') }}">{!! trans('master.register') !!}</a></li>
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
        @if (isset($success))
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
            <li><a href="{{ url('auth/login') }}">{!! trans('master.login') !!}</a></li>
            <li><a href="{{ url('auth/register') }}">{!! trans('master.register') !!}</a></li>
            <li><a href="{{ url('auth/reset') }}">reset</a></li>
          </ul>
          <ul class="nav nav-pills nav-stacked">
            <li><p class="footerTitles">help</p></li>
            <li><a href="#">Terms of Service</a></li>
            <li><a href="#">Privacy Policy</a></li>
            <li><a href="URL::route('faq')">FAQ</a></li>
            <li><a href="URL::route('contact')">Contact Us</a></li>
            <li><a href="#">About Us</a></li>
          </ul>
          <ul class="nav nav-pills nav-stacked">
            <li><p class="footerTitles">{!! trans('master.languages') !!}</p></li>
            <li><a href="{{ URL::route('language', array('lng' => 'nl')) }}">Nederlands</a></li>
            <li><a href="{{ URL::route('language', array('lng' => 'en')) }}">English</a></li>
          </ul>
        </div>
        <div class="col-md-3">
          <ul class="nav nav-pills nav-stacked">
            <li><p class="footerTitles">{!! trans('styles.style') !!}</p></li>
            <li><a href="{{ URL::route('overviewFilter', ['filter'=>'style', 'value'=> 1]) }}">{!! trans('styles.Abstract') !!}</a></li>
            <li><a href="{{ URL::route('overviewFilter', ['filter'=>'style', 'value'=> 2]) }}">{!! trans('styles.African') !!}</a></li>
            <li><a href="{{ URL::route('overviewFilter', ['filter'=>'style', 'value'=> 3]) }}">{!! trans('styles.Asian') !!}</a></li>
            <li><a href="{{ URL::route('overviewFilter', ['filter'=>'style', 'value'=> 4]) }}">{!! trans('styles.Cemceptual') !!}</a></li>
            <li><a href="{{ URL::route('overviewFilter', ['filter'=>'style', 'value'=> 5]) }}">{!! trans('styles.Contemporary') !!}</a></li>
            <li><a href="{{ URL::route('overviewFilter', ['filter'=>'style', 'value'=> 6]) }}">{!! trans('styles.Emerging') !!}</a></li>
            <li><a href="{{ URL::route('overviewFilter', ['filter'=>'style', 'value'=> 7]) }}">{!! trans('styles.Figurative') !!}</a></li>
            <li><a href="{{ URL::route('overviewFilter', ['filter'=>'style', 'value'=> 8]) }}">{!! trans('styles.Middle') !!}</a></li>
            <li><a href="{{ URL::route('overviewFilter', ['filter'=>'style', 'value'=> 9]) }}">{!! trans('styles.Mini') !!}</a></li>
            <li><a href="{{ URL::route('overviewFilter', ['filter'=>'style', 'value'=> 10]) }}">{!! trans('styles.Modern') !!}</a></li>
            <li><a href="{{ URL::route('overviewFilter', ['filter'=>'style', 'value'=> 11]) }}">{!! trans('styles.Pop') !!}</a></li>
            <li><a href="{{ URL::route('overviewFilter', ['filter'=>'style', 'value'=> 12]) }}">{!! trans('styles.Urban') !!}</a></li>
            <li><a href="{{ URL::route('overviewFilter', ['filter'=>'style', 'value'=> 13]) }}">{!! trans('styles.Vintage') !!}</a></li>
          </ul>
           <ul class="nav nav-pills nav-stacked">
            <li><p class="footerTitles">{!! trans('styles.style') !!}</p></li>
            <li><a href="{{ URL::route('overviewFilter', ['filter'=>'style', 'value'=> 14]) }}">{!! trans('styles.Design') !!}</a></li>
            <li><a href="{{ URL::route('overviewFilter', ['filter'=>'style', 'value'=> 15]) }}">{!! trans('styles.Paintings') !!}</a></li>
            <li><a href="{{ URL::route('overviewFilter', ['filter'=>'style', 'value'=> 16]) }}">{!! trans('styles.Photographs') !!}</a></li>
            <li><a href="{{ URL::route('overviewFilter', ['filter'=>'style', 'value'=> 17]) }}">{!! trans('styles.Prints') !!}</a></li>
            <li><a href="{{ URL::route('overviewFilter', ['filter'=>'style', 'value'=> 18]) }}">{!! trans('styles.Sculpture') !!}</a></li>
          </ul>
        </div>
        <div class="col-md-3">
          <ul class="nav nav-pills nav-stacked">
            <li><p class="footerTitles">{!! trans('master.price') !!}</p></li>
            <li><a href="{{ URL::route('overviewFilter', ['filter'=>'price', 'value'=> '5000']) }}">{!! trans('master.up') !!} 5,000</a></li>
            <li><a href="{{ URL::route('overviewFilter', ['filter'=>'price', 'value'=> '10000']) }}">5,000-10,000</a></li>
            <li><a href="{{ URL::route('overviewFilter', ['filter'=>'price', 'value'=> '25000']) }}">10,000-25,000</a></li>
            <li><a href="{{ URL::route('overviewFilter', ['filter'=>'price', 'value'=> '50000']) }}">25,000-50,000</a></li>
            <li><a href="{{ URL::route('overviewFilter', ['filter'=>'price', 'value'=> '100000']) }}">50,000-100,000</a></li>
            <li><a href="{{ URL::route('overviewFilter', ['filter'=>'price', 'value'=> 'up']) }}">{!! trans('master.above') !!}</a></li>
          </ul>
          <ul class="nav nav-pills nav-stacked">
            <li><p class="footerTitles">{!! trans('master.era') !!}</p></li>
            <li><a href="{{ URL::route('overviewFilter', ['filter'=>'era', 'value'=> 1]) }}">{!! trans('master.pre') !!}</a></li>
            <li><a href="{{ URL::route('overviewFilter', ['filter'=>'era', 'value'=> 2]) }}">1940s-1950s</a></li>
            <li><a href="{{ URL::route('overviewFilter', ['filter'=>'era', 'value'=> 3]) }}">1960s-1980s</a></li>
            <li><a href="{{ URL::route('overviewFilter', ['filter'=>'era', 'value'=> 4]) }}">1980s-{!! trans('master.present') !!}</a></li>
          </ul>
          <ul class="nav nav-pills nav-stacked">
            <li><p class="footerTitles">{!! trans('master.ending') !!}</p></li>
            <li><a href="{{ URL::route('overviewFilter', ['filter'=>'when', 'value'=> 'weekend']) }}">{!! trans('master.this') !!}</a></li>
            <li><a href="{{ URL::route('overviewFilter', ['filter'=>'when', 'value'=> 'new']) }}">{!! trans('master.newly') !!}</a></li>
            <li><a href="{{ URL::route('overviewFilter', ['filter'=>'when', 'value'=> 'now']) }}">{!! trans('master.now') !!}</a></li>
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
