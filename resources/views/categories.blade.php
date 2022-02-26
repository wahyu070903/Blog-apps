@extends("tempelates\main")
@section("css")
	<link rel="stylesheet" href="{{asset('css\categories-style.css')}}">
@endsection
@section("content")
	<div class="content">
		<div class="cards-container">
			@foreach($data_by_category as $item)
				<a href="{{url('article/'.$item->id)}}">
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
@endsection