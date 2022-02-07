@extends('layouts.pagesTemplate')


@section('mainContent')

		<div class="row">
			<div class="col-sm-9 ">
				<div class="col-sm-11 offset-sm-1 py-3 mt-2" style="background-color:#f1ffff">
					<div class="card">
						<div class="card-body">
							
							<div class="d-flex justify-content-between">
								<p>{{$news->user->press->firstName}} {{$news->user->press->lastName}}</p>
								<p>{{date("M d, Y", strtotime($news->created_at))}}</p>
							</div>
							<div style="width:100%; height:300px;">
								<img src="{{asset('/storage/news/'.$news->picture)}}" style="width:100%; height:100%;">
							</div>
							<h3>{{$news->title}}</h3>
							<div class="">
								<p>{!! $news->newsBody !!}</p>
							</div>
							
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-3 ">
				<div class="card my-5">
					<div class="card-header">
						<h3>Hot News</h3>
					</div>
					<div class="card-body" style="padding-bottom:0px;">
					@for($i=0; $i < count($newslists); $i++)

						@if($id == $newslists[$i]['id'])
							@continue

						@endif

						<a href="/news/show/{{$newslists[$i]['id']}}">
							<div class="row py-2" style="border-bottom:1px solid gray;">
									<div class="col-sm-4" style="height:70px;">
									<img src="{{asset('/storage/news/'.$newslists[$i]->picture)}}" style="width:100%; height:100%; margin:0px; padding:0px;">
									</div>
									<div class="col-sm-8" style="line-height:20px;">
										<p class="">{{$newslists[$i]->title}}</p>
									</div>
							</div>
						</a>

					@endfor
				
				</div>
				</div>
			</div>

		</div>

@endsection