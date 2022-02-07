@extends('adminlte::page')

@section('title', 'LIB-SPORT')

@section('content_header')
<script type="text/javascript" src="{{asset('/js/jquery.js')}}"></script>
    <h1>Team/Squart</h1>
@endsection 

@section('content')
	

						<div class="">
							<div class="card">
								<div class="card-body">
								<div class="d-flex justify-content-between ml-3">
								<h3>PAGS FC</h3>
								<p>This is just a note</p>
								</div>
								<div style="width:100px; height:80px;">
								<img src="{{asset('/image/lfa-logo.png')}}" style="width:100%; height:100%; border-radius:50%;">
								</div>
								
							</div>
							</div>
							<hr>
							<div class="card">
								<div class="card-header bg-secondary"><h4>Select Players</h4></div>
							<div class="card-body" style="border:1px solid lightgray; padding-bottom:0px;">
							
								<form action="/squart/create" method="post">
									@csrf
									<div class="form-group">
										<div class="row mb-3">
											<input type="hidden" name="teamId" value="{{$teamId}}">
											<input type="hidden" name="fixtureId" value="{{$fixture->id}}">
											@foreach($teamPlayers as $player)
											<div class="col-sm-3">
												<input type="checkbox"  name="players[]" value="{{$player->id}}">
												<span>{{$player->firstName}} {{$player->lastName}}</span>

											</div>
											@endforeach
											
										</div>
										<div>
											<input type="submit" value="Save" id="tst" class="btn btn-success btn-block">
										</div>
									</div>


								</form>
							</div>
							</div>
						</div>

						<!-- <script type="text/javascript">
							$('document').ready(function(){
								$("#tst").on('click', function(){
									var tt = $(".player").val();
									console.log(tt);
								})
								
							})
						</script> -->
					
				
			
@endsection