@extends('layout.app')
@section('body')
<div class="col-lg-4 offset-md-4">	
	<center><h2>{{ucfirst(substr(Route::currentRouteName(),5))}} Item</h2></center>
	<form action="/todo/@yield('editId')" method="POST">	
		{{ csrf_field() }}
		@section('editMethod')
		@show	
		<div class="form-group">
			<input type="text" name="title" value="@yield('editTitle')" class="form-control" placeholder="Title" />
		</div>
		<div class="form-group">
			<textarea class="form-control" name="body" rows="4" placeholder="Body" data-gramm_editor="true" >@yield('editBody')
			</textarea>
		</div>
		<center>
			<a href="/todo" class="btn btn-info">Back</a>
			<input type="submit" value="Submit" class="btn btn-success">
		</center>		
	</form>
	<br>
	@include('todo.partials.errors')
</div>
@endsection