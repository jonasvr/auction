@extends('layout.master')

@section('title')
    myBids
@endsection


@section('container')
  <div class="row">
    <div class="col-md-offset-2 text-capitalize blue-text">
      <div class="row">
        <h1>my bids</h1>
        </div>



      <div class="row">
        <h2>my  on going bids</h2>
        <h3 class="col-md-3">
         Title
        </h3>
        <h3 class="col-md-3">
          Bid
        </h3>
        <h3 class="col-md-3">
          bidded at:
        </h3>
        <h3 class="col-md-3">
          ending at:
        </h3>
      @foreach($allBids as $bid)
        <p class="col-md-3">
          <a href="{{ URL::route('detail',['id'=>$bid->art_id]) }}"> {{ $bid->title }}</a>
        </p>
        <p class="col-md-3">
          {{ $bid->bid }}
        </p>
        <p class="col-md-3">
          {{ $bid->updated_at }}
        </p>
        <p class="col-md-3">
          {{ $bid->ending }}
        </p>

      @endforeach
      </div>
      @if(empty($iBought))

      <div class="row">
        <h2>What you Bought</h2>
        <h3 class="col-md-4">
         Title
        </h3>
        <h3 class="col-md-4">
          Bid
        </h3>
        <h3 class="col-md-4">
          bought at:
        </h3>
      @foreach($iBought as $buys)
        <p class="col-md-4">
           {{ $buys->title }}
        </p>
        <p class="col-md-4">
          {{ $buys->sold_for }}
        </p>
        <p class="col-md-4">
          {{ $buys->updated_at }}
        </p>


      @endforeach
      </div>

    @endif
    </div>
  </div>
@endsection
