@extends('layout.master')

@section('title')
    contact
@endsection


@section('container')
<div class="row ">

  <div class="col-md-offset-4 col-md-4 blue-text">
    <h1>confirm</h1>
    {!! Form::open(array('url' => URL::route('contact'), 'method' => 'post', 'class' => 'form-horizontal')) !!}

    {{ dd($request->question) }}
    <div class="form-group">
      @if(isset($art_id))
          {!! Form::label($title) !!}
          {!! Form::hidden('title', $title)!!}
          {!! Form::hidden('art_id', $art_id)!!}
      @endif
    </div>

    <div class="form-group">
          {!! Form::label('question') !!}
          {{ $request->question }}
          {!! Form::hidden('question', $request->question)!!}
    </div>

    <div class="form-group">
          {!! Form::label('email') !!}
          {!! Form::text('email','',array('class' => 'form-control'))!!}
    </div>
      {!! Form::hidden('confirmed', true)!!}
    <div class="form-group">
        <button type="submit" class="btn btn-default">{{ trans('detail.ask') }}</button>
    </div>
    {!! Form::close()!!}
  </div>
</div>

@endsection
