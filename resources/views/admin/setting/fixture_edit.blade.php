@extends('adminlte::page')

@section('title', 'LIB-SPORT')

@section('content_header')
	<h3>Fixture/Edid</h3>
@endsection

@section('content')
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-8 col-sm-offset-1">
				<div class="card">
				<div class="card-header">
					<p>Edit Fixture 1</p>
				</div>
				<div class="card-body">
					<form action="/fixture/update" method="post">
						@csrf
						<div class="form-group">
							<label class="text-danger">Home Team</label>
							<select class="form-control" name="homeTeam">
								<option value="{{$fixtures->homeTeam}}">{{$fixtures->team1->teamName}}</option>
								@foreach($teams as $team)
								<option value="{{$team->id}}">{{$team->teamName}}</option>
								@endforeach
							</select>
						</div>
						<div class="form-group">
							<label class="text-danger">Away Team</label>
							<select class="form-control" name="awayTeam">
								<option value="{{$fixtures->awayTeam}}">{{$fixtures->team2->teamName}}</option>
								@foreach($teams as $team)
								<option value="{{$team->id}}">{{$team->teamName}}</option>
								@endforeach
							</select>
						</div>

						<div class="row">
							<div class="col-sm-6">
								<label class="text-danger">Game Date</label>
								<input type="date" name="gameDate" value="{{$fixtures->gameDate}}" class="form-control">
							</div>
							<div class="col-sm-6">
								<label class="text-danger">Game Time</label>
								<input type="time" name="gameTime" value="{{$fixtures->gameTime}}" class="form-control">
							</div>
						</div>

						<div class="row">
							<div class="col-sm-12">
								<label class="text-danger">Venue</label>
								<select class="form-control" name="gameVenue">
									<option value="{{$fixtures->venue_id}}">{{$fixtures->venue->name}}</option>
									@foreach($venues as $venue)
									<option value="{{$venue->id}}">{{$venue->name}}</option>
									@endforeach
								</select>
							</div>
						</div><br>
						<div class="form-group">
							<input type="submit" value="Update" class="btn btn-block btn-success">
						</div>
					</form>
				</div>
			</div>
			</div>

			<div class="col-sm-2">
				<button class="btn btn-warning btn-block" data-toggle="modal" data-target="#assignGame">Assigned</button>
			</div>
		</div>

		<div class="modal" id="assignGame">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h3 class="text-center">ASSIGN GAME</h3>
						<button class="close" data-dismiss="modal">&times;</button>
					</div>

					<div class="modal-body">
						<form action="/assign" method="post">
							@csrf
							<div class="form-group">
								<label class="text-danger">Select Agent</label>
								<select class="form-control" name="agentId">
									@foreach($users as $user)
									<option value="{{$user->id}}">{{$user->agent->firstName}} {{$user->agent->lastName}}</option>
									@endforeach
								</select>
							</div>
							<div class="form-group">
								<input type="hidden" name="fixtureId" value="{{$fixtures->id}}">
							</div>
							<div class="form-group">
								<input type="submit" value="Assigned" class="btn btn-success btn-block btn-lg">
							</div>
						</form>
					</div>
				</div>
			</div>
			
		</div>
	</div>
@endsection