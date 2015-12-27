@extends('master')

@section('title')
	login
@endsection

@section('container')

<div class="row centered-form">
    <div class="col-md-offset-3 col-md-6">
	  
		<h2>login Form</h2>
		<form role="form" method="POST" action="/login">
		    {!! csrf_field() !!}

		    <div class="form-group col-md-offset-2 col-md-8">
		        <label for="email">email</label>
		        <input type="email" name="email" class="form-control" value="{{ old('email') }}">
		    </div>

		    <div class="form-group col-md-offset-2 col-md-8">
		        <label for="password">password</label>
		        <input type="password" name="password" class="form-control" id="password">
		    </div>

		    <div class="checkbox col-md-offset-2 col-md-8">
		       <label><input type="checkbox" name="remember"> Remember Me</label> 
		    </div>

		    <div class="checkbox col-md-offset-2 col-md-8">
		        <button type="submit" class="btn btn-default">Login</button>
		    </div>
		</form>
	</div>
</div>
@endsection