@extends('layout.app')
@section('body')
	<div class="col-lg-4 offset-md-4">
		<center><h2>Data Show</h2></center>
		<hr>
		<h3>{{$item->title}}</h3>
		<p>{{$item->body}}</p>
		<hr>
		<a href="/todo" class="btn btn-info">Back</a>
	</div>
@endsection