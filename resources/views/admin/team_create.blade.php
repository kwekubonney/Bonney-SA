@extends('adminlte::page')

@section('title', 'LIB-SPORT')

@section('content_header')
	<h3>Team/Create</h3>
@endsection

@section('content')

	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-9">
				<div class="card">
			<div class="card-body">
				<form action="/team/store" method="post" enctype="multipart/form-data">
               
                @csrf

   							<div class="form-group">
   								<div class="row">
   									<div class="col-sm-6">
   										<label class="text-danger">Team Name</label>
   										<input type="text" name="teamName" placeholder="TEAM NAME" class="form-control">
   									</div>
   									<div class="col-sm-6">
   										<label class="text-danger">Common Name</label>
   										<input type="text" name="commonName" placeholder="COMMON NAME" class="form-control">
   									</div>
   								</div>
   							</div>
                <div class="form-group">
                  <label class="text-danger">Team Contact</label>
                  <input type="number" name="teamContact" class="form-control">
                </div>
                <div class="form-group">
                  <label class="text-danger">Team Address</label>
                  <input type="text" name="teamAddress" class="form-control">
                </div>
                <div class="form-group">
                  <label class="text-danger">Team Email</label>
                  <input type="email" name="teamEmail" class="form-control">
                </div>
   							
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label class="text-danger">Team Level</label>
                      <select class="form-control" name="teamLevel">
                        <option value="First Division">First Division</option>
                        <option value="Second Division">Second Division</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label class="text-danger">Team Image</label>
                      <input type="file" name="teamImage" >
                    </div>
                  </div>
                </div>
   					<center>
   						<div>
   							<input type="submit" value="SAVE" class="btn btn-danger btn-block btn-lg">
   						</div>
					</center>
   				</form>
			</div>
		</div>danger
			</div>
			<div class="col-sm-3">
				<div>
					<div class="p-2 text-center bg-info"><h3>List of Team</h3></div>
					<ol>
						@foreach($teams as $team)
						<li class="text-center" style="">{{$team->teamName}}</li>
						<hr>
						@endforeach
					</ol>
				</div>
			</div>
		</div>
	</div>

@endsection