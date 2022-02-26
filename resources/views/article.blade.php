@extends('tempelates/main')
@section('css')
	<link rel="stylesheet" href="{{asset('css/article-style.css')}}">
@endsection
@section('content')
	<div class="content">
		<div class="content-header">
			<p class="content-title">{{$query_data->title}}</p>
			<p class="content-info"> <span class="content-info-text">Ditulis oleh</span> <span class="writer-name">wahyu dwi ahmadi</span> <span class="content-info-text">Dipublikasikan pada</span> <span class='publish-date'>.....</span></p>
		</div>
		<div class="thumbnail-image">
			<img src="{{asset($query_data->thumbnail_path)}}">
		</div>
		{!! $query_data->text !!}
	</div>
@endsection