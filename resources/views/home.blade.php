@extends('master')

@section('title')
    auction
@endsection


@section('container')   

<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
    <li data-target="#myCarousel" data-slide-to="3"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="img/1.jpg" alt="Chania">
      <div class="carousel-caption">
        <p>The atmosphere in Chania has a touch of Florence and Venice.</p>
      </div>
    </div>

    <div class="item">
      <img src="img/2.jpg" alt="Chania">
      <div class="carousel-caption">
        <p>The atmosphere in Chania has a touch of Florence and Venice.</p>
      </div>
    </div>

    <div class="item">
      <img src="img/3.jpg" alt="Flower">
      <div class="carousel-caption">
        <p>Beatiful flowers in Kolymbari, Crete.</p>
      </div>
    </div>

    <div class="item">
      <img src="img/4.jpg" alt="Flower">
      <div class="carousel-caption">
        <p>Beatiful flowers in Kolymbari, Crete.</p>
      </div>
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<div id="intro">
 <p class="introTitle text-center">{!! trans('home.howdoesitwork') !!}</p>
  <div class="row">

    <div class="col-md-offset-2 col-md-2" class="img-responsive">
      <img src="img/intro1.png" >
      <h3>{!! trans('home.signUp') !!}  </h3> 
      <div class="introText">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
      </div>
    </div>
    <div class="col-md-offset-1 col-md-2" class="img-responsive">
      <img src="img/intro2.png" >
      <h3> {!! trans('home.makeDeals') !!}   </h3> 
      <div class="introText">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
      </div>
    </div>
    <div class="col-md-offset-1 col-md-2" class="img-responsive">
       <img src="img/intro3.png">
      
       <h3> {!! trans('home.everyoneHappy') !!}  </h3> 
      <div class="introText">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
      </div>
    </div>
  </div>
</div>


<div id="popular">
  <p class="introTitle">most popular this week?</p>
  <div class="row">
    <div class="less col-md-offset-1 col-md-3">
        <a class="image row"  href="#">
        <span class="rollover" ></span>
        <img class="imgborder img-responsive" alt="" src="img/6.jpg">      
      </a>
      <a class="image row"  href="#">
        <span class="rollover" ></span>
        <img class="imgborder img-responsive" alt="" src="img/7.jpg">      
      </a>
    </div>
    <a class="image most col-md-6 overlay"  href="#">
      <span class="rollover" ></span>
      <img class="imgborder img-responsive" alt="" src="img/5.jpg">      
    </a>
  </div>
</div>
@endsection

 