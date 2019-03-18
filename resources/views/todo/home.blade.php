@extends('layout.app')
@section('body')	
	<div class="col-lg-5 offset-md-3">
		@include('todo.partials.message')
		<center><h2>Todo list</h2></center>
		<ul class="list-group ">
			@foreach ($datalist as $data)
				<li class="list-group-item d-flex justify-content-between align-items-center">
					<a href="{{'/todo/'.$data->id}}"> {{$data->title}}</a>				
					<div class="float-right">
						<span class="col-lg-2">{{$data->created_at->diffForHumans()}}</span>		
						<span class="mr-2">
							<a href="{{'/todo/'.$data->id.'/edit'}}">
								<button><i class="far fa-edit"></i></button>
							</a>
						</span>
						<form class="float-right" action="{{'todo/'.$data->id}}" method="post">
							{{ csrf_field() }}
							{{ method_field('DELETE') }}						
							<button type="submit"><i class="far fa-trash-alt"></i></button>
						</form>
					</div>
				</li>	
			@endforeach		
		</ul>			
		<center><a href="todo/create" class="mt-4 btn btn-info">Add New</a></center>
	</div>
@endsection