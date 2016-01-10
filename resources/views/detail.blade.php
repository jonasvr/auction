@extends('layout.master')


@section('title')
    auction
@endsection


@section('container')
  @include('layout.header',['art_id' => $art->id])
  <!-- end header -->

  <div class="wrapper-details">
    <div class="row">
      <div class="col-md-offset-2 col-md-7">
          <h2> {{$art->title}} </h2>
      </div>
      <div class="col-md-3"></div>

      <div class="col-md-offset-2 col-md-7">
          <p>
            25d 14u 44m
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
              {!! Html::image($picture->path, 'a picture of art', array('class' => 'col-md-4 img-responsive')) !!}
            @endforeach
          </div>
        </div>

        <!-- data rechts -->
        <div class="col-md-3 text-right">
          <h3> {{$art->title}}</h3>
          <p class="blue-text">
            adres
          </p>

          <p class="green-text">
            25d 14u 44m left
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

          <p class="blue-text">
            {!! trans('detail.estimated') !!} <br />
            <span class="price"> €9.500 - €10.500</span><br />
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
            <a class="blue-text" href="{{ URL::route('addToWl', ['id'=> $art->id] ) }}">
              <span class="glyphicon glyphicon-menu-hamburger">
              </span>
              <u> {!! trans('detail.add') !!} </u>
            </a>
          </p>
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
        <!-- Trigger the modal with a button -->
        <button type="button" class="btn-default col-md-11 question" data-toggle="modal" data-target="#modalQ">
          {{ trans('detail.askButton') }}
        </button>

        <!-- Modal -->
        <div id="modalQ" class="modal fade" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">{{ trans('detail.qAsk') }}</h4>
              </div>
              <div class="modal-body row col-md-offset-2 col-md-8">
                {!! Form::open(array('url' => URL::route('ask'), 'method' => 'post', 'class' => 'form-horizontal')) !!}
                <div class="form-group">
                      {!! Form::label('question', trans('detail.qTitle',['title' => $art->title])) !!}
                      {!! Form::text('question','',array('class' => 'form-control'))!!}
                      {!! Form::hidden('art_id', $art->id)!!}
                </div>
                <div class="form-group">
        		        <button type="submit" class="btn btn-default">{{ trans('detail.ask') }}</button>
        		    </div>
                {!! Form::close()!!}
              </div>
              <div class="modal-footer"></div>
            </div>

          </div>
        </div>

      </div>
    </div>
  </div>

  <div class="related row">
    <div class="col-md-offset-2 col-md-8 row">
    <h2 class="blue-text">{!! trans('detail.related') !!}</h2>

      <div class="col-md-3">
        <img class="img-responsive" src="img/2.jpg">
        <div class="row">
          <div class="col-md-offset-1 related-info">
            <p class="blue-text">1979, Salvador Dali</p>
            <h3>Dance of time III</h3>
            <p class="price"> 8.900</p>
            <div class="row extra">
              <p class="col-md-6"> 25d 14u 44m</p>
              <a class="col-md-6 blue-text" href="#"> {!! trans('detail.visit') !!} > </a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <img class="img-responsive" src="img/2.jpg">
        <div class="row">
          <div class="col-md-offset-1 related-info">
            <p class="blue-text">1979, Salvador Dali</p>
            <h3>Dance of time III</h3>
            <p class="price"> 8.900</p>
            <div class="row extra">
              <p class="col-md-6"> 25d 14u 44m</p>
              <a class="col-md-6 blue-text" href="#"> visit auction > </a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <img class="img-responsive" src="img/2.jpg">
        <div class="row">
          <div class="col-md-offset-1 related-info">
            <p class="blue-text">1979, Salvador Dali</p>
            <h3>Dance of time III</h3>
            <p class="price"> 8.900</p>
            <div class="row extra">
              <p class="col-md-6"> 25d 14u 44m</p>
              <a class="col-md-6 blue-text" href="#"> visit auction > </a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <img class="img-responsive" src="img/2.jpg">
        <div class="row">
          <div class="col-md-offset-1 related-info">
            <p class="blue-text">1979, Salvador Dali</p>
            <h3>Dance of time III</h3>
            <p class="price"> 8.900</p>
            <div class="row extra">
              <p class="col-md-6"> 25d 14u 44m</p>
              <a class="col-md-6 blue-text" href="#"> visit auction > </a>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
@endsection
