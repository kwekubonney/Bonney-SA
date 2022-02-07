@extends('adminlte::page')

@section('title', 'LIB-SPORT')
<script type="text/javascript" src="{{asset('/js/jquery.js')}}"></script>
@section('content_header')

	<h3>Game</h3>
@endsection

@section('content')
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-7">
				<div class="pb-3" style="max-height:200px;">
					<table class="table table-striped text-left" style="table-layout:fixed; width:100%">
						<tr class="bg-primary">
							<th><span class="text-light"><i class="fas fa-sort-amount-down-alt"></i></span> &nbsp; Home Team</th>
							<th></th>
							<th><span class="text-light"><i class="fas fa-sort-amount-down-alt"></i></span> &nbsp; Away Team</th>
							<th><span class="text-light"><i class="fas fa-sort-amount-down-alt"></i></span> &nbsp; Date</th>
							<th>Action</th>
						</tr>

						<!--  -->

					@foreach($fixtures as $fixture)
						<tr>
							<td style="width:40%; text-align:;"><img src="{{asset('/storage/images/'.$fixture->team1->teamPicture)}}" style="width:10%; height:50px;"> &nbsp; {{$fixture->team1->teamName}}</td>
							<td  style="width:5%; text-align:center;">VS</td>
							<td  style="width:40%; text-align:;"><img src="{{asset('/storage/images/'.$fixture->team2->teamPicture)}}" style="width:10%; height:50px;"> &nbsp; {{$fixture->team2->teamName}}</td>
							<td>{{$fixture->gameDate}} {{$fixture->gameTime}}</td>
							<td>
								@if($fixture->isPlay == 'No')
									@if(($fixture->status == 'assigned') AND ($fixture->gameassign->user_id == auth()->user()->id))
										<a href="/gameCover/{{$fixture->id}}" class="btn btn-sm btn-primary fixture">Cover Game</a>
									@endif
									

									@if((auth()->user()->kind == "teamRep") And ((auth()->user()->teamrep->team_id == $fixture->homeTeam) OR (auth()->user()->teamrep->team_id == $fixture->awayTeam)))
										
										<a href="/squart/{{$fixture->id}}" class="btn btn-sm btn-warning playerlist">Squart</a>
										
									@endif
								@endif
								
							</td>
						</tr>
					@endforeach

					</table>
				</div>


			</div>
			<div class="col-sm-5">
				<div class="card">
					<div class="card-header text-center">
						GAME RESULTS
					</div>
					<div class="card-body">
						<table class="table table-striped text-center">
							<tr class="bg-dark">
								<th>Home Team</th>
								<th></th>
								<th></th>
								<th>Away Team</th>
								<th></th>
							</tr>
							@for($i=0; $i < count($result); $i++)
							<tr>
								<td>{{$result[$i]->fixture->team1->teamName}}</td> 
								<td>{{$result[$i]->homeScore}}</td> 
								<td>{{$result[$i]['awayScore']}}</td>
								<td>{{$result[$i]->fixture->team2->teamName}}</td>
								<td>
									<a href="/game/detail/{{$result[$i]->fixture_id}}" class="btn btn-success btn-sm">View</a>
								</td>
							</tr>
							@endfor
							
						</table>
					</div>
				</div>
			</div>

			<!-- Game cover modal start -->

			<!-- <div class="modal" id="covergame">
				<div class="modal-dialog modal-xl">
					<div class="modal-content">
						<div class="modal-header text-center bg-secondary">
							<h3 class="text-center ">Today Game</h3>
							<button class="close" data-dismiss="modal">&times;</button>
						</div>
						<div class="modal-body">
							<div class="d-flex justify-content-between">
								<div>
									<button class="btn btn-warning" id="gameStart" style="display:inline;">Start</button>
									<button  class="btn btn-danger" id="halfTime">Half Time</button>
								</div>
								<div>
									<div class="card-body">01:20</div>
								</div>
								<div>
									<?php
										echo(now()); 
									?>
								</div>
							</div>
							<hr>

							<div class="row">
								<div class="col-sm-6">
									<div class="card">
										<div class="card-header bg-primary">
											<h3 class="text-center" id="hometeam"></h3>
										</div>
										<div class="card-body">
											<div class="form-group">
												<form method="post" action="">
													<label class="text-danger">Activities</label>
													<select class="form-control">
														<option>Goal</option>
														<option>Yellow Card</option>
														<option>Red Card</option>
													</select>
													<hr>
													<label class="text-danger">Players</label>
													<div class="form-group pb-4">
														<input type="radio" name="player" id="player"> 5 Dominic Bonney
														<input type="radio" name="player" id="player"> 5 Dominic Bonney
														<input type="radio" name="player" id="player"> 5 Dominic Bonney
														<input type="radio" name="player" id="player"> 5 Dominic Bonney
													</div>
													<div class="form-group">
														<input type="submit" value="Save" class="btn btn-success btn-block">
													</div>
												</form>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="card">
										<div class="card-header bg-danger">
											<h3 class="text-center" id="awayteam"></h3>
										</div>
										<div class="card-body">
											<div class="form-group">
												<form method="post" action="">
													<label class="text-danger">Activities</label>
													<select class="form-control">
														<option>Goal</option>
														<option>Yellow Card</option>
														<option>Red Card</option>
													</select>
													<hr>
													<label class="text-danger">Players</label>
													<div class="form-group pb-4">
														<input type="radio" name="player" id="player"> 5 Dominic Bonney
														<input type="radio" name="player" id="player"> 5 Dominic Bonney
														<input type="radio" name="player" id="player"> 5 Dominic Bonney
														<input type="radio" name="player" id="player"> 5 Dominic Bonney
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
						</div>
					</div>
				</div>
			</div> -->

			<!-- team squart modal start -->

			<div class="modal" id="squart">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h3>Team Squart</h3>
							<button class="close" data-dismiss="modal">&times;</button>
						</div>
						<div class="modal-body">
							<div style="width:100px; height:80px;">
								<img src="{{asset('/image/lfa-logo.png')}}" style="width:100%; height:100%; border-radius:50%;">
							</div>
							<div class="d-flex justify-content-between ml-3">
								<h3>PAGS FC</h3>
								<p>This is just a note</p>
							</div>
							<hr>
							<div class="card-header bg-secondary"><h4>Select Players</h4></div>
							<div class="card-body" style="border:1px solid lightgray; padding-bottom:0px;">
							
								<form>
									<div class="form-group">
										<div class="row mb-3">
											<div class="col-sm-6">
												<input type="checkbox" name="[]players">
												<span>Dominic Bonney</span>
											</div>
											<div class="col-sm-6">
												<input type="checkbox" name="[]players">
												<span>Dominic Bonney</span>
											</div>
											<div class="col-sm-6">
												<input type="checkbox" name="[]players">
												<span>Dominic Bonney</span>
											</div>
											<div class="col-sm-6">
												<input type="checkbox" name="[]players">
												<span>Dominic Bonney</span>
											</div>
										</div>
										<div>
											<input type="submit" value="Save" class="btn btn-success btn-block">
										</div>
									</div>


								</form>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
		
	</div>
	
@endsection