@extends('adminlte::page')

@section('title', 'LIB-SPORT')

@section('content_header')
<script type="text/javascript" src="{{asset('/js/jquery.js')}}"></script>
    <h1>Game/Cover</h1>
@endsection 

@section('content')

	<div class="contain" style="border:1px solid black;">
		<div class="card-header bg-secondary">
			<h3 class="text-center ">Today Game</h3>
		</div>

		<div class="d-flex justify-content-between p-3 mt-3 bg-info">
			<div>
				<form action="" method="post">
					@csrf
					<input type="hidden" value="{{$fixture->id}}" name="fixtureId" id="fixtureId">
					<input type="hidden" value="0" name="home" id="home">
					<input type="hidden" value="0" name="away" id="away">

					<input type="button" class="btn btn-warning btn-lg" id="startMatch" value="Start">
				</form>
				<div class="halfTime" style="display:none;">
					<form action="" method="post">
					@csrf
						<input type="hidden" id="fixHd" value="{{$fixture->id}}" name="fixture">
						<input type="button" class="btn btn-danger btn-lg" id="halfTime" value="HalfTime">
					</form>
				</div>

				<div class="secondhalf" style="display:none;">
					<form action="" method="post">
					@csrf
						<input type="hidden" id="fix2nd" value="{{$fixture->id}}" name="second">
						<input type="button" class="btn btn-success btn-lg" id="secondhalf" value="Start Second Half">
					</form>
				</div>

				<div class="matchend" style="display:none;">
					<form action="/matchend/{{$fixture->id}}" method="post">
					@csrf
						<input type="hidden" id="fixEnd" value="{{$fixture->id}}" name="end">
						<input type="submit" class="btn btn-primary btn-lg" id="matchend" value="Match Over">
					</form>
				</div>
				
			</div>
			<div>
				<div id="gameTime">0"</div>
			</div>
			<div>
				<?php
					echo(date('M d, Y', strToTime(now()))); 
				?>
			</div>
		</div>

		<div style="background-color:ghostwhite;" class="mt-4">

			<div class="row stat1">
				<div class="col-sm-6">
					<div class="card">
							<div class="card-header bg-primary">
								<h3 class="text-center" id="hometeam">{{$fixture->team1->teamName}}</h3>
							</div>
							<div class="card-body">
								<div class="form-group">
									<form method="post" action="">
										@csrf
										<label class="text-danger">Activities</label>
										<select class="form-control event" name="event">
											<option value="goal">Goal</option>
											<option value="yellowcard">Yellow Card</option>
											<option value="redcard">Red Card</option>
											</select>
										<hr>

										<div class="first" id="doing">
											<input type="hidden" class="fixtureId" value="{{$fixture->id}}" name="fixtureId">
											<input type="hidden" class="team" value="{{$fixture->homeTeam}}" name="team">
											<input type="hidden" class="score" value="homeScore" name="score">
										</div>

										<label class="text-danger">Players</label>
										<div class="form-group pb-4" class="playerDiv" id="we there">
											@foreach($homes as $home)
											<input type="radio" name="player" class="player" value="{{$home->player_id}}" id="player">  {{$home->player->firstName}} {{$home->player->lastName}}
											@endforeach
										</div>
										
										<div class="form-group">
											<input type="button" value="Save" class="btn btn-success btn-block gameStatistic">
										</div>
									</form>
								</div>
							</div>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="card">
						<div class="card-header bg-danger">
							<h3 class="text-center" id="awayteam">{{$fixture->team2->teamName}}</h3>
						</div>
						<div class="card-body">
							<div class="form-group">
								<form method="post" action="">
									@csrf
									<label class="text-danger">Activities</label>
									<select class="form-control event" name="event">
										<option value="goal">Goal</option>
										<option value="yellowcard">Yellow Card</option>
										<option value="redcard">Red Card</option>
									</select>
								<hr>
									<div id="test" class="first">
											<input type="hidden" class="fixtureId" value="{{$fixture->id}}" name="fixtureId">
											<input type="hidden" class="team" value="{{$fixture->awayTeam}}" name="team">
											<input type="hidden" class="score" value="awayScore" name="score">
									</div>

									<label class="text-danger">Players</label>
									<div class="form-group pb-4" class="playerDiv" >
										@foreach($aways as $away)
										<input type="radio" name="player" class="player" value="{{$away->player_id}}"> {{$away->player->firstName}} {{$away->player->lastName}}
										@endforeach
									</div>

									<div class="form-group">
										<input type="button" value="Save" class="btn btn-success btn-block gameStatistic">
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript">
		$(document).ready(function(){
			var gametimer;
			var gametimer2;
			var count = 0;
			var count2 = 45;

			$(".halfTime").hide();
			$("#startMatch").on('click', function(){

				 $.ajaxSetup({
			        headers: {
			            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			        }
			    });

				var fixtureId = $("#fixtureId").val();
				var home = $("#home").val();
				var away = $("#away").val();

				$.ajax({
					url:"/result/store",
					type:"post",
					datatype:"text",
					data:{
						fixture:fixtureId,
						homeTeam:home,
						status:'ON',
						awayTeam:away
					},
					success:function(response){
						alert(response);
					}
				});
				
				 gametimer = setInterval(timer, 600)

				$(this).hide();
				$(".halfTime").show();
			});

			
			function timer(){
					if(count > 45){
						$("#gameTime").text('45+ "');
					}else{
						$("#gameTime").text(count +'"');
					}
					
					count++;
				}


			 $(".gameStatistic").on('click', function(){

				 $.ajaxSetup({
			        headers: {
			            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			        }
			    });

				var fixture = $(this).parent().siblings(".first").children('.fixtureId').val();
				var team = $(this).parent().siblings(".first").children('.team').val();
				var player = $(this).parent().prev().children(".player:checked").val();
				var event = $(this).parent().siblings(".event").val();
				var score = $(this).parent().siblings(".first").children('.score').val();
				var eventTime = $("#gameTime").text();

				 // console.log(eventTime);

				$.ajax({
					url:"/statistics/store",
					type:"post",
					datatype:"text",
					data:{
						fixture:fixture,
						team:team,
						player:player,
						event:event,
						eventTime:eventTime,
						score:score
					},
					success:function(response){
						 alert(response);
					}
				});
			 })


			$('#halfTime').on('click', function(){
				 $.ajaxSetup({
			        headers: {
			            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			        }
			    });

				var status = 'HT';
				var fixture = $('#fixHd').val();
//console.log(status + ' ' + fixture);

				$.ajax({
					url:"/halftime",
					type:"post",
					datatype:"text",
					data:{
						status:status,
						fixture:fixture
					},
					success:function(response){
						alert(response);
					}
				})
				clearInterval(gametimer);
				$("#gameTime").text("HT");
				$('.secondhalf').show();
				$(this).hide();
				$('.stat1').hide();
			})


			$('#secondhalf').on('click', function(){

				 $.ajaxSetup({
			        headers: {
			            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			        }
			    });

				var status = 'ON';
				var fixture = $('#fixHd').val();

				$.ajax({
					url:"/halftime",
					type:"post",
					datatype:"text",
					data:{
						status:status,
						fixture:fixture
					},
					success:function(response){
						alert(response);
					}
				})


				$("#gameTime").text(count2);
				$('.stat1').show();
				$(this).hide();
				$(".matchend").show();
				mytimer = setInterval(timer2, 600);
			})

			function timer2(){
					count2++;
					$("#gameTime").text(count2);
				}

		})
	</script>
<!-- /statistics -->
@endsection