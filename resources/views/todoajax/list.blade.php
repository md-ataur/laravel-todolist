@extends('layout.app')
@section('body')
	<div class="col-md-6 offset-md-3">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">Ajax Todo List <a href="" id="addNew" class="float-right" data-toggle="modal" data-target="#todoModal"><i class="fas fa-plus-circle"></i></a></h3>
			</div>
			<div class="card-header">
				<input type="text" name="" class="form-control" id="search" placeholder="Search...">
			</div>
			<div class="card-body" id="itemList">
				<ul class="list-group">
					@foreach ($items as $item)
				  		<li class="list-group-item ourItem" data-toggle="modal" data-target="#todoModal">{{$item->name}}
				  			<input type="hidden" id="itemId" value="{{$item->id}}">				  			
				  		</li>
					@endforeach
				</ul>
			</div>
			
			<!-- Modal -->
			<div class="modal fade" id="todoModal" tabindex="-1" role="dialog" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="title">Add New Item</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<input type="hidden" id="id">							
							<input type="text" name="" class="form-control" id="addItem" placeholder="Write item here">
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-danger" id="deleteButton" data-dismiss="modal" style="display: none;">Delete</button>
							<button type="button" class="btn btn-secondary" id="saveButton" data-dismiss="modal" style="display: none;">Save changes</button>
							<button type="button" class="btn btn-info" id="AddButton" data-dismiss="modal">Add Item</button>
						</div>
					</div>
				</div>
			</div>
			{{csrf_field()}}
		</div>
	</div>
@endsection
