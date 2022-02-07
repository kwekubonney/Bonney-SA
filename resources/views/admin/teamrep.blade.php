
@extends('adminlte::page')

@section('title', 'LIB-SPORT')

@section('content_header')
    <div class="d-flex justify-content-between">
    	<h1>Team Representative</h1>
    	<a href="" class="btn btn-danger btn-sm text-light">Close</a>
    </div>
@endsection 
	
@section('content')
<div class="contaniner-fluid">
	
	<hr>
	<div style="width:80px; height:60px;" class="bg-danger ml-4 mt-4">
		<img src="{{asset('storage/images/'.$teamId->teamPicture)}}" style="width:100%; height:100%; border-radius:50%;">
	</div>
	<hr>

	<!-- 
		CREATING A USER THAT WILL BE SERVE AS A TEAM REPRESENTATIVE
	 -->

	<div class=" px-5 mt-2">
		<form action="/teamRep/create" method="post" class="">
			@csrf

			<div class="row form-group">
				<div class="col-sm-6">
					<label class="text-danger">First Name</label>
					<input type="text" name="firstName" value="{{ old('firstName') }}" class="form-control" required>
				</div>
				<div class="col-sm-6">
					<label class="text-danger">Last Name</label>
					<input type="text" name="lastName" value="{{ old('lastName') }}" class="form-control" required>
				</div>
			</div>

			<div class="row form-group">
				<div class="col-sm-4">
					<label class="text-danger">Primary Contact</label>
					<input type="number" name="primaryContact" value="{{ old('primaryContact') }}" class="form-control" require>
				</div>
				<div class="col-sm-4">
					<label class="text-danger">Secondary Contact</label>
					<input type="number" name="secondaryContact" value="{{ old('secondaryContact') }}" class="form-control" require>
				</div>
				<div class="col-sm-4">
					<label class="text-danger">Email</label>
					<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
				</div>
			</div>

			<div class="row form-group">
				<div class="col-sm-6">
					<label class="text-danger">Password</label>
					<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
				</div>
				<div class="col-sm-6">
					<label class="text-danger">Comfire Password</label>
					 <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
				</div>
			</div>

			<div class="row form-group">
				<div class="col-sm-6">
					<label class="text-danger">User Name</label>
					 <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $teamId->teamName }}" required autocomplete="name" >
				</div>
				<div class="col-sm-6">
					<label class="text-danger">isActive</label>
					<select class="form-control" name="isActive">
						<option>-- Choose State --</option>
						<option class="1">Active</option>
						<option class="0">Not Active</option>
					</select>
				</div>
			</div>
			<!-- 
				HIDDEN FIELDS
			 -->

			 <div>
			 	<input type="hidden" name="kind" value="teamRep">
			 	<input type="hidden" name="teamId" value="{{$teamId->id}}">
			 </div>

			<div class="form-group">
				 <input type="submit" value="SAVE" class="btn btn-success">
			</div>


		</form>
	</div>
</div>


@endsection