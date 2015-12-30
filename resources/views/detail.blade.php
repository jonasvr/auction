@extends('master')

@section('title')
    auction
@endsection


@section('container')   
  @include('header')
  <!-- end header -->
  <div class="wrapper-details">
    <div class="row">
      <div class="col-md-offset-2 col-md-7">
          <h2> TITLE AUCTION </h2>
      </div>
      <div class="col-md-3"></div>

      <div class="col-md-offset-2 col-md-7">
          <p> 
            25d 14u 44m 
            <span class="blue-text">
              (7 {!! trans('detail.bids') !!}) 
              <span class="glyphicon glyphicon-menu-hamburger"></span>
            </span>
          </p>
      </div>
      <div class="col-md-3"></div>
    </div>

    <!-- data links images -->
      <div class="detailDataBlock row">
        <div class="col-md-offset-2 col-md-6 detailImages">
          <div class="row white-overlay">
            <img src="/img/1.jpg" class="col-md-12 img-responsive">
            <img src="/img/1.jpg" class="col-md-4 img-responsive">
            <img src="/img/1.jpg" class="col-md-4 img-responsive">
            <img src="/img/1.jpg" class="col-md-4 img-responsive">
          </div>
        </div>

        <!-- data rechts -->
        <div class="col-md-2 text-right"> 
          <h3> title auction</h3>
          <p class="blue-text">
            adres
          </p>

          <p class="green-text">
            25d 14u 44m left
          </p>

          <p>September 09, 2013, 13:00 p.m. (EST)</p>
          <hr />
          <p class="info-block">
              Lorem ipsum dolor sit amet, ut duo odio electram cotidieque, ridens placerat complectitur
          </p>
          <a class="black-link" href="#">
            <strong>
              <u> 
                {!! trans('detail.more') !!} 
              </u>
            </strong>
          </a>

          <hr />

          <p class="blue-text"> 
            {!! trans('detail.estimated') !!} <br />
            <span class="price"> €9.500 - €10.500</span><br />
            <a class="green-text" href="#"> <u>{!! trans('detail.buy') !!} €15.000</u></a>
          </p>
          
          <p>{!! trans('detail.bid') !!}?</p>
          <form class="bid">
            <div class="input-group">
                  <input type="text" class="form-control" placeholder="bid" name="bid">
                  <div class="input-group-addon">
                      <button type="submit"  class="text-uppercase"> {!! trans('detail.bidnow') !!} > </button>
                  </div>
              </div>
          </form>
          <p class="text-center"  ><a class="blue-text" href="#">
            <span class="glyphicon glyphicon-menu-hamburger"> 
            </span>
            <u class=""> {!! trans('detail.add') !!} </u>
          </a></p>
        </div>
    </div>

    <div class="row detail-Description-enCo text-left"> 
      <!-- description condition -->
      <div class="col-md-offset-2 col-md-6">

      <strong>{!! trans('detail.description') !!}</strong>
      <p>
        Dance of Time III" (1979-84) is a stunning bronze and gold patina sculpture 
        by Spanish Contemporary artist Salvador Dalí (Spain, 1904 - 1989), measures 10.43 inches (26.50 cm) and is stamped and numbered from an edition of 350. This sculpture is in perfect condition and is accompanied by documentation of authenticity. As one of the most well known and iconic images seen in Dali’s work, the melted watch has appeared consistently throughout the artist’s oeuvre. As time universally knows no limits, it is perceived as something perpetual- ‘dancing on’ and stopping for no one as exemplified in this ‘Dance of Time III’ sculpture. Meant to echo the fluidity of time, the undulated form of this melted clock captures the surrealistic imagery so beloved and continuously employed by Dali.
      </p>

      <strong>{!! trans('detail.condition') !!}</strong>
      <p>
        Lorem ipsum dolor sit amet, nec dictum, consectetuer donec tincidunt eget ante libero gravida. Wisi nec nulla, lorem suspendisse lorem id tellus eget, erat tellus, enim at. A purus libero amet vitae accumsan scelerisque, quis orci sed ornare pulvinar, luctus mauris turpis mollis ut vel eget, id massa non cursus felis. Sed et mus non non augue tortor. Pede id massa, ante rhoncus et at ad, fringilla vulputate dapibus nunc, iaculis sollicitudin accumsan non, hac vehicula hymenaeos. Felis aliquet donec vitae. Autem ante, sollicitudin feugiat amet viverra quae risus, dui dis semper ac non, mi curabitur amet. Bibendum nunc fusce aliquam ante tempus, imperdiet magna.
       </p>
      </div>


      <div class=" col-md-2"> 
        <strong>{!! trans('detail.artist') !!}</strong>
        <p>
          Salvador Dali
        <br />
          spanish
        <br />
          1904-1980
        </p>

        <strong>{!! trans('detail.dimensions') !!}</strong>
        <p>
          10.43 x 10.43 x 10.44 cm
        </p>

        <strong>{!! trans('detail.color') !!}</strong>
        <p>
          bronze, patinated bronze and gold
        </p>
      </div>
    </div>
  </div>

  <div class="related row">
    <div class="col-md-offset-2 col-md-8 row">
    <h2 class="blue-text">{!! trans('detail.related') !!}</h2>
    
      <div class="col-md-3">
        <img class="img-responsive" src="img/2.jpg">
        <div class="row">
          <div class="col-md-offset-1 related-info">
            <p class="blue-text">1979, Salvador Dali</p>
            <h3>Dance of time III</h3>
            <p class="price"> 8.900</p>
            <div class="row extra">
              <p class="col-md-6"> 25d 14u 44m</p>
              <a class="col-md-6 blue-text" href="#"> {!! trans('detail.visit') !!} > </a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <img class="img-responsive" src="img/2.jpg">
        <div class="row">
          <div class="col-md-offset-1 related-info">
            <p class="blue-text">1979, Salvador Dali</p>
            <h3>Dance of time III</h3>
            <p class="price"> 8.900</p>
            <div class="row extra">
              <p class="col-md-6"> 25d 14u 44m</p>
              <a class="col-md-6 blue-text" href="#"> visit auction > </a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <img class="img-responsive" src="img/2.jpg">
        <div class="row">
          <div class="col-md-offset-1 related-info">
            <p class="blue-text">1979, Salvador Dali</p>
            <h3>Dance of time III</h3>
            <p class="price"> 8.900</p>
            <div class="row extra">
              <p class="col-md-6"> 25d 14u 44m</p>
              <a class="col-md-6 blue-text" href="#"> visit auction > </a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <img class="img-responsive" src="img/2.jpg">
        <div class="row">
          <div class="col-md-offset-1 related-info">
            <p class="blue-text">1979, Salvador Dali</p>
            <h3>Dance of time III</h3>
            <p class="price"> 8.900</p>
            <div class="row extra">
              <p class="col-md-6"> 25d 14u 44m</p>
              <a class="col-md-6 blue-text" href="#"> visit auction > </a>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
@endsection

 