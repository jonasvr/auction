@extends('layout.master')


@section('title')
	registratie
@endsection

@section('container')

<div class="detailHead row centered-form">
    <div class="loginForm col-md-offset-4 col-md-4">

		<h2>registratie form</h2>
		{!! Form::open(array('role' => 'form', 'url' => '/password/email', 'method' => 'post')) !!}

			    {!! csrf_field() !!}

		    <div class="form-group col-md-offset-2 col-md-8">
		        <label for="email">email</label>
		        <input type="email" name="email" value="{{ old('email') }}">
		    </div>
		    <div class="form-group col-md-8">
		        <button type="submit" class="btn btn-default">Send Password Reset Link</button>
		    </div>
		{!! Form::close() !!}
	</div>
</div>
@endsection
