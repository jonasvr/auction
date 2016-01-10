@extends('layout.master')


@section('title')
	registratie
@endsection

@section('container')

<div class="detailHead row centered-form">
    <div class="loginForm col-md-offset-4 col-md-4">

		<h2>registratie form</h2>
		{!! Form::open(array('role' => 'form', 'url' => 'auth/register', 'method' => 'post')) !!}

			    {!! csrf_field() !!}

		    <div class="form-group col-md-offset-2 col-md-8">
		        <label for="email">email</label>
		        <input type="email" name="email" class="form-control" placeholder="john@gmail.com">
		    </div>

		    <div class="form-group col-md-offset-2 col-md-8">
		        <label for="name">name</label>
		        <input type="name" name="name" class="form-control" placeholder="John">
		    </div>

		    <div class="form-group col-md-offset-2 col-md-8">
		        <label for="password">password</label>
		        <input type="password" name="password" class="form-control" id="password">
		    </div>

		    <div class="form-group col-md-offset-2 col-md-8">
		        <label for="password_confirmation">password confirm</label>
		        <input type="password" name="password_confirmation" class="form-control" id="password">
		    </div>

		    <div class="form-group col-md-8">
		        <button type="submit" class="btn btn-default">Login</button>
		    </div>
		{!! Form::close() !!}
	</div>
</div>
@endsection
