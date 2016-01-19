@extends('layout.master')

@section('title')
    Watchlist
@endsection


@section('container')
<div class="row blue-text">

  <h1 class="col-md-offset-2 col-md-10 text-capitalize">Watchlist</h1>

  <div class="col-md-offset-3 col-md-8 row">
    <h2 class="text-capitalize">on my list</h2>
    <h3 class="col-md-4">
     Title
    </h3>
    <h3 class="col-md-4">
      Ending at:
    </h3>
    <h3 class="col-md-4">
      Delete
    </h3>
  @foreach($list as $art)
    <p class="col-md-4">
      <a href="{{ URL::route('detail',['id'=>$art->art_id]) }}"> {{ $art->title }}</a>
    </p>
    <p class="col-md-4">
      {{ $art->ending }}
    </p>
    <p class="col-md-4">
      <a href="{{ URL::route('deleteWL', ['art_id'=>$art->id]) }}"><span class="glyphicon glyphicon-remove"></span></a>
    </p>

  @endforeach
  </div>
  <div class="row text-center">
    {!! $list->render() !!}
  </div>
</div>

@endsection
