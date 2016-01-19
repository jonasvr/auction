@extends('layout.master')


@section('title')
      {{$art->title}}
@endsection


@section('container')
  @include('layout.header',['art_id' => $art->id,'onePiece' => $onePiece])
  <!-- end header -->

  <div class="wrapper-details">
    <div class="row">
      <div class="col-md-offset-2 col-md-7">
          <h1 class="text-capitalize"> {{$art->title}} </h1>
      </div>
      <div class="col-md-3"></div>

      <div class="col-md-offset-2 col-md-7">
          <p @if( $duration->d < 1) class="red-text"@endif>
            {{ $duration->d }}d {{ $duration->h }}u {{ $duration->i }}m

            <span class="blue-text">
              ({{ $nrbids }})
              <span class="glyphicon glyphicon-menu-hamburger"></span>
            </span>
          </p>
      </div>
      <div class="col-md-3"></div>
    </div>

    <!-- data links images -->
      <div class="detailDataBlock row">
        <div class="col-md-offset-2 col-md-6 detailImages">
          <div class="row white-overlay">

          {!! Html::image($headpicture->path, 'a picture of art', array('class' => 'col-md-12 img-responsive')) !!}
            @foreach($pictures as $picture)
              {!! Html::image($picture->path, 'a picture of art', array('class' => 'col-md-4 img-responsive height-150')) !!}
            @endforeach
          </div>
        </div>

        <!-- data rechts -->
        <div class="col-md-3 text-right">
          <h3 class="text-capitalize"> {{$art->title}}</h3>
          <p class="blue-text">
            adres
          </p>

          <p @if( $duration->d < 1) class="red-text" @else class="green-text" @endif>
            {{ $duration->d }}d {{ $duration->h }}u {{ $duration->i }}m {{ trans('detail.left') }}
            <div id="clockdiv"></div>
          </p>

          <p>September 09, 2013, 13:00 p.m. (EST)</p>
          <hr />
          <p class="info-block">
              Lorem ipsum dolor sit amet, ut duo odio electram cotidieque, ridens placerat complectitur
          </p>
          <a class="black-link" href="#">
            <strong>
              <u>
                {!! trans('detail.more') !!}
              </u>
            </strong>
          </a>

          <hr />


          @if(Auth::user()->id != $art->user_id)
          <p class="blue-text">
            {!! trans('detail.estimated') !!} <br />
            {{-- <span class="price"> {{ €$art->min }} - €{{ $art->max }}</span><br /> --}}
            <a class="green-text" href="{{ URL::route('buynow', ['art_id'=> $art->id]) }}"> <u>{!! trans('detail.buy',['askingprice' => $art->price]) !!} </u></a>
          </p>
          <p>{!! trans('detail.bid') !!}?</p>
          {!! Form::open(array('url' => URL::route('bid'), 'method' => 'post', 'class' => 'form-horizontal bid')) !!}
            <div class="input-group">
                  {!! Form::text('bid','',array('class' => 'form-control', 'placeholder' => 'bid'))!!}
                  {!! Form::hidden('art', $art->id)!!}
                  <div class="input-group-addon">
                      <button type="submit"  class="text-uppercase"> {!! trans('detail.bidnow') !!} > </button>
                  </div>
              </div>
          {!! Form::close() !!}
          <p class="text-center">
            @if($watchlist)
            <div class="blue-text ">
              <span class="glyphicon glyphicon-menu-hamburger">
              </span>
              <u> {!! trans('detail.on') !!} </u>
            </div>
            @else
            <a class="blue-text" href="{{ URL::route('addToWl', ['id'=> $art->id] ) }}">
              <span class="glyphicon glyphicon-menu-hamburger">
              </span>
              <u> {!! trans('detail.add') !!} </u>
            </a>
            @endif
          </p>
          @endif

        </div>
    </div>

    <div class="row detail-Description-enCo text-left">
      <!-- description condition -->
      <div class="col-md-offset-2 col-md-6">

      <strong>{!! trans('detail.description') !!}</strong>
      <p>
          {{$art->description}}
      </p>

      <strong>{!! trans('detail.condition') !!}</strong>
      <p>
          {{$art->condition}}
      </p>
      </div>


      <div class="col-md-offset-1 col-md-2">
        <strong>{!! trans('detail.artist') !!}</strong>
        <p>
          {{$art->artist}}
        <br />
          {{$art->country}}
        <br />
          {{$art->birth}}-{{$art->death}}
        </p>

        <strong>{!! trans('detail.dimensions') !!}</strong>
        <p>
          {{$art->dimensions}}
        </p>

        <strong>{!! trans('detail.color') !!}</strong>
        <p>
          {{$art->color}}
        </p>
        @if(Auth::user()->id != $art->user_id)
          <a href="{{ URL::route('artcontact', ['art_id' => $art->id,'title'=>$art->title]) }}" class="btn-default col-md-11 question">
            {{ trans('detail.askButton') }}
          </a>
        @endif
      </div>
    </div>
  </div>

  <div class="related row">
    <div class="col-md-offset-2 col-md-8 row">
    <h2 class="blue-text">{!! trans('detail.related') !!}</h2>

    @foreach($related as $key => $relatedArt)
    <div class="col-md-3">
      <img class="img-responsive" src="/{{ $relatedArt->path }}">
      <div class="row">
        <div class="col-md-offset-1 related-info">
          <p class="blue-text">{{ $relatedArt->creation_y }}, {{ $relatedArt->artist }}</p>
          <h3>{{ $relatedArt->title }}</h3>
          <p class="price">{{ $relatedArt->price }}</p>
          <div class="row extra">
            <p  @if( $duration->d < 1) class="col-md-12 red-text" @else class="col-md-12" @endif > {{ $relDuration[$key]->d }}d {{ $relDuration[$key]->h }}u {{ $relDuration[$key]->i }}m </p>
            <a class="col-md-12 blue-text" href="{{ URL::route('detail', ['id'=> $relatedArt->id]) }}"> {!! trans('detail.visit') !!} > </a>
          </div>
        </div>
      </div>
    </div>
    @endforeach
    </div>
  </div>
@endsection
@section('js')
  <script type="text/javascript">
  $(document).ready(function(){
    function getTimeRemaining(endtime){
      var days    = <?php echo $duration->d; ?>;
      var hours   = <?php echo $duration->h; ?>;
      var minutes = <?php echo $duration->i; ?>;
    return {
      'days': days,
      'hours': hours,
      'minutes': minutes
    };
  }

  function initializeClock(id){
    var clock = document.getElementById(id);
    var timeinterval = setInterval(function(){
      var t = getTimeRemaining();
      clock.innerHTML = 'days: ' + t.days + '<br>' +
                        'hours: '+ t.hours + '<br>' +
                        'minutes: ' + t.minutes;
      if(t.total<=0){
        clearInterval(timeinterval);
      }
    },60000);
  }

  initializeClock('clockdiv');
  });


  </script>

@endsection
