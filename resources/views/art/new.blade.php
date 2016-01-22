@extends('layout.master')

@section('title')
    New Art
@endsection


@section('container')

<div class="row">
  <h1 class='col-md-offset-1 col-md-5 text-capitalize blue-text'>{!! trans('profile.newTitle') !!}</h1>
</div>
<div class="row profile-form text-capitalize blue-text">
{!! Form::open(array('url' => URL::route('addArt'), 'method' => 'POST', 'class' => 'form-horizontal', 'files' => true )) !!}

<!-- kolom 1 -->
  <div class="col-md-offset-1 col-md-5">

      <div class="form-group">
        {!! Form::label('title',  trans('profile.title'), array('class' => 'col-sm-3  control-label')) !!}
        <div class="col-sm-9">
          {!! Form::text('title','',array('class' => 'form-control'))!!}
        </div>
      </div>
      <div class="form-group">
        {!! Form::label('artist', trans('profile.artist'), array('class' => 'col-sm-3  control-label')) !!}
        <div class="col-sm-9">
          {!! Form::text('artist','',array('class' => 'form-control')) !!}
        </div>
      </div>
      <div class="form-group">
        {!! Form::label('description', trans('profile.description'), array('class' => 'col-sm-3  control-label')) !!}
        <div class="col-sm-9">
          {!! Form::textarea('description','',array('class' => 'form-control', 'rows' => '8')) !!}
        </div>
      </div>

      <div class="form-group">
        {!! Form::label('condition', trans('profile.condition'), array('class' => 'col-sm-3  control-label')) !!}
        <div class="col-sm-9">
          {!! Form::textarea('condition','',array('class' => 'form-control', 'rows' => '8')) !!}
        </div>
      </div>
      <div class="form-group">
           {!! Form::label('creation_y', trans('profile.artyear'), array('class' => 'col-sm-3  control-label')) !!}
           <div class="col-sm-9">
             {!! Form::text('creation_y','',array('class' => 'form-control')) !!}
           </div>
         </div>

      <div class="form-group">
        {!! Form::label('condition', trans('profile.picture'), array('class' => 'col-sm-3  control-label')) !!}
        <div class="col-sm-9">
        @for ($i=0; $i < 4; $i++)
            <input type="file" name="pic[]" accept="image/*">
            <!-- {!! Form::file('img[$i]', ['class' => 'form-control']) !!} -->
        @endfor
        </div>
      </div>


  </div>
<!-- eind kolom 1 -->
<!-- kolom 2 -->
  <div class="col-md-5 form-horizontal">



      <div class="form-group">
        {!! Form::label('dimensions', trans('profile.dimensions'), array('class' => 'col-sm-3  control-label')) !!}
        <div class="col-sm-9">
          {!! Form::text('dimensions','',array('class' => 'form-control')) !!}
        </div>
      </div>

      <div class="form-group">
        {!! Form::label('color', trans('profile.color'), array('class' => 'col-sm-3  control-label')) !!}
        <div class="col-sm-9">
          {!! Form::text('color','',array('class' => 'form-control')) !!}
        </div>
      </div>

      <div class="form-group">
        {!! Form::label('style_id', trans('master.style'), array('class' => 'col-sm-3  control-label')) !!}
        <div class="col-sm-9">
          <select name="style_id" class="browser-default">
                @for($i=1;$i<=count($styles);$i++)
                <option value="{{$i}}">{{ trans('styles.' .$styles[$i])}}</option>
                @endfor
            </select>
        </div>
      </div>

      <div class="form-group">
        {!! Form::label('era_id', trans('profile.era'), array('class' => 'col-sm-3  control-label')) !!}
        <div class="col-sm-9">
          {!! Form::select('era_id', $eras) !!}
        </div>
      </div>


      <div class="form-group">
        {!! Form::label('country', trans('profile.continent'), array('class' => 'col-sm-3  control-label')) !!}
        <div class="col-sm-9">
          {!! Form::select('country', $countrys) !!}
        </div>
      </div>

      <div class="form-group">
        {!! Form::label('birth', trans('profile.birth'), array('class' => 'col-sm-3  control-label')) !!}
        <div class="col-sm-9">
          {!! Form::text('birth','',array('class' => 'form-control')) !!}
        </div>
      </div>

      <div class="form-group">
        {!! Form::label('death', trans('profile.death'), array('class' => 'col-sm-3  control-label')) !!}
        <div class="col-sm-9">
          {!! Form::text('death','',array('class' => 'form-control')) !!}
        </div>
      </div>
      <div class="form-group">
           {!! Form::label('min', trans('profile.min'), array('class' => 'col-sm-3  control-label')) !!}
           <div class="col-sm-9">
             {!! Form::text('min','',array('class' => 'form-control')) !!}
           </div>
         </div>
       <div class="form-group">
            {!! Form::label('max', trans('profile.max'), array('class' => 'col-sm-3  control-label')) !!}
            <div class="col-sm-9">
              {!! Form::text('max','',array('class' => 'form-control')) !!}
            </div>
          </div>
      <div class="form-group">
        {!! Form::label('price', trans('profile.price'), array('class' => 'col-sm-3  control-label')) !!}
        <div class="col-sm-9">
          {!! Form::text('price','',array('class' => 'form-control')) !!}
        </div>
      </div>

      <div class="form-group">
      {!! Form::label('duration', trans('profile.duration'), array('class' => 'col-sm-3  control-label')) !!}
      <div class="col-xs-7">
        {!! Form::number('duration',2,array('class' => 'form-control', 'min' => 2, 'max' => 14)) !!}
      </div>
    </div>

    <div class="col-sm-offset-3 col-sm-9">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      {!! Form::submit(trans('profile.submit'), array('class' => 'btn btn-default')) !!}
    </div>
  </div>
<!-- eind kolom 2 -->
{!! Form::close() !!}
</div>
@endsection
