@extends('layout.master')

@section('title')
    myAuctions
@endsection


@section('container')
  <div class="row">
    <div class="col-md-offset-2 text-capitalize blue-text">
      <div class="row">
        <h1>my auctions</h1>
        <a class="col-md-offset-9" href="{{ URL::route('new') }}"><span class="glyphicon glyphicon-plus"></span>add a new auction</a>
      </div>



      <div class="row">
        <h2>active auctions</h2>
        <h3 class="col-md-3">
         Title
        </h3>
        <h3 class="col-md-3">
          Bids
        </h3>
        <h3 class="col-md-3">
          highest bid
        </h3>
        <h3 class="col-md-3">
          ending at:
        </h3>
      @foreach($active as $auction)

        <p class="col-md-3">
          <a href="{{ URL::route('detail',['id'=>$auction->id]) }}"> {{ $auction->title }}</a>
        </p>
        <p class="col-md-3">
          {{ $auction->bids }}
        </p>
        <p class="col-md-3">
          {{ $auction->highest }}
        </p>
        <p class="col-md-3">
          {{ $auction->ending }}
        </p>

      @endforeach
      </div>


      <div class="row">
        <h2>sold auctions</h2>
        <h3 class="col-md-3">
          Title
        </h3>
        <h3 class="col-md-3">
          Bids
        </h3>
        <h3 class="col-md-3">
          sold for
        </h3>
        <h3 class="col-md-3">
          ended at:
        </h3>
      @foreach($sold as $auction)

        <p class="col-md-3">
          {{ $auction->title }}
        </p>
        <p class="col-md-3">
          {{ $auction->bids }}
        </p>
        <p class="col-md-3">
          {{ $auction->sold_for }}
        </p>
        <p class="col-md-3">
          {{ $auction->ending }}
        </p>

      @endforeach
      </div>
    </div>
  </div>
@endsection
