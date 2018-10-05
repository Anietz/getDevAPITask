<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta name="description" content="Admin, Dashboard, Bootstrap" />
	<link rel="shortcut icon" sizes="196x196" href="{{asset('theme/assets/images/logo.png')}}">
	<title>Login :: Sissl</title>
	
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous" />

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous" />

	<style type="text/css">
		body.simple-page {
  background-color: #f1f1f1;
  padding-top: 8%; }

.simple-page-wrap {
  width: 380px;
  margin: 0 auto; }

.simple-page-logo {
  text-align: center;
  font-size: 24px;
  margin-bottom: 24px; }
  .simple-page-logo a {
    color: #fff; }

.simple-page-form {
  background-color: #fff;
  border-radius: 6px;
  padding: 24px;
  margin-bottom: 24px; }
  .simple-page-form .form-group {
    margin-bottom: 32px; }
  .simple-page-form input,
  .simple-page-form input:focus,
  .simple-page-form input:active {
    outline: none;
    box-shadow: none; }
  .simple-page-form input {
    border: none;
    border-bottom: 1px solid #eee;
    border-radius: 0;
     }
  .simple-page-form .btn {
    width: 100%; }

.simple-page-footer p {
  text-align: center;
  margin-bottom: 24px; }

.simple-page-footer a {
  color: #000;
  font-weight: 500; }

.simple-page-footer small {
  margin-right: 16px;
  color: #000; }

#_404_title {
  text-align: center;
  font-weight: 900;
  font-size: 140px;
  letter-spacing: 5px;
  color: #fff; }

#_404_msg {
  color: #fff;
  text-align: center;
  font-size: 16px; }

#_404_form {
  margin-top: 48px; }
  #_404_form .form-control {
    height: 40px; }
  #_404_form .input-group-addon {
    background: #188ae2;
    border: #188ae2;
    color: #fff; }

#unlock-user {
  margin-top: 64px;
  margin-bottom: 48px; }
  #unlock-user .avatar {
    display: block;
    margin-right: 0;
    margin: 0 auto;
    width: 80px;
    height: 80px; }
  #unlock-user h4 {
    color: #fff;
    text-align: center;
    text-transform: uppercase; }

#unlock-form .form-group {
  margin-bottom: 32px; }

#unlock-form input,
#unlock-form input:focus,
#unlock-form input:active {
  outline: none;
  box-shadow: none;
  border: none;
  border-bottom: 1px solid #aaa; }

#unlock-form input {
  width: 70%;
  margin: 0 auto;
  border-radius: 0;
  text-align: center;
  color: #fff;
  background-color: transparent;
  height: 40px; }
  #unlock-form input::-webkit-input-placeholder {
    color: #fff; }
  #unlock-form input::-moz-placeholder {
    color: #fff; }
  #unlock-form input:-ms-input-placeholder {
    color: #fff; }

#unlock-form #unlock-btn {
  display: block;
  margin: 0 auto;
  background-color: #fff;
  color: #188ae2;
  border-radius: 3px;
  width: 120px; }

#back-to-home {
  position: fixed;
  top: 60px;
  left: 60px; }
  #back-to-home a {
    color: #fff;
    font-size: 18px; }
    #back-to-home a i {
      font-size: 24px; }

 .simple-page-logo img{
          width: 88px;
          height: 88px;
    }
	</style>
</head>

<body class="simple-page">

	<div class="simple-page-wrap">
		<div class="simple-page-logo animated swing">
			<a href="#" style="color: #000">				
				Dream Boat
			</a>
		</div><!-- logo -->
		<div class="simple-page-form animated flipInY" id="login-form">
	<h4 class="form-title m-b-xl text-center">Sign In</h4>
					@if (count($errors) > 0)
						<div class="alert alert-danger">							
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif
	<form method="POST" action="/login">
	  <input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div class="form-group">
			<input id="sign-in-email" type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}">
		</div>

		<div class="form-group">
			<input id="sign-in-password" type="password" class="form-control" name="password" placeholder="Password">
		</div>
		
     <div class="form-group m-b-xl">
      <div class="checkbox checkbox-primary">
        <input type="checkbox" style="margin-left:0" id="keep_me_logged_in"/>
        <label for="keep_me_logged_in">Keep me signed in</label>
      </div>
    </div>

		<input type="submit" class="btn btn-primary" style="background: #D2AD20" value="SIGN IN">
	</form>
</div><!-- #login-form -->



	</div><!-- .simple-page-wrap -->  
</body>
</html>