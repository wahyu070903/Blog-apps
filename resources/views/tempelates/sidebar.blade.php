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
		<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
		<link rel="stylesheet" href="{{asset('css/sidebar-style.css')}}">
		@yield('css')
	</head>
	<body>
		<div class="sidebar">
			<div class="menus">
				<img class="logo" src="{{asset('images\app\logo.png')}}">
				<div class="menu">
					<a class="menu-link" href="{{url('admin')}}">
						<span class="menu-icon">
							<i class="fas fa-list"></i> 
						</span>
						<span class="menu-title">
							Content List
						</span>
					</a>
				</div>
				<div class="menu">
					<a href="{{url('admin\add')}}" class="menu-link">
						<span class="menu-icon">
							<i class="fas fa-plus"></i>
						</span>
						<span class="menu-title">
							Add Content
						</span>
					</a>
				</div>
				<div class="menu">
					<a href="{{url('admin\trash')}}"  class="menu-link">
						<span class="menu-icon">
							<i class="fas fa-trash"></i> 
						</span>
						<span class="menu-title">
							Trash
						</span>
					</a>
				</div>
				<div class="menu">
					<a href="..." class="menu-link">
						<span class="menu-icon">
							<i class="fas fa-home"></i> 
						</span>
						<span class="menu-title">
							Home
						</span>
					</a>
				</div>
				<div class="menu">
					<a href="..." class="menu-link">
						<span class="menu-icon">
							<i class="fas fa-home"></i> 
						</span>
						<span class="menu-title">
							Home
						</span>
					</a>
				</div>
			</div>
			<div class="minimize-btn">
				<i class="fas fa-chevron-left" onclick="minimize()"></i>
			</div>
		</div>
		<div class="content">
			<div class="top-header">
				<div class="menu-bars">
					<i class="fas fa-bars" onclick="toggleSideBar()"></i>
				</div>
				<div class="right-header">
					<img class="admin-image" src="{{asset('images\users\stress.jpg')}}">
					<i class="fas fa-ellipsis-v"></i>
				</div>
			</div>
			@yield('main-content')
		</div>

		<script>
			const sidebar = document.querySelector('.sidebar');
			const content = document.querySelector('.content');
			const menu_link = document.querySelector(".menu a");
			const menu_title = document.querySelectorAll(".menu-title");
			const menu_logo = document.querySelector(".logo");
			const chevron_left = document.querySelector(".fa-chevron-left");
			console.log(menu_title);
			function toggleSideBar(){
				sidebar.classList.toggle('hide');
				if(sidebar.classList.contains('hide')){
					content.classList.add('expand');
				}else{
					content.classList.remove('expand');
				}
			}
			function minimize(){
				sidebar.classList.toggle('minimize');
				menu_title.forEach(function(item){
					item.classList.toggle('hide-title');
				});
				menu_logo.classList.toggle("hide-logo");
				chevron_left.classList.toggle("rotate180deg");
				if(sidebar.classList.contains('minimize')){
					content.classList.add('expand-for-minimize');
				}else{
					content.classList.remove('expand-for-minimize');
				}
			}
		</script>
		@yield('javascript')
	</body>
</html>