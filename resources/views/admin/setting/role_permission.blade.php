@extends('adminlte::page')

@section('title', 'LIB-SPORT')

@section('content_header')
	<div class="d-flex justify-content-between">
      <h1>Role - Permission</h1>
      
       <button class="btn btn-success" data-toggle="modal" data-target="#assignPermission" style="float:right;">Assign Permission</button> 
    </div>
@endsection

@section('content')

	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-6">
				<div class="card">
					<div class="card-header bg-secondary">
						ROLES CREATE
					</div>
					<div class="card-body">
						<div class="form-group">
							<form action="/role/create" method="post">
								
								  @csrf

								<div class="input-group">
									<input type="text" name="roleName" class="form-control">
									<input type="submit" value="Save">
								</div>
							</form>
						</div>
					</div>
					<div class="card" style="margin-top:-10px; border-top:2px solid gold;">
					<div class="card-header bg-secondary">LIST OF ROLES</div>
					<div class="card-body"  style="max-height:250px; overflow:auto;">
						<ul class="list-group">
							@foreach($roles as $role)
							<li class="list-group-item">{{$role->name}}</li>
							@endforeach
					</div>
				</div>
				</div>
				
			</div>

			<div class="col-sm-6">
				<div class="card">
					<div class="card-header bg-secondary">
						PERMISSIONS CREATE

					</div>
					<div class="card-body">
						<div class="form-group">
							<form action="/permission/create" method="post">

								 @csrf

								<div class="input-group">
									<input type="text" name="permissionName" class="form-control">
									<input type="submit" value="Save">
								</div>
							</form>
						</div>
					</div>

					<div class="card" style="margin-top:-10px; border-top:2px solid gold;">
					<div class="card-header bg-secondary">LIST OF PERMISSIONS</div>
					<div class="card-body"  style="max-height:250px; overflow:auto;">
						<ul class="list-group">
							@foreach($permissions as $permission)
							<li class="list-group-item">{{$permission->name}}</li>
							@endforeach
						</ul>
					</div>
				</div>
				</div>
			</div>
		</div>
	</div>

	<div class="modal" id="assignPermission">
   		<div class="modal-dialog">
   			<div class="modal-content">
   				<div class="modal-header bg-secondary">
   					<h5 class="modal-title text-center" id="exampleModalLongTitle">
   						<i>ASSIGN PERMISSIONS TO ROLE</i>
   					</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                    </button>
   				</div>

   				<div class="modal-body">
   					<div class="form-group">
   						<form action="/assignPermission" method="post">
   							@csrf

   							<div class="form-group">
   								<label>Select Role</label>
   								<select class="form-control" name="role">
   									@foreach($roles as $role)
   									<option value="{{$role->id}}">{{$role->name}}</option>
   									@endforeach
   								</select>
   							</div>
   							<hr>
   							<div class="form-group">
   								@foreach($permissions as $permission)
   								
   								<input type="checkbox" name="permission[]" value="{{$permission->id}}">
   								<label>{{$permission->name}}</label>&nbsp; &nbsp;
   								
   								@endforeach
   							</div>
   							<div class="form-group">
   								<input type="submit" value="Save" class="btn btn-success btn-block">
   							</div>
   						</form>
   						
   					</div>
   				</div>
   			</div>
   		</div>
   	</div>

@endsection