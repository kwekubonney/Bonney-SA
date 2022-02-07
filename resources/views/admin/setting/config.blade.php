@extends('adminlte::page')

@section('title', 'LIB-SPORT')

@section('content_header')
    <div class="d-flex justify-content-between">
      <h1>Teams</h1>
      <!-- <button class="btn btn-success" data-toggle="modal" data-target="#team" style="float:right;">NEW TEAM</button> -->
    </div>
@endsection 

@section('content')

	<div class="container-fluic">
		<div class="row">
			<div class="col-sm-8">
				
				<div class="card-body form-group" style="border:1px solid black;">
					<h4 class="card-header text-center">CREATE NEW FIXTURE</h4>
					<small>
						<p>Home team and Away team can not be the same...</p>
					</small>
					<form action="/fixture/create" method="post">
						@csrf
						<div class="form-group">
							<label class="text-danger">Home Team</label>
							<select class="form-control" name="homeTeam">
								<option value=""></option>
								@foreach($teams as $team)
								<option value="{{$team->id}}">{{$team->teamName}}</option>
								@endforeach
							</select>
						</div>
						<div class="form-group">
							<label class="text-danger">Away Team</label>
							<select class="form-control" name="awayTeam">
								<option value=""></option>
								@foreach($teams as $team)
								<option value="{{$team->id}}">{{$team->teamName}}</option>
								@endforeach
							</select>
						</div>

						<div class="row">
							<div class="col-sm-6">
								<label class="text-danger">Game Date</label>
								<input type="date" name="gameDate" class="form-control">
							</div>
							<div class="col-sm-6">
								<label class="text-danger">Game Time</label>
								<input type="time" name="gameTime" class="form-control">
							</div>
						</div>

						<div class="row">
							<div class="col-sm-12">
								<label class="text-danger">Venue</label>
								<select class="form-control" name="gameVenue">
									@foreach($venues as $venue)
								<option value="{{$venue->id}}">{{$venue->name}}</option>
								@endforeach
								</select>
							</div>
						</div>

						<div class="row mt-3">
							<input type="submit" value="Save" class="btn btn-success btn-block btn-lg">
						</div>
					</form>
				</div>

				<hr>
<!-- ****************************************************************** -->
				<div class="mt-5 mb-5">
					<ul class="list-group">
						@foreach($fixtures as $fixture)
						<li class="list-group-item">
							<div class="d-flex justify-content-between">
								<p>{{$fixture->team1->teamName}}</p>
								<p>VS</p>
								<p>{{$fixture->team2->teamName}}</p>
								<div>
									<span>{{$fixture->venue->name}}</span>&nbsp &nbsp
									<span>{{$fixture->gameTime}}</span>&nbsp &nbsp
									<span>{{$fixture->gameDate}}</span>
								</div>
								<a href="/fixture/edit/{{$fixture->id}}" class="btn btn-primary"><i class="far fa-eye"></i></a>
							</div>
						</li>
						@endforeach
						
					</ul>
				</div>

			</div>

			<div class="col-sm-4">
				<div class="card">
					<div class="card-header">
						<h3 class="text-center">ADD VENUE</h3>
					</div>
					<div class="card-body">
						<form action="/venue/create" method="post" enctype="multipart/form-data">
							@csrf
							<div class="form-group">
								<input type="tex" placeholder="Venue Name" name="venueName" class="form-control" style="border:0px; border-bottom:1px solid black;">
							</div>
							<div class="form-group">
								<input type="tex" placeholder="Location" name="location" class="form-control" style="border:0px; border-bottom:1px solid black;">
							</div>
							<div class="form-group">
								<select class="form-control" name="active" style="border:0px; border-bottom:1px solid black;">
									<option value="1">Active</option>
									<option value="0">Deactive</option>
								</select>
							</div>
							<div class="form-group">
								<input type="file" placeholder="image" name="pic">
							</div>
							<div class="form-group">
								<input type="submit" value="Save" class="btn btn-success btn-block btn-sm">
							</div>
						</form>
					</div>
				</div>

				<div class="card">
					<h3 class="text-center card-header">ADD NEWS TYPE</h3>
					<div class="card-body">
						<form method="Post" enctype="multipart/form-data" action="/newsType">
							@csrf
							<input type="text" name="name" class="form-control mb-3" placeholder="News Type Name">
							<input type="file" name="pic" class="mb-3">
							<input type="submit" value="Save" class="btn btn-success form-control">
						</form>
					</div>
				</div>

			</div>
		</div>
	</div>

@endsection