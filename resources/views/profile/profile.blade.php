@extends('layout.master')

@section('title')
    Profile
@endsection


@section('container')
<div class="row blue-text">
@if($notifications->count())
<div class=" col-md-offset-2 col-md-8 alert alert-info">
    <h4>Your notifications</h4>
    <ul class="list-unstyled">
      @foreach($notifications as $message)
       <li>
         <a href="{{ URL::route('deleteNot', ['not_id'=>$message->id]) }}"><span class="glyphicon glyphicon-remove"></span></a>
         {{$message->notification}}
       </li>
      @endforeach
    </ul>
  </div>
@endif


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
