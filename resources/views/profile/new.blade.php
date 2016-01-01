@extends('master')

@section('title')
    auction
@endsection


@section('container')   

<div class="row">
  <h1 class='col-md-offset-1 col-md-5'>{!! trans('profile.newTitle') !!}</h1>
</div>
<div class="row profile-form text-capitalize blue-text">

<!-- kolom 1 -->
  <div class="col-md-offset-1 col-md-5">
    {!! Form::open(array('url' => 'addArt', 'method' => 'PUT', 'class' => 'form-horizontal', 'files' => true )) !!}
      
      <div class="form-group">
        {!! Form::label('name',  trans('profile.name'), array('class' => 'col-sm-3  control-label')) !!}
        <div class="col-sm-9">
          {!! Form::text('name','',array('class' => 'form-control'))!!}
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
        {!! Form::label('condition', trans('profile.picture'), array('class' => 'col-sm-3  control-label')) !!}
        <div class="col-sm-9">
         {!! Form::file('picture', ['class' => 'form-control']) !!}
        </div>
      </div>

     <div class="col-sm-offset-3 col-sm-9">
      {!! Form::submit('Submit!', array('class' => 'btn btn-default')) !!}
    </div>
  </div>
<!-- eind kolom 1 -->
<!-- kolom 2 -->
  <div class="col-md-5 form-horizontal">

   <div class="form-group">
        {!! Form::label('artyear', trans('profile.artyear'), array('class' => 'col-sm-3  control-label')) !!}
        <div class="col-sm-9">
          {!! Form::text('artyear','',array('class' => 'form-control')) !!}
        </div>
      </div>

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
        {!! Form::label('style', trans('profile.style'), array('class' => 'col-sm-3  control-label')) !!}
        <div class="col-sm-9">
          {!! Form::text('style','',array('class' => 'form-control')) !!}
        </div>
      </div>

      <div class="form-group">
        {!! Form::label('era', trans('profile.era'), array('class' => 'col-sm-3  control-label')) !!}
        <div class="col-sm-9">
          {!! Form::select('era', array('key' => 'value')) !!}
        </div>
      </div>
      <div class="form-group">
        {!! Form::label('artist', trans('profile.artist'), array('class' => 'col-sm-3  control-label')) !!}
        <div class="col-sm-9">
          {!! Form::text('artist','',array('class' => 'form-control')) !!}
        </div>
      </div>

      <div class="form-group">
        {!! Form::label('continent', trans('profile.continent'), array('class' => 'col-sm-3  control-label')) !!}
        <div class="col-sm-9">
          {!! Form::text('continent','',array('class' => 'form-control')) !!}
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
        {!! Form::label('price', trans('profile.price'), array('class' => 'col-sm-3  control-label')) !!}
        <div class="col-sm-9">
          {!! Form::text('price','',array('class' => 'form-control')) !!}
        </div>
      </div>

    
  </div>
<!-- eind kolom 2 -->
</div>
@endsection

 