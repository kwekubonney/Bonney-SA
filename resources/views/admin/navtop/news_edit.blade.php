@extends('adminlte::page')

@section('title', 'LIB-SPORT')
<!-- <script type="text/javascript" src="{{asset('/js/jquery.js')}}"></script> -->
<script type="text/javascript" src="{{asset('/ckeditor/ckeditor.js')}}"></script>
@section('content_header')
	<h3>News/Edit</h3>
@endsection

@section('content')
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-8">
				<form class="" action="/news/edit/{{$news->id}}" method="post" enctype="multipart/form-data">
					@csrf
						<div class="form-group">
							<label class="text-danger">Title</label>
							<input type="text" name="title" placeholder="News Title" value="This is the first title" class="form-control">
						</div>
						<div class="form-group">
							<label class="text-danger">News Body</label>
							<textarea class="ckeditor form-control" name="editor" rows="6">{{$news->newsBody}}</textarea>
						</div>
						<div class="form-group">
							<label class="text-danger">Picture</label>
							<input type="file" value="{{$news->picture}}" name="newsImage">
						</div>
						<div class="form-group">
							<input type="submit" value="Save" class="btn btn-success btn-lg btn-block">
						</div>
					</form>
			</div>

			<div class="col-sm-4">
				<div class="p-2 bg-dark" style="width:350px; height:200px; border:2px solid gray;">
					<img src="{{asset('/storage/news/'.$news->picture)}}" style="width:100%; height:100%;">
				</div>
			</div>
		</div>
	</div>
@endsection