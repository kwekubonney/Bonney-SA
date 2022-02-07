@extends('layouts.pagesTemplate')

@section('mainContent')

	<div class="row">
		<div class="col-sm-8  mt-5">
			<div class="row bg-light py-3">
			
				<div class="col-sm-6">
					<div class="card">
						<div class="card-header d-flex justify-content-left">
							<img src="{{asset('/storage/images/'.$fixtureId->team1->teamPicture)}}" style="width:50px; height:40px; border-radius:50%;">
							<h3>{{$fixtureId->team1->teamName}}</h3>
						</div>
						<div class="card-body">
							<ul class="list-group">
								@for($i=0; $i < count($fixtureDetails); $i++)
								@if($fixtureId->team1->id == $fixtureDetails[$i]->team_id)
								<li class="list-group-item"><span><img src="{{asset('/storage/players/'.$fixtureDetails[$i]->player->image)}}" style="width:30px; height:30px; border-radius:50%;"></span> {{$fixtureDetails[$i]->player->firstName}}
									{{$fixtureDetails[$i]->player->lastName}}</li>
								@endif
								@endfor
								
							</ul>
						</div>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="card">
						<div class="card-header d-flex justify-content-left">
							<img src="{{asset('/storage/images/'.$fixtureId->team2->teamPicture)}}" style="width:50px; height:40px; border-radius:50%;">
							<h3>{{$fixtureId->team2->teamName}}</h3>
						</div>
						<div class="card-body">
							<ul class="list-group">
								@for($i=0; $i < count($fixtureDetails); $i++)
								@if($fixtureId->team2->id == $fixtureDetails[$i]->team_id)
								<li class="list-group-item"><span><img src="{{asset('/storage/players/'.$fixtureDetails[$i]->player->image)}}" style="width:30px; height:30px; border-radius:50%;"></span> {{$fixtureDetails[$i]->player->firstName}}
									{{$fixtureDetails[$i]->player->lastName}}</li>
								@endif
								@endfor
								
							</ul>
						</div>
					</div>
				</div>
			
			</div>
		</div>
		<div class="col-sm-4 mt-3 ">
			<div class="my-2">
				<div >
					<button class="btn btn-primary " data-toggle="modal" data-target="#addComment">Add Comment</button>
					<button class="btn btn-primary" data-toggle="modal" data-target="#buyTicket">Buy Ticket</button>
					<button class="btn btn-primary" data-toggle="modal" data-target="#predict">Predict</button>
				</div>
			</div>
			<div class="card">
				<div class="card-header text-center">
					<h3>COMMENTS</h3>
				</div>
				<div class="card-body">
					<div>
						<h5>
							<span>Dominic Bonney</span>
							<span>4hrs ago</span>
						</h5>
						<p>
							The quick brown fox jump over the lazy dog early this morning.
						</p>
					</div><hr>
					<div>
						<h5>
							<span>Dominic Bonney</span>
							<span>4hrs ago</span>
						</h5>
						<p>
							The quick brown fox jump over the lazy dog early this morning.
						</p>
					</div><hr>
					<div>
						<h5>
							<span>Dominic Bonney</span>
							<span>4hrs ago</span>
						</h5>
						<p>
							The quick brown fox jump over the lazy dog early this morning.
						</p>
					</div><hr>

				</div>
			</div>

			<div class="modal fade" data-backdrop="static" id="addComment">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h4>Have Your Say</h4>
							<button class="close" data-dismiss="modal">
								<span>&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form>
								@csrf
								<textarea rows="8" class="form-control"></textarea>
								<input type="submit" value="Send" class="btn btn-success btn-block my-2">
							</form>
							<p>Let the world know what your taught about this game.</p>
						</div>
					</div>
				</div>
			</div>

			<div class="modal fade" data-backdrop="static" id="buyTicket">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h3 class="text-center">PURCHASE YOR TICKET</h3>
							<button class="close" data-dismiss="modal">
								<span>&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<table style="width:100%;">
								<tr>
									<td>1</td>
									<td>VIP</td>
									<td>10 USD</td>
								</tr>
								<tr>
									<td>2</td>
									<td>Around VIP</td>
									<td>5 USD</td>
								</tr>
								<tr>
									<td>3</td>
									<td>Around The Field</td>
									<td>300 LRD</td>
								</tr>
							</table>
							<form>
								@csrf
								<img src="{{asset('/image/orangemoney.png')}}" style="width:100%; height:200px;" class="pt-5 ">
								<!-- <div style="box-shadow:-1px 2px 3px 4px skyblue;"> --><hr>
								<div class="d-inline">
									<label>Full Name</label>
									<input type="text" name="fullName" class="form-control">
								</div>
								<div>
									<label>Position</label>
									<select class="form-control" name="position">
									<option>... Select Position ... </option>
									<option>VIP</option>
									<option>Around VIP</option>
									<option>Around the Field</option>
								</select>
								</div>
								<div class="">
									<label>Address</label>
									<input type="text" name="address" class="form-control">
								</div>
								<div class="">
									<label>Phone Number</label>
									<input type="number" name="contact" class="form-control">
								</div>
								<input type="submit" value="Send" class="btn btn-success btn-block my-2">

							</form>
							<p>Let the world know what your taught about this game.</p>
						</div>
					</div>
				</div>
			</div>

			<div class="modal fade" data-backdrop="static" id="predict">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h3 class="text-center">WHAT YOUR PREDICTION </h3>
							<button class="close" data-dismiss="modal">
								<span>&times;</span>
							</button>
						</div>
						<div class="modal-body">
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection