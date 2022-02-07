@extends('layouts.pagesTemplate')

@section('mainContent')
	<div class="row">
		<div class="col-sm-9 mt-5">
		 <div class="card">
		 	<div class="card-header text-center">
		 		<h1>ALL GAME RESULTS</h1>
		 	</div>
		 	<div class="card-body">
		 		<div class="col-sm-12 " style="box-shadow:-1px 2px 4px 4px gray;">
		 	@foreach($results as $result)
			<div class="row py-3">
				<div class="col-sm-5">
					<h4 class="text-center">
						<span>{{$result->fixture->team1->teamName}}</span>&nbsp; 
						<img src="{{asset('/storage/images/'.$result->fixture->team1->teamPicture)}}" style="width:60px; height:50px; border-radius:50%;">&nbsp; &nbsp;
						<span>{{$result->homeScore}}</span>
					</h4>
				</div>
				<div class="col-sm-1">
					<h5>{{$result->status}}</h5>
				</div>
				<div class="col-sm-5">
					<h4 class="text-center">
						<span>{{$result->awayScore}}</span>&nbsp; &nbsp;
						<img src="{{asset('/storage/images/'.$result->fixture->team2->teamPicture)}}" style="width:60px; height:50px; border-radius:50%;">&nbsp; 
						<span>{{$result->fixture->team2->teamName}}</span>&nbsp; 
					</h4>
				</div>
				<div class="col-sm-1">
					<button class="resultDetails" id="{{$result->fixture_id}}" data-toggle="modal" data-target=".resultDetail" style="background-color:darkred; color:white;">Detail</button>
				</div>
			</div><hr style="background-color:black; height:5px;">

			@endforeach
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


		<!-- detail modal -->
		<div class="modal resultDetail fade" data-backdrop="static">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<h3 id="header">Game Label</h3>
						<button class="close" data-dismiss="modal">&times</button>
					</div>
					<div class="card-body" id="body">
						
					</div>
					<div class="card-footer">
						Hello world
					</div>
				</div>
			</div>
		</div>

	</div>


	<script type="text/javascript">
	$(document).ready(function(){
		$(".resultDetails").click('on', function(){
			 var name =  $(this).attr('id');
			 $.ajax({
			 	type: "Get",
			 	url: '/resultDetail/'+name,
			 	success: function(data){
			 		$("#body").html(data);
			 	}
			 })
		})
	})
</script>
@endsection

