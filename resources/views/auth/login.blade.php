@extends('layout.master')

@section('title')
	Login
@endsection

@section('container')
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5&appId=1556239338035163";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>


<div class="detailHead row centered-form ">
    <div class="loginForm col-md-offset-4 col-md-4">

		<h2>Login</h2>
		{!! Form::open(array('role' => 'form', 'url' => 'auth/login', 'method' => 'post')) !!}
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

		    <div class="form-group col-md-offset-2 col-md-8">
		        <button type="submit" class="btn btn-default">Login</button>
						<div class="fb-login-button" data-max-rows="1" data-size="medium" data-show-faces="false" data-auto-logout-link="false"></div>
		    </div>
			</form>
	</div>
</div>
@endsection
