@extends("../tempelates/sidebar")
@section('css')
	<link rel="stylesheet" href="{{asset('css/admin-update-style.css')}}">
@endsection
@section('main-content')
	<div class="panel">
		@if(session('status'))
            <div class="alert alert-success">
                {{session('status')}}
            </div>
        @endif
		<form action ="{{url('admin/update/'.$query_data->id)}}" method="post">
			@csrf
			<textarea name='content' id='editor'>
				{{$query_data->text}}
			</textarea>

			<!-- Button trigger modal -->
			<button type="button" class="btn btn-primary submit-btn" data-bs-toggle="modal" data-bs-target="#content-attribute">
			  Submit
			</button>
			<a class="btn btn-danger cancel-btn" href="{{url("admin")}}">Discard</a>

			<!-- Modal -->
			<div class="modal fade" id="content-attribute" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  <div class="modal-dialog">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
			        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			      </div>
			      <div class="modal-body">
			        <!-- Input Group-->
			        <div class="input-group mb-3">
					  	<input type="text" class="form-control" aria-label="Example text with button addon" aria-describedby="button-addon1" name="content-title" placeholder="Content title.....">
					</div>
					<div class="input-group mb-3">
						<label class="input-group-text" for="content-categories">Categories</label>
						<select class="form-select" id="content-categories" name="content-categories">
						   <option selected>Other</option>
						   <option value="1">Electronics</option>
						   <option value="2">DIY</option>
						   <option value="3">Tutorial</option>
						   <option value="1">Control</option>
						</select>
					</div>
					<div class="input-group">
					  	<textarea class="form-control" aria-label="With textarea" name="content-description" placeholder="content description....."></textarea>
					</div>
			      </div>
			      <div class="modal-footer">
			      	<button type="submit" class="btn btn-primary btn-submit">Publish</button>
			        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
			      </div>
			    </div>
			  </div>
			</div>
		</form>
	</div>	
@endsection

@section('javascript')
	<!-- JavaScript Bundle with Popper (bootstrap) -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<script src="{{asset('js/ckeditor/ckeditor.js')}}"></script>
	<script type="text/javascript">
		CKEDITOR.replace( 'editor', {
			filebrowserUploadUrl : "{{route('ckeditor.upload',['_token' => csrf_token()])}}",
			filebrowserUploadMethod : 'form',
			height:300
		} );
	</script>
@endsection