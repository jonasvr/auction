@extends('layout.master')

@section('title')
    Contact
@endsection


@section('container')
<div class="row ">

  <div class="col-md-offset-4 col-md-4 blue-text">
    <h1>Contact</h1>
    {!! Form::open(array('url' => URL::route('artcontact'), 'method' => 'post', 'class' => 'form-horizontal')) !!}

    <div class="form-group">
      @if(isset($art_id))
          {!! Form::label($title) !!}
          {!! Form::hidden('art_id', $art_id)!!}
      @endif
    </div>

    <div class="form-group">
          {!! Form::label('question') !!}
          {!! Form::textarea('question','',array('class' => 'form-control'))!!}
    </div>

    <div class="form-group">
          {!! Form::label('email') !!}
          {!! Form::text('email','',array('class' => 'form-control'))!!}
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-default">{{ trans('detail.ask') }}</button>
    </div>
    {!! Form::close()!!}
  </div>
</div>

@endsection
