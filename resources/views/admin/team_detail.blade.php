@extends('adminlte::page')

@section('title', 'LIB-SPORT')

@section('content_header')
	<h3>Team/Detail</h3>
@endsection
	
@section('content')

	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-8">
				<div class="card ">
					<div class="card-header bg-secondary">
						<h3>Team Basic Info</h3>
					</div>
					<div class="card-body">
						<div class="row d-flex justify-content-between">
							<div style="width:70px; height:50px; border-radius:50%;" class="px-2">
								<img src="{{asset('/storage/images/'.$team->teamPicture)}}" style="width:100%; height:100%;">
							</div>
							<div>
								<p>{{$team->id}}<br><small>Code No.</small></p>
							</div>
						</div>
						<h3>{{$team->teamName}}</h3>
						<div class="row">
							<div class="col-sm-6">
								<h6 class="py-2"> Level: <b>{{$team->teamLevel}}</b></h6>
							</div>
							<div class="col-sm-6">
								<h6 class="py-2"> Address: <b>{{$team->teamAddress}}</b></h6>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<h6 class="py-2" style="border-bottom:1px solid black;"> Email: <b>{{$team->teamEmail}}</b></h6>
							</div>
							<div class="col-sm-6">
								<h6 class="py-2"> Contact: <b>{{$team->teamContact}}</b></h6>
							</div>
						</div>
					</div>
<!-- --------------------------------------------------------------------- -->
					<div class="card">
					<div class="card-header bg-secondary">
						<h3>Team Rep Info</h3>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-sm-6">
								<p>First Name : <b>{{$team->teamrep->firstName}}</b></p>
							</div>
							<div class="col-sm-6">
								<p>Last Name : <b>{{$team->teamrep->lastName}}</b></p>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<p>Contact 1 : <b>{{$team->teamrep->contact1}}</b></p>
							</div>
							<div class="col-sm-6">
								<p>Contact 2 : <b>{{$team->teamrep->contact2}}</b></p>
							</div>
							<div class="col-sm-6">
								<p>Email : <b>{{$team->teamrep->email}}</b></p>
							</div>
						</div>
					</div>
				</div>
				</div>

				
			</div>
			<div class="col-sm-4">
				<div class="card">
					<div class="card-header bg-secondary">
					<h3>Team Player</h3>
				</div>
				<div class="card-body">
					<ul class="list-group">
						@foreach($players as $player)
						<li class="list-group-item d-flex justify-content-between">
							<p>{{$player->firstName}} {{$player->lastName}}</p>
							<div style="width:40px; height:40px;"><img src="{{asset('/storage/players/'.$player->image)}}" style="width:100%; height:100%; border-radius:50%;"></div>
						</li>
						@endforeach
					</ul>
				</div>
				</div>
			</div>
		</div>
		<div class="mb-4 bg-info">
			<table class="table table-striped text-center">
				@foreach($fixtures as $fixture)
				<tr>
					<!-- @for($i=0; $i < count($fixtures); $i++)
					<td>{{$i}}</td>
					@endfor -->
					<td>{{$fixture->team1->teamName}}</td>
					<td>VS</td>
					<td>{{$fixture->team2->teamName}}</td>
					<td>
						<span>{{$fixture->venue->name}}</span>&nbsp &nbsp
						<span>{{date('h : iA', strToTime($fixture->gameTime))}}</span>&nbsp &nbsp
						<span>{{date('M j, Y', strToTime($fixture->gameDate))}}</span>
					</td>
				</tr>
				@endforeach
			</table>
			<!--  -->
		</div>
	</div>

@endsection