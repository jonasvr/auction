@extends('layout.master')


@section('title')
    FAQ
@endsection


@section('container')
  @if($onePiece !='empty')
      @include('layout.header',['onePiece' => $onePiece])
  @endif


<div class="FAQ">
  <div class="row links">
    <h2 class="col-md-offset-2 col-md-8">{!! trans('faq.find') !!}?</h2>
    <div class="row col-md-offset-2 col-md-8">
      @foreach($faqs as $key => $faq)
        <a class="col-md-3 padding-10" href="#{{$key}}"> {!! $faq->question !!}</a>
      @endforeach
    </div>
    <div class="row">
      <a class="btn btn-default col-md-offset-9 col-md-1 grey-back blue-text" href="{{'isearch'}}"> {!! trans('faq.search')!!} ></a>
    </div>
  </div>

  <div class="row awnsers">
    @foreach($faqs as $key => $faq)
    <div class="row question blue-text">
      <p id="{{$key}}" class="col-md-offset-2 col-md-1 Q blue-text text-left"> Q</p>
      <p class="col-md-5 QT blue-text text-left"> {!! $faq->question !!}</p>
    </div>
    <div class="row">
      <p class="col-md-offset-2 col-md-1 A"> A</p>
      <p class="col-md-6 T">  {!! $faq->awnser !!}
      </p>
    </div>
    @endforeach
</div>



@endsection
