@extends('layout.master')


@section('title')
    auction
@endsection


@section('container')
@include('layout.header',['onePiece' => $onePiece])

<div class="FAQ">
  <div class="row links">
    <h2 class="col-md-offset-2 col-md-8">{!! trans('faq.find') !!}?</h2>
    <div class="row col-md-offset-2 col-md-8">
      <a class="col-md-3" href="#bid"> {!! trans('faq.bid') !!}?</a>
      <a class="col-md-3" href="#buy"> {!! trans('faq.buy') !!}?</a>
      <a class="col-md-3" href="#question"> {!! trans('faq.ask') !!}?</a>
      <a class="col-md-3" href="#watchlist">{!! trans('faq.watch') !!}?</a>
      <a class="col-md-3" href="#sell"> {!! trans('faq.sell') !!}?</a>
      <a class="col-md-3" href="#register"> {!! trans('faq.register') !!}?</a>
      <a class="col-md-3" href="#whatis"> {!! trans('faq.what') !!}?</a>
    </div>
    <div class="row">
      <a class="btn btn-default col-md-offset-9 col-md-1 grey-back blue-text" href="{{'isearch'}}"> {!! trans('faq.search')!!} ></a>
    </div>
  </div>

  <div class="row awnsers">
    @foreach($faqs as $faq)
    <div class="row question blue-text">
      <p id="bid" class="col-md-offset-2 col-md-1 Q"> Q</p>
      <p class="col-md-5 QT"> {!! $faq->question !!}</p>
    </div>
    <div class="row">
      <p class="col-md-offset-2 col-md-1 A"> A</p>
      <p class="col-md-6 T">  {!! $faq->awnser !!}
      </p>
    </div>
    @endforeach
</div>



@endsection
