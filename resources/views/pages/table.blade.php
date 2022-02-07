@extends('layouts.pagesTemplate')

@section('mainContent')
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-3 ">
				<div class="card my-4">
					<a href="">
					<div class="card-body">
						<img src="/image/orange.jpg" style="width:100%; height:10em;">
					</div>
					</a>
				</div>
				<div class="card">
					<div class="card-header text-center" style="border-radius:5%;">FIXTURES</div>
					<div class="card-body">
						@foreach($fixtures as $fixture)
						<div class="" style=" background-color:;" class="">
							<div class="d-flex justify-content-between" style="font-weight:bold; line-height:10px; font-size:0.9em;">
								<p>{{$fixture->team1->teamName}}</p>
								<p class="text-primary">VS</p>
								<p>{{$fixture->team2->teamName}}</p>
							</div>
							<p style="font-size:0.8em;" class="text-center text-danger">{{$fixture->venue->name}} &nbsp; {{date("M d, Y", strtotime($fixture->gameDate))}} &nbsp; {{$fixture->gameTime}}</p>
						</div><hr>
						@endforeach
						@if(count($fixtures) > 5)
						<center><a href="/fixture" class="btn btn-link">View More</a></center>
						@endif
						
					</div>
				</div>

					<div class="card my-4">
						<a href="">
						<div class="card-body">
							<img src="/image/orange.jpg" style="width:100%; height:10em;">
						</div>
						</a>
					</div>
			</div>


			<div class="col-sm-9">
				<div class="card mt-5">
					<div class="card-header text-center">
						<h2 style="color:orange;">ORANGE FIRST DIVISION NATIONAL LEAGUE TABLE</h2>
					</div>
					<div class="card-body">
						<table class="table table-striped " style="width:100%;">
							<tr class="bg-dark text-light">
								<th>No.</th>
								<th>Team</th>
								<th>GP</th>
								<th>W</th>
								<th>L</th>
								<th>D</th>
								<th>PTS</th>
							</tr>
							@for($i=0; $i < count($tables); $i++)
							<tr>
								<td>{{$i + 1}}</td>
								<td><span><img src="{{asset('/storage/images/'.$tables[$i]->team->teamPicture)}}" style="width:40px; height:20px; border-radius:50%;"></span> &nbsp; {{$tables[$i]->team->teamName}}</td>
								<td>{{$tables[$i]['gamePlay']}}</td>
								<td>{{$tables[$i]['win']}}</td>
								<td>{{$tables[$i]['lost']}}</td>
								<td>{{$tables[$i]['draw']}}</td>
								<td>{{$tables[$i]['points']}}</td>
							</tr>
							@endfor
							
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection