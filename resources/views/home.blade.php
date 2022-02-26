@extends('tempelates/main')

@section('css')
	<link rel="stylesheet" href="{{asset('css/home-style.css')}}">
	<meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection
@section('content')
	{{-- lading spinner --}}
	<div class="modal fade" id="loading-spinner" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
			<div class="modal-body">
		    	<div class="d-flex justify-content-center">
		  			<div class="spinner-grow text-primary" style="width: 3rem; height: 3rem;" role="status">
		  				<span class="visually-hidden">Loading...</span>
					</div>
					<div class="spinner-grow text-warning" style="width: 3rem; height: 3rem;" role="status">
					  <span class="visually-hidden">Loading...</span>
					</div>
					<div class="spinner-grow text-danger" style="width: 3rem; height: 3rem;" role="status">
					  <span class="visually-hidden">Loading...</span>
					</div>
				</div>
		    </div>
		</div>
		</div>
	</div>
	{{-- content start here --}}
	<div class="content">
		<div class="intro-panel">
			<div class="intro-text">
				<h1>Mechatronician</h1>
				<p>Tempat anda dapat menemukan berbagai resource dan tutorial <br> mengenai elektronika dan pemrograman.</p>
				<a class="btn btn-primary" href="#" role="button">Singn-Up</a>
				<a class="btn btn-outline-primary" href="#" role="button">Login</a>
			</div>
			<div class="intro-image">
				<img src="{{asset('images/app/cover.png')}}">
			</div>
		</div>
		<div class="new-article">
			<div class="new-article-greeting">
				<h1>Artikel Terbaru.</h1>
				<p>Apa saja yang baru di teknik kontrol ?</p>
			</div>
			<div class="cards-container">
				@foreach($query_data as $item)
					<a href="article/{{$item->id}}">
						<div class="card">
					  		<img src="{{asset($item->thumbnail_path)}}" class="card-img-top" alt="...">
					  		<div class="card-body">
					  			<h5 class="card-title">{{$item->title}}</h5>
					    		<p class="card-text">{{$item->description}}</p>
					  		</div>
						</div>
					</a>
				@endforeach
			</div>
		</div>
		<div class="pagination-container">
			<nav aria-label="Page navigation example">
			  <ul class="pagination">
			    <li class="page-item"><a class="page-link pref" >Previous</a></li>
			    <li class="page-item first-on active"><a class="page-link pg-lk-num" value=1>1</a></li>
			    @if($pagination > 1)
			    	{{-- @for($i = 0 ; $i < ($pagination - 1) ; $i++) --}}
			    	@for($i = 0 ; $i < 4 ; $i++)
			    		<li class="page-item"><a class="page-link pg-lk-num" value={{$i + 2}}>{{$i+2}}</a></li>
			    	@endfor
			    @endif
			    <li class="page-item"><a class="page-link next">Next</a></li>
			  </ul>
			</nav>
		</div>

		<div class="article-by-category">
			<div class="list-group">
				<li class="list-group-item">Other</li>
				@php($count_categories = 0)
				@php($count_categories_total = 0)
				@foreach($query_all as $item)
					@if($item->categories == "Other" && $count_categories < 5)
			  			<a href="article/{{$item->id}}" class="list-group-item list-group-item-action">
			  				<img class="category-item-thumb"src="{{asset($item->thumbnail_path)}}">
			  				{{$item->title}}
			  			</a>
			  			@php($count_categories += 1)
			  		@endif
			  		@if($item->categories == "Other")
			  			@php($count_categories_total += 1)
			  		@endif
			  	@endforeach
			  	<li class="list-group-item d-flex justify-content-between align-items-center item-count">
			  		<span class="badge bg-primary rounded-pill">{{$count_categories_total}}</span>
			  	</li>
			  	@if($count_categories == 0)
			  		<li class="list-group-item">No item in this category</li>
			  	@else
			  		<a class="list-group-item list-group-item-action"  href="{{url("categories/other")}}">See All</a>
			  	@endif
			</div> 
			<div class="list-group">
				<li class="list-group-item">Elektronika</li>
				@php($count_categories = 0)
				@php($count_categories_total = 0)
				@foreach($query_all as $item)
					@if($item->categories == "elektronika" && $count_categories < 5)
			  			<a href="article/{{$item->id}}" class="list-group-item list-group-item-action">
			  				<img class="category-item-thumb"src="{{asset($item->thumbnail_path)}}">
			  				{{$item->title}}
			  			</a>
			  			@php($count_categories += 1)
			  		@endif
			  		@if($item->categories == "elektronika")
			  			@php($count_categories_total += 1)
			  		@endif
			  	@endforeach
			  	<li class="list-group-item d-flex justify-content-between align-items-center item-count">
			  		<span class="badge bg-primary rounded-pill">{{$count_categories_total}}</span>
			  	</li>
			  	@if($count_categories == 0)
			  		<li class="list-group-item">No item in this category</li>
			  	@else
			  		<a class="list-group-item list-group-item-action"  href="{{url("categories/elektronika")}}">See All</a>
			  	@endif
			</div> 
			<div class="list-group">
				<li class="list-group-item">Microcontroller</li>
				@php($count_categories = 0)
				@php($count_categories_total = 0)
				@foreach($query_all as $item)
					@if($item->categories == "microcontroller" && $count_categories < 5)
			  			<a href="article/{{$item->id}}" class="list-group-item list-group-item-action">
			  				<img class="category-item-thumb"src="{{asset($item->thumbnail_path)}}">
			  				{{$item->title}}
			  			</a>
			  			@php($count_categories += 1)
			  		@endif
			  		@if($item->categories == "microcontroller")
			  			@php($count_categories_total += 1)
			  		@endif
			  	@endforeach
			  	<li class="list-group-item d-flex justify-content-between align-items-center item-count">
			  		<span class="badge bg-primary rounded-pill">{{$count_categories_total}}</span>
			  	</li>
			  	@if($count_categories == 0)
			  		<li class="list-group-item">No item in this category</li>
			  	@else
			  		<a class="list-group-item list-group-item-action"  href="{{url("categories/microcontroller")}}">See All</a>
			  	@endif
			</div> 
			<div class="list-group">
				<li class="list-group-item">tutorial</li>
				@php($count_categories = 0)
				@php($count_categories_total = 0)
				@foreach($query_all as $item)
					@if($item->categories == "tutorial" && $count_categories < 5)
			  			<a href="article/{{$item->id}}" class="list-group-item list-group-item-action">
			  				<img class="category-item-thumb"src="{{asset($item->thumbnail_path)}}">
			  				{{$item->title}}
			  			</a>
			  			@php($count_categories += 1)
			  		@endif
			  		@if($item->categories == "tutorial")
			  			@php($count_categories_total += 1)
			  		@endif
			  	@endforeach
			  	<li class="list-group-item d-flex justify-content-between align-items-center item-count">
			  		<span class="badge bg-primary rounded-pill">{{$count_categories_total}}</span>
			  	</li>
			  	@if($count_categories == 0)
			  		<li class="list-group-item">No item in this category</li>
			  	@else
			  		<a class="list-group-item list-group-item-action" href="{{url("categories/tutorial")}}">See All</a>
			  	@endif
			</div> 
		</div>
	</div>
