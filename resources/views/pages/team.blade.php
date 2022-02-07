@extends('layouts.pagesTemplate')

@section('mainContent')

	<div class="row">
		<div class="col-sm-9">
			<div class="row">
				@foreach($teams as $team)
				
				<div class="col-sm-3 py-3">
					<a href="/team/page">
					<div class="card">
						<div class="card-header text-center bg-danger text-light">{{$team->teamName}}</div>
						<img src="{{asset('/storage/images/'.$team->teamPicture)}}" style="width:100%; height:200px; box-shadow:-1px 2px 3px 4px gray;">
						<div class="card-body">
							<p style="line-height:10px;">
								<span>{{$team->teamEmail}}</span>
							</p>
							<p style="line-height:10px;">
								<span>CONTACT</span> : <span>{{$team->teamContact}}</span>
							</p>
							<p style="line-height:10px;">
								<span>ADDRESS</span> : <span>{{$team->teamAddress}}</span>
							</p>
						</div>
						<div class="card-footer">
							This the footer, it consist of the team motto
						</div>
					</div>
					</a>
				</div>
				
				@endforeach
			</div>
		</div>
		<div class="col-sm-3 bg-primary"></div>
	</div>

@endsection