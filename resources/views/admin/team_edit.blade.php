@extends('adminlte::page')

@section('title', 'LIB-SPORT')

@section('content_header')
    <h1>Teams/Edit</h1>
@endsection 

@section('content')

	<div class="container-fluid">
		<div class="row">
      <div class="col-sm-10 offset-sm-1">
        <div class="card">
          <div class="card-header">
            <div style="width:100px; height:70px;">
                 <img src="{{asset('/storage/images/'.$editteam->teamPicture)}}" style="border-radius:50%; width:100%; height:100%;">
            </div>
            <!-- <h2 class="text-center">Edit Team
            </h2> --></div>
          <div class="card-body">
            
      <form action="/team/edit/{{$editteam->id}}" method="post" enctype="multipart/form-data">
               
                @csrf

                <div class="form-group">
                  <label class="text-danger">Team Name</label>
            <input type="text" name="teamName" value="{{$editteam->teamName}}" class="form-control">
                </div>
                <div class="form-group">
                  <label class="text-danger">Team Contact</label>
                  <input type="number" name="teamContact" value="{{$editteam->teamContact}}" class="form-control">
                </div>
                <div class="form-group">
                  <label class="text-danger">Team Address</label>
                  <input type="text" name="teamAddress" value="{{$editteam->teamAddress}}" class="form-control">
                </div>
                <div class="form-group">
                  <label class="text-danger">Team Email</label>
                  <input type="email" name="teamEmail" value="{{$editteam->teamEmail}}" class="form-control">
                </div>
                
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label class="text-danger">Team Level</label>
                      <select class="form-control" name="teamLevel">
                        <option value="{{$editteam->teamLevel}}">{{$editteam->teamLevel}}</option>
                        <option value="1">First Division</option>
                        <option value="2">Second Division</option>
                      </select>
                    </div>
                  </div>
                </div>
                
          <div>
            <input type="submit" value="Update" class="btn btn-success btn-lg">

            <button type="button" data-toggle="modal" data-target="#changeLogo" class="btn btn-link text-primary">change logo?</button>
          </div>
                
          </form>
    </div>
        </div>
      </div>
    </div>
	</div>

	<div class="modal" id="changeLogo">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">CHANGE TEAM LOGO</h4>
					<button class="close" data-dismiss="modal">
						<span>&times;</span>
					</button>
				</div>

				<div class="modal-body">
					<div class="form-group px-4">
						<form action="/changeLogo/{{$editteam->id}}" method="post" enctype="multipart/form-data">
              @csrf
							<label class="text-danger">Choose Your Image</label><br>
							<input type="file" name="teamImage">
							<input type="hidden" value="{{$editteam->id}}" name="logo">
							<center>
								<input type="submit" value="Change" class="btn btn-success">
							</center>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection