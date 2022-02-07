@extends('layouts.pagesTemplate')

@section('mainContent')

<div class="row">
	<div class="col-sm-3">
		<div class="card my-4">
		<a href="">
		<div class="card-body">
			<img src="/image/see.png" style="width:100%; height:10em;">
		</div>
		</a>
	</div>

	<div class="card my-4">
		<h3 class="text-center">GAME RESULTS</h3>
		<ul class="list-group">
			@foreach($results as $result)
			<li class="list-group-item">
				<table style="width:100%;">
				<tr style="margin-bottom:10px;">
					<td style="width:40%; color:;">{{$result->fixture->team1->teamName}}</td>
					<td style="width:10%; background-color:;" class="text-center">{{$result->homeScore}}</td>
					<td style="width:10%; background-color:;" class="text-center">{{$result->awayScore}}</td>
					<td style="width:40%;">{{$result->fixture->team2->teamName}}</td>
				</tr>
			</table>
			</li>
			@endforeach
			@if(count($results) > 5)
			<center><a href="/result" class="btn btn-link">View More</a></center>
			@endif
			
		</ul>
	</div>

	<div class="card my-4">
		<a href="">
		<div class="card-body">
			<img src="/image/uba.jpg" style="width:100%; height:10em; image-rendering:pixelated;">
		</div>
		</a>
	</div>

	<div class="card my-4">
		<div class="card-header">
			<h4>Quick Link</h4>
		</div>
		<div class="card-body">
			<ul>
				<li>this is coming soon 4</li>
				<li>this is coming soon 3</li>
				<li>this is coming soon 2</li>
				<li>this is coming soon 1</li>
			</ul>
		</div>
	</div>

	<div class="card my-4">
		<a href="">
		<div class="card-body">
			<img src="/image/orange.jpg" style="width:100%; height:10em;">
		</div>
		</a>
	</div>

	<div class="card my-4">
		<div class="card-header">
			<h4>Quick Link</h4>
		</div>
		
		<div class="card-body">
			<ul>
				<li>this is coming soon 4</li>
				<li>this is coming soon 3</li>
				<li>this is coming soon 2</li>
				<li>this is coming soon 1</li>
			</ul>
		</div>
	</div>
	</div>

	<div class="col-sm-6 mt-5" >
		<div class="p-2" style="box-shadow:-1px 2px 4px 4px gray; min-height:500px;">
		@foreach($news as $new)
			<div class="card my-4" style="border-radius:5%;">
				<div class="card-header d-flex justify-content-left">
					<img src="{{asset('/storage/news/'.$new->newsType->image)}}" style="width:30px; height:30px; ">
					<p class="ml-3">{{$new->newsType->name}}</p>
				</div>

				<div class="card-body">
					<a href="/news/show/{{$new->id}}">
						<figure class="figure ">
						<div style="width:100%; height:14em;">
							<img src="{{asset('/storage/news/'.$new->picture)}}" style="width:100%; height:100%; image-rendering:pixelated; object-fit:fill;  object-position:center;" class="figure-img img-responsive img-fluid">
						</div>
						<figcaption class="figure-caption">
							<h3>{{$new->title}}</h3>
						</figcaption>
					</figure>
					</a>
				</div>
			</div>
		@endforeach
		</div>
	</div>

	<div class="col-sm-3">
		<div class="card my-4" style="border-radius:5%;">
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
			<h4 class="card-header">Hot headline</h4>
			<div class="card-body">
				<ul class="list-group">
					@foreach($news as $new)
					<li class="list-group-item"><a href="/news/show/{{$new->id}}">
						{{$new->title}}
					</a></li>
					@endforeach
				</ul>
			</div>
		</div>

		<div class="card my-4">
			<div class="card-body">
				<table style="font-size:1em; line-height:25px; width:100%; text-align:center;">
				<tr>
		          <th>#</th>
		          <th>Team</th>
		          <th>GP</th>
		          <th>W</th>
		          <th>L</th>
		          <th>D</th>
		          <th>PTS</th>
		        </tr>
		       	@for($i = 0; $i < count($tables); $i++)
		        <tr style="border:1px solid black;" class="reg{{$i + 1}}">
		          <td style="border:1px solid black;">{{$i + 1}}</td>
		          <td style="border:1px solid black;">{{$tables[$i]['team']->teamName}}</td>
		          <td style="border:1px solid black;">{{$tables[$i]['gamePlay']}}</td>
		          <td style="border:1px solid black;">{{$tables[$i]['win']}}</td>
		          <td style="border:1px solid black;">{{$tables[$i]['lose']}}</td>
		          <td style="border:1px solid black;">{{$tables[$i]['draw']}}</td>
		          <td style="border:1px solid black;">{{$tables[$i]['points']}}</td>
		        </tr>
		        @endfor
				</table>
			</div>	
		</div>
	</div>
</div>

@endsection

@section('rightContent')
<div>

	
</div>
<script type="text/javascript">
	
</script>
@endsection