@endsection
@section('script')
	<script>
		$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        	}
    	});

		$(document).ready(function(){
			var pref = document.querySelector(".first-on .page-link");
			var paginate_num_max = {{$pagination}};
			var now;

			//generate new pagination button
			function newPagination(){
				nowvalue = now.attributes.value;
				// overflow value
				var left_overflow = 0;
				var right_overflow = 0;

				const pagination_container = document.querySelector(".pagination");
				var html_text = "<li class='page-item'><a class='page-link pref'>Previous</a></li>";
				var current_value = parseInt(nowvalue.value);
				
				//check overflow left
				for(let i = 1 ; i <= 2 ; i++){
					if((parseInt(nowvalue.value) - i) <= 0){
						left_overflow += 1;
					}
				}
				//check overflow right 
				for(let i = 1 ; i <= 2 ; i++){
					if((parseInt(nowvalue.value) + i) > paginate_num_max){
						right_overflow += 1;
					}
				}
				var start = parseInt(nowvalue.value) - ((2- left_overflow) + right_overflow);
				//start generate new paginate button
				for(let i = 0 ; i < 5 ; i++){
					if((start + i) == parseInt(nowvalue.value)){
						var temp_text = "<li class='page-item active'><a class='page-link pg-lk-num' value="+ (start + i) +">"+ (start + i) +"</a></li>";
					}else{
						var temp_text = "<li class='page-item'><a class='page-link pg-lk-num' value="+ (start + i) +">"+ (start + i) +"</a></li>";
					}
						html_text = html_text + temp_text;
					}

				html_text = html_text + "<li class='page-item'><a class='page-link next'>Next</a></li>";
				$(".pagination").html(html_text);
			}

			$(".pagination").on('click',"a.pg-lk-num",function(){
				var value = $(this).attr('value');
				var btn_now = $(this)[0];
				now = btn_now;
				newPagination();
				pref = btn_now;

				$("#loading-spinner").modal("show");
				var url = "{{route('get.newpost',['page' => ':slug'])}}";	//generate url
				url = url.replace(':slug',value);
				$.ajax({
					type: 'POST',
					url : url,
					success : function(data){
						$("#loading-spinner").modal("hide");
						$(".cards-container").html(data.success);
					}
				});
			});

			$(".pagination").on('click',"a.pref",function(){
				var active_page = document.querySelector(".active a");
				var active_page_num = active_page.attributes.value;
				if((parseInt(active_page_num.value) - 1) != 0){
					var query_text = ".pg-lk-num[value=':slug']";
					query_text = query_text.replace(":slug",parseInt(active_page_num.value) - 1);
					var btn_now = document.querySelector(query_text);
					now = btn_now;
					newPagination();
					pref = btn_now;

					$("#loading-spinner").modal("show");
					var url = "{{route('get.newpost',['page' => ':slug'])}}";	//generate url
					url = url.replace(':slug',parseInt(active_page_num.value) - 1);
					$.ajax({
						type: 'POST',
						url : url,
						success : function(data){
							$("#loading-spinner").modal("hide");
							$(".cards-container").html(data.success);
						}
					});
				}else{
					//do nothing
				}
			});

			$(".pagination").on('click',"a.next",function(){
				var active_page = document.querySelector(".active a");
				var active_page_num = active_page.attributes.value;
				console.log(paginate_num_max);
				if((parseInt(active_page_num.value)) != paginate_num_max){
					var query_text = ".pg-lk-num[value=':slug']";
					query_text = query_text.replace(":slug",parseInt(active_page_num.value) + 1);
					var btn_now = document.querySelector(query_text);
					now = btn_now;
					newPagination();
					pref = btn_now;

					$("#loading-spinner").modal("show");
					var url = "{{route('get.newpost',['page' => ':slug'])}}";	//generate url
					url = url.replace(':slug',parseInt(active_page_num.value) + 1);
					$.ajax({
						type: 'POST',
						url : url,
						success : function(data){
							$("#loading-spinner").modal("hide");
							$(".cards-container").html(data.success);
						}
					});
				}
				else{
					//do nothing
				}
			});
		});
	</script>
@endsection