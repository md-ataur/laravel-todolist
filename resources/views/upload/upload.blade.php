@extends('layout.app')
@section('body')
	<div class="col-md-4 offset-md-4">	
		@include('upload.partials.message')
		@include('upload.partials.errors')
		<h4>Single file upload</h4>	
		<form action="/store" method="post" enctype="multipart/form-data">
			{{csrf_field()}}
			<div class="form-group">	
			<br/>
				<div class="custom-file">
					<input type="file" name="image" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
					<label class="custom-file-label" for="inputGroupFile01">Choose file</label>
				</div>
				<div class="mt-2"> 
					<input type="submit" name="submit" value="Upload" class="btn btn-info">
				</div>
			</div>
		</form>		
	</div>	
	<div class="col-md-4 offset-md-4">
		<hr>
		<h4>Multiple file upload at a time</h4>		
		<form action="/store" method="post" enctype="multipart/form-data">
			{{csrf_field()}}
			<div class="form-group">	
			<br/>
				<div class="custom-file">
					<input type="file" name="file[]" multiple="true" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
					<label class="custom-file-label" for="inputGroupFile01">Choose file</label>
				</div>
				<div class="mt-2"> 
					<input type="submit" name="submit" value="Upload" class="btn btn-info">
				</div>
			</div>
		</form>		
	</div>	
	<div class="col-md-4 offset-md-4">
		<hr>
		<h4>Data show from Database</h4>
		@foreach ($files as $image)			
			<a href="show/{{$image->id}}">{{$image->name}}</a><br/>
		@endforeach
	</div>
@endsection