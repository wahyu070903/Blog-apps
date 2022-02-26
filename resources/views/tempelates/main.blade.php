<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1.0">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> 
		<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="{{asset('css/main-style.css')}}">
		<meta name="csrf-token" content="{{ csrf_token() }}" />
		@yield('css')
	</head>
	<body>
		{{-- live search result panel --}}
		<div class="result-panel result-hide">
			<i class="fas fa-times popup-btn-close"></i>
			<div class="search-result">
				
			</div>
		</div>
		<div class="nav-bar">
			<div class="menus">
				<img class="logo-image" src="{{asset('images/app/logoipsumblue.svg')}}">
				<a href="#">Home</a>
				<a href="{{url('login')}}">Login</a>
				<a href="#">Video</a>
				<a href="#">About</a>
			</div>	
			<div class="search-bar">
  				<input type="text" class="keyword-input keyword-hide" name="keyword" placeholder="Search here....." aria-label="Recipient's username" aria-describedby="button-addon2">
  				<button class="btn btn-outline-primary search-button" type="button"><i class="fas fa-search"></i></button>
			</div>	
		</div>

		@yield('content')

		{{-- start footer area --}}
		<div class="footer">
			<div class="social-media">
				<a href="#"><i class="fab fa-instagram fa-2x"></i></a>
				<a href="#"><i class="fab fa-telegram fa-2x"></i></a>
				<a href="#"><i class="fab fa-youtube fa-2x"></i></a>
				<a href="#"><i class="fab fa-facebook-square fa-2x"></i></a>
			</div>
			<div class="footer-link">
				<a href="#">Home</a>
				<a href="#">FaQs</a>
				<a href="#">About</a>
				<a href="#">Contact</a>
			</div>
			<div class="footer-text">
				<p>© 2021 <b>Mechatronician</b> | made with <img class="heart-logo"src="{{asset('images/app/pixel-heart.png')}}"> using <a href="https://laravel.com/">Laravel</a></p>
			</div>
		</div>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
		<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

		@yield('script')
		<script>
			function navAnimation(){
				const navbar = document.querySelector(".nav-bar");
				var scrollPos = 0;
				// adding scroll event
				window.addEventListener('scroll', function(){
				  if ((document.body.getBoundingClientRect()).top > scrollPos){
				  	// scroll up
				  	navbar.classList.remove('nav-down');
				  	navbar.classList.add('nav-up');
				  }else{
				  	//scroll down
				  	navbar.classList.remove('nav-up');
				  	navbar.classList.add('nav-down');
				  	$(".result-panel").hide(); //hide result panel
				  }
					scrollPos = (document.body.getBoundingClientRect()).top;
				});
			}
			function searchExpand(){
				const search_box = document.querySelector(".keyword-input");
				const search_button = document.querySelector(".search-button");
				search_button.addEventListener("click",function(){
					search_box.classList.toggle("keyword-expand");
					search_box.classList.toggle("keyword-hide");
				}); 
			}
			function liveSearch(){
				$.ajaxSetup({
				    headers: {
				        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				    }
				});

				$(document).ready(function(){
					$(".result-panel").hide();
					$(".keyword-input").keyup(function(){
						var keyword = $(this).val();
						if(keyword != ""){
							var url = "{{route('get.search',['keyword' => ':slug'])}}";
							url = url.replace(':slug',keyword);
							$.ajax({
								type: 'POST',
								url : url,
								success : function(data){
									$(".search-result").html(data.success);
									$(".result-panel").show();
								},
							});
						}
					});
					$(".keyword-input").focusout(function(){
						$(this).addClass("keyword-hide");
					})
					$(".popup-btn-close").click(function(){
						$(".result-panel").hide();
					})
				});
			}
			navAnimation();
			searchExpand();
			liveSearch();
		</script>
	</body>
</html>