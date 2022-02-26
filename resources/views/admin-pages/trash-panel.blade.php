@extends("../tempelates/sidebar")
@section('css')
	<link rel="stylesheet" href="{{asset('css\admin-style.css')}}">
@endsection
@section('main-content')
	<div class="panel">
		@if(session('status'))
            <div class="alert alert-success">
                {{session('status')}}
            </div>
        @endif
		<div class="panel-header">
			<p><span class="active-tab-text">Home</span>\<span class="dashboard-text">Dashboard</span></p>
			<a href="{{url('admin\add')}}" class="btn btn-primary"><i class="fas fa-plus"></i> Add</a>
		</div>
		<div class="data-table">
			<table class="table table-bordered">
				<thead>
				    <tr>
				      <th>No</th>
				      <th>Title</th>
				      <th>Categories</th>
				      <th>Create_At</th>
				      <th>Action</th>
				    </tr>
				  </thead>
				  <tbody>
				  	@foreach($query_data as $key=>$item)
				  		<tr>
				  			<td>{{$key + 1}}</td>
					  		<td>{{$item->title}}</td>
					  		<td>{{$item->categories}}</td>
					  		<td>{{$item->created_at}}</td>
					  		<td class="data-action">
					  			<a href="/admin/delete/{{$item->id}}" class="btn btn-danger">
					  				<i class="fas fa-times"></i>
					  			</a>
					  			<a href="/admin/restore/{{$item->id}}" class="btn btn-secondary">
					  				<i class="fas fa-trash-restore"></i>
					  			</a>
					  		</td>
				  		</tr>
				  	@endforeach
				  </tbody>
			</table>
		</div>
	</div>
@endsection