@extends('adminlte::page')

@section('title', 'LIB-SPORT')
<!-- <script type="text/javascript" src="{{asset('/js/jquery.js')}}"></script> -->
<script type="text/javascript" src="{{asset('/ckeditor/ckeditor.js')}}"></script>
@section('content_header')
	<h3>News</h3>
@endsection

@section('content')
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-8 p-3">
				<div class="card-header text-center bg-secondary"><h2>NEWS FORM</h2></div>
				<div class="card-body" style="border:1px solid black; padding-bottom:0px;">
					<form class="" action="/news/create" method="post" enctype="multipart/form-data">
						@csrf
						<div class="form-group">
							<label class="text-danger">Title</label>
							<input type="text" name="title" placeholder="News Title" class="form-control">
						</div>
						<div class="form-group">
							<label class="text-danger">Type</label>
							<select class="form-control" name="type">
								@foreach($newsType as $type)
								<option value="{{$type->id}}">{{$type->name}}</option>
								@endforeach
							</select>
						</div>
						<div class="form-group">
							<label class="text-danger">News Body</label>
							<textarea class="ckeditor form-control" name="editor" rows="6"></textarea>
						</div>
						<div class="form-group">
							<label class="text-danger">Picture</label>
							<input type="file" name="pic">
						</div>
						<input type="hidden" name="user" value="{{$user}}">
						<div class="form-group">
							<input type="submit" value="Save" class="btn btn-success btn-lg btn-block">
						</div>
					</form>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="card">
					<div class="card-header bg-warning">
						<h3 class="text-center">News Lists</h3>
					</div>
					<div class="card-body">
						<ul class="list-group">
							@foreach($news as $new)
							<li class="list-group-item">
								<a href="/news/edit/{{$new->id}}"><p>{!!$new->title!!}</p></a>
							</li>
							@endforeach
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection