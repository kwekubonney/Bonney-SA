@extends('adminlte::page')

@section('title', 'LIB-SPORT')

@section('content_header')
	<div class="d-flex justify-content-between">
      <h1>Setting/User</h1>
     <!--  <button class="btn btn-success" data-toggle="modal" data-target="#team" style="float:right;">NEW TEAM</button> -->
    </div>
@endsection

@section('content')

	<div class="container-fluid">

		<div class="row">
			<div class="col-sm-8">
				<ul class="nav nav-tabs w-100">
					<li class="nav-item w-25">
						<a href="#press" data-toggle="tab" class="nav-link active">Press</a>
					</li>
					<li class="nav-item w-25">
						<a href="#staff" data-toggle="tab" class="nav-link ">Staff</a>
					</li>
					<li class="nav-item w-25">
						<a href="#agent" data-toggle="tab" class="nav-link ">Agent</a>
					</li>
					<li class="nav-item w-25">
						<a href="#user" data-toggle="tab" class="nav-link ">User</a>
					</li>
				</ul>

				<div class="tab-content">
					<div class="tab-pane fade show active" id="press" role="tabpanel">
						<div class="card">
							<div class="card-header text-center">
								<h2>ADD NEW PRESS</h2>
							</div>
							<div class="card-body">
								<form action="/press/create" method="post" enctype="multipart/form-data">
									@csrf
									<div class="row">
										<div class="col-sm-6">
											<div class="form-group">
												<label class="text-danger">First Name</label>
												<input type="text" name="firstName" class="form-control">
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<label class="text-danger">Last Name</label>
												<input type="text" name="lastName" class="form-control">
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-sm-4">
											<div class="form-group">
												<label class="text-danger">Entity</label>
												<input type="text" name="entity" class="form-control">
											</div>
										</div>
										<div class="col-sm-4">
											<div class="form-group">
												<label class="text-danger">Email</label>
												<input type="email" name="email" class="form-control">
											</div>
										</div>
										<div class="col-sm-4">
											<div class="form-group">
												<label class="text-danger">Contact</label>
												<input type="nummber" name="contact" class="form-control">
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-sm-4">
											<div class="form-group">
												<label class="text-danger">Address</label>
												<input type="text" name="address" class="form-control">
											</div>
										</div>
										<div class="col-sm-4">
											<div class="form-group">
												<label class="text-danger">User Name</label>
												<input type="text" name="name" class="form-control">
												<input type="hidden" name="kind" value="press">
											</div>
										</div>
										<div class="col-sm-12">
											<div class="form-group">
												<input type="submit" name="SAVE" class="btn btn-success btn-block btn-lg">
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
					<!-- end of press -->

					<div class="tab-pane fade  " id="staff" role="tabpanel">
						<div class="card">
							<div class="card-header text-center">
								<h2>ADD NEW STAFF</h2>
							</div>
							<div class="card-body">
								<form action="/staff/create" method="post" enctype="multipart/form-data">
									@csrf
									<div class="row">
										<div class="col-sm-6">
											<div class="form-group">
												<label class="text-danger">First Name</label>
												<input type="text" name="firstName" class="form-control">
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<label class="text-danger">Last Name</label>
												<input type="text" name="lastName" class="form-control">
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-sm-4">
											<div class="form-group">
												<label class="text-danger">Position</label>
												<input type="text" name="position" class="form-control">
											</div>
										</div>
										<div class="col-sm-4">
											<div class="form-group">
												<label class="text-danger">Email</label>
												<input type="email" name="email" class="form-control">
											</div>
										</div>
										<div class="col-sm-4">
											<div class="form-group">
												<label class="text-danger">Contact</label>
												<input type="nummber" name="contact" class="form-control">
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-sm-4">
											<div class="form-group">
												<label class="text-danger">Address</label>
												<input type="text" name="address" class="form-control">
											</div>
										</div>
										<div class="col-sm-4">
											<div class="form-group">
												<label class="text-danger">Date of Birth</label>
												<input type="date" name="dob" class="form-control">
											</div>
										</div>
										<div class="col-sm-4">
											<div class="form-group">
												<label class="text-danger">User Name</label>
												<input type="text" name="name" class="form-control">
											</div>
											<div class="form-group">
												<input type="hidden" name="kind" value="staff">
											</div>
										</div>
										<div class="col-sm-12">
											<div class="form-group">
												<input type="submit" name="SAVE" class="btn btn-success btn-block btn-lg">
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>

					<!--   end of staff -->

					<div class="tab-pane fade  " id="agent" role="tabpanel">
						<div class="card">
							<div class="card-header text-center">
								<h2>ADD NEW AGENT</h2>
							</div>
							<div class="card-body">
								<form action="/agent/create" method="post" enctype="multipart/form-data">

									@csrf

									<div class="row">
										<div class="col-sm-6">
											<div class="form-group">
												<label class="text-danger">First Name</label>
												<input type="text" name="firstName" class="form-control">
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<label class="text-danger">First Name</label>
												<input type="text" name="lastName" class="form-control">
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-sm-4">
											<div class="form-group">
												<label class="text-danger">Email</label>
												<input type="email" name="email" class="form-control">
											</div>
										</div>
										<div class="col-sm-4">
											<div class="form-group">
												<label class="text-danger">Contact</label>
												<input type="nummber" name="contact" class="form-control">
											</div>
										</div>
										<div class="col-sm-4">
											<div class="form-group">
												<label class="text-danger">Date of Birth</label>
												<input type="date" name="dob" class="form-control">
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-sm-4">
											<div class="form-group">
												<label class="text-danger">User Name</label>
												<input type="text" name="name" class="form-control">
											</div>
										</div>
										<div class="col-sm-4">
											<div class="form-group">
												<label class="text-danger">Address</label>
												<input type="text" name="address" class="form-control">
											</div>
										</div>
										<div class="col-sm-4">
											<div class="form-group">
												<input type="hidden" name="kind" value="agent">
											</div>
										</div>
										<div class="col-sm-12">
											<div class="form-group">
												<input type="submit" name="SAVE" class="btn btn-success btn-block btn-lg">
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>

					<!--   end of agent -->

					<div class="tab-pane fade" id="user" role="tab-panel">
						<div class="card">
							<div class="card-header text-center">
								<h2>ADD NEW USER</h2>
							</div>
							<div class="card-body">
								<form action="" method="post" enctype="multipart/form-data">
									<div class="row">
										<div class="col-sm-6">
											<div class="form-group">
												<label class="text-danger">First Name</label>
												<input type="text" name="firstName" class="form-control">
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<label class="text-danger">First Name</label>
												<input type="text" name="firstName" class="form-control">
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-sm-4">
											<div class="form-group">
												<label class="text-danger">Email</label>
												<input type="email" name="email" class="form-control">
											</div>
										</div>
										<div class="col-sm-4">
											<div class="form-group">
												<label class="text-danger">Contact</label>
												<input type="nummber" name="entity" class="form-control">
											</div>
										</div>
										<div class="col-sm-4">
											<div class="form-group">
												<label class="text-danger">Date of Birth</label>
												<input type="date" name="dob" class="form-control">
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-sm-4">
											<div class="form-group">
												<label class="text-danger">Address</label>
												<input type="text" name="address" class="form-control">
											</div>
										</div>
										<div class="col-sm-4">
											<div class="form-group">
												<label class="text-danger">image</label>
												<input type="file" name="image" class="form-control">
											</div>
										</div>
										<div class="col-sm-12">
											<div class="form-group">
												<input type="submit" name="SAVE" class="btn btn-success btn-block btn-lg">
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>

					<!--   end of user -->
				</div>
			</div>

			<div class="col-sm-4">
				<!-- <div class="card-body"> -->
					<table class="table table-striped table-sm table-hover w-100">
						<tr class="bg-danger">
							<th>Name</th>
							<!-- <th>Email</th> -->
							<th>Type</th>
							<th>Action</th>
						</tr>

						@foreach($users as $user)
						<tr>
							<td>{{$user->name}}</td>
							<td>{{$user->kind}}</td>
							<td>
								<a href="" class="btn btn-warning btn-sm">
									<i class="far fa-eye"></i>
								</a>
							</td>
						</tr>
						@endforeach

						
					</table>
				</div>
			<!-- </div> -->
		</div>


		</div>
		</div>

		
	</div>

@endsection


