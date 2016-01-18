<div class="detailHead row" style="background-image:url('/{{$onePiece->path}}');">
    <div class="col-md-offset-8 col-md-2">
      <div class="detailInfo-blue row">
        <h3>{{ $onePiece->title }} </h3>
        <p>{{ $onePiece->shortdesc }}</p>
      </div>
      <div class="visit row">
        <a href="{{ URL::route('detail', ['id'=> $onePiece->id]) }}">{!! trans('master.visit') !!} > </a>
      </div>
    </div>
</div>

<div class="row path">
      <div class="col-md-offset-2 col-md-6">
      @if(isset($path))
        <p class="blue-text">
          {{ $path }}
        </p>
      @endif
        </div>
      <div class="col-md-2 text-right">
        @if(isset($art_id))
          Lod ID: {{ $art_id }}
        @endif
      </div>
      <div class="col-md-1"></div>
    </div>
