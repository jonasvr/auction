@extends('layout.master')


@section('title')
    Home
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
    @foreach($random_art as $key => $art)
    <div class="item @if($key==0)active @endif">
      <img src="{{ $art->path }}" alt="{{ $art->title }}">
      <div class="carousel-caption">
        <p>{{ $art->description }}</p>
      </div>
    </div>
    @endforeach
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
      <img src="img/intro1.png" alt="{!! trans('home.signUp') !!}">
      <h3>{!! trans('home.signUp') !!}  </h3>
      <div class="introText">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
      </div>
    </div>
    <div class="col-md-offset-1 col-md-2" class="img-responsive">
      <img src="img/intro2.png" alt=" {!! trans('home.makeDeals') !!}">
      <h3> {!! trans('home.makeDeals') !!}   </h3>
      <div class="introText">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
      </div>
    </div>
    <div class="col-md-offset-1 col-md-2" class="img-responsive">
       <img src="img/intro3.png" alt="{!! trans('home.everyoneHappy') !!} ">
       <h3> {!! trans('home.everyoneHappy') !!}  </h3>
      <div class="introText">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
      </div>
    </div>
  </div>
</div>

@if(isset($popular[2]))


<div id="popular">
  <p class="introTitle">{!! trans('home.most') !!}</p>
  <div class="row">

    <div class="less col-md-offset-1 col-md-3">
      <div class="image-container">
        <a href="{{ URL::route('detail', ['id'=> $popular[0]->art_id]) }}">
          <img class="img-responsive" alt="" src="/{{$picture[0][0]->path}}">
          <div class="after">
            <img class="mag" src="img/mag.png">
          </div>
        </a>
      </div>
      <div class="image-container">
        <a href="{{ URL::route('detail', ['id'=> $popular[0]->art_id]) }}">
          <img class="img-responsive" alt="" src="/{{$picture[1][0]->path}}">
          <div class="after">
            <img class="mag" src="img/mag.png">
          </div>
        </a>
      </div>
    </div>
    <div class="most col-md-6">
      <div class="image-container">
        <a href="{{ URL::route('detail', ['id'=> $popular[0]->art_id]) }}">
          <img class="img-responsive mostimg" alt="" src="/{{$picture[2][0]->path}}">
          <div class="after">
            <img class="mag" src="img/mag.png">
          </div>
        </a>
      </div>
    </div>
  </div>
</div>
@endif
@endsection
