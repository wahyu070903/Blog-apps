@extends('tempelates/header')
@section("css")
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
	<link rel="stylesheet" href="{{asset('css/login.css')}}">
@endsection
@section("content")
	<div class="row d-flex align-items-center justify-content-center" style="width:100vw; height:100vh">
		<div class="col-md-8">
			<div class="card">
				<div class="row gx-0">
					<div class="col">
						<img class="left-img" src="{{asset('images/app/alien-planet.jpg')}}">
					</div>
					<div class="col login-column">
						<h2 class="get-started">Get's started.</h2>
						<p>Already have an account? <a class="login-link" href="#">Log In</a></p>
						<div class="row gx-2">
							<div class="col">
								<a class="google-login btn" href="#"><img class="service-logo" src="{{asset('images/app/google.png')}}">
								<span>Sign up with Google</span></a>	
							</div>
							<div class="col">
								<a class="facebook-login btn" href="#"><img class="service-logo" src="{{asset('images/app/facebook.png')}}"><span>Sign up with Facebook</span></a>	
							</div>
						</div>
						<div class="break-row">
							<div class="break-line"></div>
							<span>or</span>
							<div class="break-line"></div>
						</div>
						<div class="row">
							<form method="POST" action="{{url('auth/signup')}}">
								@csrf
								<p>Email address</p>
								<div class="input-group mb-3">
								  	<span class="input-group-text input-left-logo" @error("email") style="border-color: red" @enderror><i class="far fa-envelope"></i></span>
								  	<input type="text" class="form-control single-logo-input @error('email') is-invalid
								  	@enderror" placeholder="Email address"autocomplete="off" name="email" value={{old("email")}}>
								</div>
								@error("email")
									<div class="form-text" style="color:red">
										{{$message}}
									</div>
								@enderror
								<p>Password</p>
								<div class="input-group mb-3">
								  	<span class="input-group-text input-left-logo" @error("password") style="border-color: red" @enderror><i class="fas fa-key"></i></span>
								  	<input type="Password" class="form-control double-logo-input password-field @error('password') is-invalid @enderror" placeholder="password" autocomplete="off" name="password">
								  	<span class="input-group-text input-right-logo show-password" onclick="showPassword()" @error("password") style="border-color: red" @enderror><i class="far fa-eye"></i></span>
								</div>
								@error("password")
									<div class="form-text" style="color:red">
										{{$message}}
									</div>
								@enderror
								<div class="form-check">
								  	<input class="form-check-input agree-btn" type="checkbox" onclick="toggleRegisterBtn()">
								  	<label class="form-check-label privacy-policy-text" for="flexCheckDefault">
								  		I aggree to Platform's <a class="term-link" href="#">Term of Services</a> and <a class="privacy-link" href="#">Privacy policy</a>
								  	</label>
								</div>
								<button class="btn register-button text-nowrap" type="submit" disabled>Register</button>
							</form>
						</div>
					</div>
				</div>
			</div>	
		</div>
	</div>
@endsection
@section("js")
	<script>
		function showPassword(){
			const input_field = document.querySelector(".password-field");
			const show_password_btn = document.querySelector(".show-password");
			const eye_enable_logo = "<i class='far fa-eye'>";
			const eye_disabled_logo = "<i class='fas fa-eye-slash'></i>"
			if(input_field.type === 'password'){
				input_field.type = 'text';
				show_password_btn.innerHTML = eye_disabled_logo; 
			}else{
				input_field.type = 'password';
				show_password_btn.innerHTML = eye_enable_logo; 
			}
		}
		function toggleRegisterBtn(){
			const reg_btn = document.querySelector(".register-button");
			const checkbox_btn = document.querySelector(".agree-btn");
			if(checkbox_btn.checked == true)
			{
				reg_btn.disabled = false;
			}else{
				reg_btn.disabled = true;
			}
			console.log(checkbox_btn.value);
		}
	</script>
@endsection