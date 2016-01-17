@extends('layout.master')

@section('title')
    overview
@endsection


@section('container')
<div class="related row">
  <div class="col-md-offset-2 col-md-8 row">
  <h2 class="blue-text">Overzicht</h2>


    @foreach($random_art as $key => $art)
    <div class="col-md-3 pieceOverview">
      <img class="img-responsive" src="../{{$pictures[$key][0]->path }}">
      <div class="row">
        <div class="col-md-offset-1 related-info">
          <p class="blue-text">{{ $art->creation_y }}, {{ $art->artist }}</p>
          <h3>{{ $art->title }}</h3>
          <p class="price"> {{ $art->price }}</p>
          <div class="row extra">
            <p class="col-md-12">
              {{ $duration[$key]->d }}d {{ $duration[$key]->h }}u {{ $duration[$key]->i }}m
               </p>
            <a class="col-md-12 blue-text" href="#"> {!! trans('detail.visit') !!} > </a>
          </div>
        </div>
      </div>
    </div>
    @endforeach


  </div>

</div>
<div class="row text-center">
  {!! $random_art->render() !!}
</div>
@endsection
