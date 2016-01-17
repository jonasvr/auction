@extends('layout.master')

@section('title')
    overview
@endsection


@section('container')

<div class="related row">
  <div class="col-md-offset-2 col-md-8 row">
  <h2 class="blue-text">Overzicht</h2>
  <div class="col-md-offset-1 row">
    <p>
      <a href="#" class="filterLink">filter</a>
    </p>
    <div class="filter">
      <div class="col-md-4">
        <ul class="nav nav-pills nav-stacked">
          <li><p class="filterTitles">{!! trans('styles.style') !!}</p></li>
          <li><a href="{{ URL::route($VoS, ['filter'=>'style', 'value'=> 1]) }}">{!! trans('styles.Abstract') !!}</a></li>
          <li><a href="{{ URL::route($VoS, ['filter'=>'style', 'value'=> 2]) }}">{!! trans('styles.African') !!}</a></li>
          <li><a href="{{ URL::route($VoS, ['filter'=>'style', 'value'=> 3]) }}">{!! trans('styles.Asian') !!}</a></li>
          <li><a href="{{ URL::route($VoS, ['filter'=>'style', 'value'=> 4]) }}">{!! trans('styles.Cemceptual') !!}</a></li>
          <li><a href="{{ URL::route($VoS, ['filter'=>'style', 'value'=> 5]) }}">{!! trans('styles.Contemporary') !!}</a></li>
          <li><a href="{{ URL::route($VoS, ['filter'=>'style', 'value'=> 6]) }}">{!! trans('styles.Emerging') !!}</a></li>
          <li><a href="{{ URL::route($VoS, ['filter'=>'style', 'value'=> 7]) }}">{!! trans('styles.Figurative') !!}</a></li>
          <li><a href="{{ URL::route($VoS, ['filter'=>'style', 'value'=> 8]) }}">{!! trans('styles.Middle') !!}</a></li>
          <li><a href="{{ URL::route($VoS, ['filter'=>'style', 'value'=> 9]) }}">{!! trans('styles.Mini') !!}</a></li>
          <li><a href="{{ URL::route($VoS, ['filter'=>'style', 'value'=> 10]) }}">{!! trans('styles.Modern') !!}</a></li>
          <li><a href="{{ URL::route($VoS, ['filter'=>'style', 'value'=> 11]) }}">{!! trans('styles.Pop') !!}</a></li>
          <li><a href="{{ URL::route($VoS, ['filter'=>'style', 'value'=> 12]) }}">{!! trans('styles.Urban') !!}</a></li>
          <li><a href="{{ URL::route($VoS, ['filter'=>'style', 'value'=> 13]) }}">{!! trans('styles.Vintage') !!}</a></li>
        </ul>
      </div>
      <div class="col-md-4">
        <ul class="nav nav-pills nav-stacked">
         <li><p class="filterTitles">{!! trans('styles.style') !!}</p></li>
         <li><a href="{{ URL::route($VoS, ['filter'=>'style', 'value'=> 14]) }}">{!! trans('styles.Design') !!}</a></li>
         <li><a href="{{ URL::route($VoS, ['filter'=>'style', 'value'=> 15]) }}">{!! trans('styles.Paintings') !!}</a></li>
         <li><a href="{{ URL::route($VoS, ['filter'=>'style', 'value'=> 16]) }}">{!! trans('styles.Photographs') !!}</a></li>
         <li><a href="{{ URL::route($VoS, ['filter'=>'style', 'value'=> 17]) }}">{!! trans('styles.Prints') !!}</a></li>
         <li><a href="{{ URL::route($VoS, ['filter'=>'style', 'value'=> 18]) }}">{!! trans('styles.Sculpture') !!}</a></li>
       </ul>
       <ul class="nav nav-pills nav-stacked">
         <li><p class="filterTitles">{!! trans('master.era') !!}</p></li>
         <li><a href="{{ URL::route($VoS, ['filter'=>'era', 'value'=> 1]) }}">{!! trans('master.pre') !!}</a></li>
         <li><a href="{{ URL::route($VoS, ['filter'=>'era', 'value'=> 2]) }}">1940s-1950s</a></li>
         <li><a href="{{ URL::route($VoS, ['filter'=>'era', 'value'=> 3]) }}">1960s-1980s</a></li>
         <li><a href="{{ URL::route($VoS, ['filter'=>'era', 'value'=> 4]) }}">1980s-{!! trans('master.present') !!}</a></li>
       </ul>
      </div>
      <div class="col-md-4">
        <ul class="nav nav-pills nav-stacked">
          <li><p class="filterTitles">{!! trans('master.price') !!}</p></li>
          <li><a href="{{ URL::route($VoS, ['filter'=>'price', 'value'=> '5000']) }}">{!! trans('master.up') !!} 5,000</a></li>
          <li><a href="{{ URL::route($VoS, ['filter'=>'price', 'value'=> '10000']) }}">5,000-10,000</a></li>
          <li><a href="{{ URL::route($VoS, ['filter'=>'price', 'value'=> '25000']) }}">10,000-25,000</a></li>
          <li><a href="{{ URL::route($VoS, ['filter'=>'price', 'value'=> '50000']) }}">25,000-50,000</a></li>
          <li><a href="{{ URL::route($VoS, ['filter'=>'price', 'value'=> '100000']) }}">50,000-100,000</a></li>
          <li><a href="{{ URL::route($VoS, ['filter'=>'price', 'value'=> 'up']) }}">{!! trans('master.above') !!}</a></li>
        </ul>
        <ul class="nav nav-pills nav-stacked">
          <li><p class="filterTitles">{!! trans('master.ending') !!}</p></li>
          <li><a href="{{ URL::route($VoS, ['filter'=>'when', 'value'=> 'weekend']) }}">{!! trans('master.this') !!}</a></li>
          <li><a href="{{ URL::route($VoS, ['filter'=>'when', 'value'=> 'new']) }}">{!! trans('master.newly') !!}</a></li>
          <li><a href="{{ URL::route($VoS, ['filter'=>'when', 'value'=> 'now']) }}">{!! trans('master.now') !!}</a></li>
        </ul>
      </div>
    </div>
  </div>

    @foreach($random_art as $key => $art)
    {{-- {{ dd($picture) }} --}}
    <div class="col-md-3 pieceOverview">
      <img class="img-responsive" src="{{ url() }}/{{$picture[$key][0]->path }}">
      <div class="row">
        <div class="col-md-offset-1 related-info">
          <p class="blue-text">
            {{ $art->creation_y }}, {{ $art->artist }}
          </p>
          <h3>{{ $art->title }}</h3>
          <p class="price">
            {{ $art->price }}
          </p>
          <div class="row extra">
            <p class="col-md-12">
              {{ $duration[$key]->d }}d {{ $duration[$key]->h }}u {{ $duration[$key]->i }}m
            </p>
            <a class="col-md-12 blue-text" href="{{ URL::route('detail', ['id'=> $art->id]) }}">
              {!! trans('detail.visit') !!} >
            </a>
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

@section('js')
  <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script type="text/javascript" src="/js/filter.js"></script>
@endsection
