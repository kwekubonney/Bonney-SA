
@extends('adminlte::page')

@section('title', 'LIB-SPORT')

@section('content_header')
	<h3>Result/Detail</h3>
@endsection

@section('content')
	<div class="container-fluid">
		<table class="table table-striped">
			<tr>
				<th></th>
				<th>Home Team</th>
				<th></th>
				<th>Away Team</th>
				<th></th>
			</tr>
			<tr>
				<td>26"</td>
				<td>Dominic Bonney</td>
				<td>yellow</td>
				<td></td>
				<td>
					<button class="btn btn-primary">Edit</button>
				</td>
			</tr>
			<tr>
				<td>26"</td>
				<td></td>
				<td>Red</td>
				<td>Dominic Bonney</td>
				<td>
					<button class="btn btn-primary">Edit</button>
				</td>
			</tr>
			<tr>
				<td>26"</td>
				<td>Dominic Bonney</td>
				<td>Goal</td>
				<td></td>
				<td>
					<button class="btn btn-primary">Edit</button>
				</td>
			</tr>
			<tr>
				<td>26"</td>
				<td></td>
				<td>Goal</td>
				<td>Dominic Bonney</td>
				<td>
					<button class="btn btn-primary">Edit</button>
				</td>
			</tr>
		</table>
	</div>
@endsection