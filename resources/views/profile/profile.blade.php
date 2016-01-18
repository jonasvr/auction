@extends('layout.master')

@section('title')
    profile
@endsection


@section('container')
<div class="row blue-text">

  <h1 class="col-md-offset-2 col-md-10">profile</h1>
  <a href="{{ URL::route('myAuctions') }}">
    <div class="col-md-offset-2 col-md-4 text-center" class="img-responsive">
      <img src="img/auctions.png" >
      <h3>MyAuctions  </h3>
    </div>
  </a>
  <a href="{{ URL::route('myBids') }}">
    <div class="col-md-4 text-center" class="img-responsive">
      <img src="img/bid.png" >
      <h3>MyBids  </h3>
    </div>
  </a>
</div>

@endsection
