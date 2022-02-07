@extends('adminlte::page')

@section('title', 'LIB-SPORT')

@section('content_header')
	<h2>HELLO</h2>
@endsection

@section('content')
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-9 mt-5">
				<div class="card">
					<div class="card-header text-center bg-secondary">ADD NEW PLAYER</div>
					<div class="card-body">
					<div class="form-group">
						<form action="/player/create" method="post" enctype="multipart/form-data">
							@csrf
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										<label class="text-danger">First Name</label>
										<input type="text" name="firstName" class="form-control">
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<label class="text-danger">Last Name</label>
										<input type="text" name="lastName" class="form-control">
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										<label class="text-danger">Position</label>
										<input type="text" name="position" class="form-control">
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<label class="text-danger">Date of Birth</label>
										<input type="date" name="dob" class="form-control">
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-sm-12">
									<div class="form-group">
										<label class="text-danger">Select Team</label>
										<select name="team" class="form-control">
											@foreach($teams as $team)
											<option value="{{$team->id}}">{{$team->teamName}}</option>
											@endforeach
										</select>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<div class="form-group">
										<label class="text-danger">Image</label>
										<input type="file" name="picture">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<div class="form-group">
										<input type="submit" value="Save" class="btn btn-success btn-block">
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
				</div>
			</div>

			<div class="col-sm-3">
				<div class="card">
					<div class="card-header text-center bg-warning">PLAYERS</div>
					<div class="card-body">
						<ul class="list-group">
							@foreach($players as $player)
							<li class="list-group-item d-flex justify-content-between">
								<div style="width:30px; height:30px;"><img src="{{asset('storage/images/'.$player->team->teamPicture)}}" style="width:100%; height:100%; border-radius:50%"></div>
								<p>{{$player->firstName}} {{$player->lastName}}</p>
							</li>
							@endforeach
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection