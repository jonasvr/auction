@extends('layout.master')


@section('title')
	Reset
@endsection

@section('container')

<div class="detailHead row centered-form">
    <div class="loginForm col-md-offset-4 col-md-4">

		<h2>registratie form</h2>
		{!! Form::open(array('role' => 'form', 'url' => '/password/reset', 'method' => 'post')) !!}

						{!! csrf_field() !!}
				<input type="hidden" name="token" value="{{ $token }}">

		    <div class="form-group col-md-offset-2 col-md-8">
		        <label for="email">email</label>
		        <input type="email" name="email" value="{{ old('email') }}">
		    </div>
				div class="form-group col-md-offset-2 col-md-8">
		        <label for="password">password</label>
		        <input type="password" name="password" class="form-control" id="password">
		    </div>

		    <div class="form-group col-md-offset-2 col-md-8">
		        <label for="password_confirmation">password confirm</label>
		        <input type="password" name="password_confirmation" class="form-control" id="password">
		    </div>
		    <div class="form-group col-md-8">
		        <button type="submit" class="btn btn-default">Reset Password</button>
		    </div>
		{!! Form::close() !!}
	</div>
</div>
@endsection
