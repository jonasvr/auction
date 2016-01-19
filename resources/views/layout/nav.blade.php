<div class="collapse navbar-collapse row" id="myNavbar2">
  <div class="col-md-offset-3 col-md-6">
    <ul class="nav navbar-nav upper ">
    @if(Auth::check())
        <li><a href="/">{!! trans('master.home') !!}</a></li>
        <li><a href="{{ URL::route('overview') }}">{!! trans('master.art') !!}</a></li>
        <li><a href="{{ URL::route('isearch') }}">{!! trans('master.search') !!}</a></li>
        <li><a href="{{ URL::route('myAuctions') }}">{!! trans('master.myauctions') !!}</a></li>
        <li><a href="{{ URL::route('myBids') }}">{!! trans('master.mybids') !!}</a></li>
        <li><a href="{{ url('/contact')  }}">{!! trans('master.contact') !!}</a></li>
    @endif
    </ul>
  </div>
  <div class="col-md-2">
    <ul class="nav navbar-nav navbar-right upper">
      <li><a href="{{ URL::route('language', array('lng' => 'nl')) }}">nl</a></li>
      <li><a href="{{ URL::route('language', array('lng' => 'en')) }}">en</a></li>
    </ul>
  </div>
  <div class="col-md-1"></div>
</div>
