@extends('layouts.pagesTemplate')

@section('mainContent')
	<div class="row">
		<div class="col-sm-9 mt-5">
		 <div class="col-sm-10 offset-sm-1" style="box-shadow:-1px 2px 4px 4px gray;">
			
				<div class="card">
					<div class="card-header">
						<h1>Fixture coming soon</h1>
					</div>
					<div class="card-body">
						<table class="table table-striped" style="width:100%;">
					<tr class="bg-dark text-light">
						<th>Match</th>
						<th class="text-center">Date</th>
						<th class="text-center">vanue</th>
						<th class="text-center">Action</th>	
					</tr>
					@foreach($fixtures as $fixture)
					<tr class="text-center mb-3">
						<td class="d-flex justify-content-center"> 
							<p>{{$fixture->team1->teamName}}<span>&nbsp;<img src="{{asset('/storage/images/'.$fixture->team1->teamPicture)}}" style="width:20px; height:20px;"></span></p> &nbsp; &nbsp; &nbsp;
							<p>vs</p>
							 &nbsp; &nbsp; &nbsp;<p class="mr-1"><span><img src="{{asset('/storage/images/'.$fixture->team2->teamPicture)}}" style="width:20px; height:20px;"></span>&nbsp; &nbsp; {{$fixture->team2->teamName}}</p>
						</td>
						<td style="border-left:1px solid black; line-height:5px;">
							<p>{{date("M d, Y", strtotime($fixture->gameDate))}}</p>
							<p>{{$fixture->gameTime}}</p>
						</td>
						<td style="border-left:1px solid black;">{{$fixture->venue->name}}</td>
						<td style="border-left:1px solid black;">
							<!-- <button class="btn btn-success" data-target="#fix_comment" data-toggle="modal">Comment</button> -->
							<a href="/fixtureDetail/{{$fixture->id}}" class="btn btn-success">Detail</a>
						</td>
					</tr>
					@endforeach
				</table>
					</div>
				</div>
			
		</div>
		</div>

		<div class="col-sm-3">
			<div class="card-body">
				<img src="/image/orange.jpg" style="width:100%; height:150px;">
			</div>

			<div class="card mb-5">
				<div class="card-header">
					<h4 class="text-center">Recent News</h4>
				</div>
				<div class="card-body" style="padding-bottom:0px;">
					@foreach($news as $new)
					<a href="/news/show/{{$new->id}}">
					<div class="row py-2" style="border-bottom:1px solid gray;">
							<div class="col-sm-4" style="height:70px;">
							<img src="{{asset('/storage/news/'.$new->picture)}}" style="width:100%; height:100%; margin:0px; padding:0px;">
							</div>
							<div class="col-sm-8" style="line-height:20px;">
								<p class="">{{$new->title}}</p>
							</div>
					</div>
					</a>
					@endforeach
				</div>
			</div>

			<div class="card mb-5">
				<div class="card-header"></div>
				<div class="card-body">
					<img src="/image/lfa-logo.png" style="width:100%; height:150px;">
				</div>
				<div class="card-footer">
					<h6>The Liberia National Leaque promo page</h6>
				</div>
			</div>
		</div>

		<div class="modal" id="fix_comment">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<h1 class="text-center">HAVE YOUR SAY</h1>
						<span class="close" data-dismiss="modal">&times;</span>
					</div>
					<div class="modal-body">
						<form>
							@csrf
							<div class="form-group">
								<label class="text-danger">Your Comment</label>
								<textarea class="form-control" rows="6"></textarea><br>
								<input type="submit" value="Submit" class="btn btn-block btn-success btn-lg">
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection