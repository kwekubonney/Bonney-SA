@extends('adminlte::page')

@section('title', 'LIB-SPORT')

@section('content_header')
<script type="text/javascript" src="{{asset('/js/jquery.js')}}"></script>
    <div class="d-flex justify-content-between">
      <h1>Teams</h1>
      <!-- <button class="btn btn-success" data-toggle="modal" data-target="#team" style="float:right;">NEW TEAM</button> -->
    </div>
@endsection 

@section('content')
    <div class="container-fluid">
    <p>To be figure out later</p>
  </div>

  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-9">
        <div>
          <table class="table table-striped">
            <tr>
              <th><span class="text-info"><i class="fas fa-sort-amount-down-alt"></i></span> &nbsp; NAME</th>
              <th><span class="text-info"><i class="fas fa-sort-amount-down-alt"></i></span> &nbsp; LEVEL</th>
              <th><span class="text-info"><i class="fas fa-sort-amount-down-alt"></i></span> &nbsp; STATUS</th>
              <th><span class="text-info"><i class="fas fa-sort-amount-down-alt"></i></span> &nbsp; ACTION</th>
            </tr>
            @foreach($teams as $team)
            @if(auth()->user()->kind == "staff")
            <tr>
              <td>{{$team->teamName}}</td>
              <td>{{$team->teamLevel}}</td>
              <td>{{$team->teamEmail}}</td>
              <td>
                <a href="/team/edit/{{$team->id}}" class="btn btn-primary">Edit</a>
                <a href="/teamdetail/{{$team->id}}" class="btn btn-success">Info</a>
              </td>
            </tr>
            @elseif(auth()->user()->kind == "teamRep")
              @switch($team->id)
                @case(auth()->user()->teamrep->team_id)
                  <tr>
                    <td>{{$team->teamName}}</td>
                    <td>{{$team->teamLevel}}</td>
                    <td>{{$team->teamEmail}}</td>
                    <td>
                      
                      <a href="/teamdetail/{{$team->id}}" class="btn btn-success">Info</a>
                    </td>
                  </tr>
                  @break

                
                @endswitch
            @else
              <tr>
              <td>{{$team->teamName}}</td>
              <td>{{$team->teamLevel}}</td>
              <td>{{$team->teamEmail}}</td>
              <td>
                <a href="/teamdetail/{{$team->id}}" class="btn btn-success">Info</a>
              </td>
            </tr>
            @endif
           @endforeach
          </table>
        </div>
      </div>


      <div class="col-sm-3">
       
      </div>
    </div>
  </div>


  <!-- 
	The creation of the new team modal section start from here!!!
   -->

   <!-- 	<div class="modal" id="team">
   		<div class="modal-dialog">
   			<div class="modal-content">
   				<div class="modal-header bg-danger">
   					<h5 class="modal-title text-center" id="exampleModalLongTitle">
   						<i>Add New <b>TEAM</b></i>
   					</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                    </button>
   				</div>

   				<div class="modal-body bg-primary">
   					<div class="p-2">
   						<form action="/team/store" method="post" enctype="multipart/form-data">
               
                @csrf

   							<div class="form-group">
                  <label class="text-light">Team Name</label>
   								<input type="text" name="teamName" placeholder="TEAM NAME" class="form-control">
   							</div>
                <div class="form-group">
                  <label class="text-light">Team Contact</label>
                  <input type="number" name="teamContact" class="form-control">
                </div>
                <div class="form-group">
                  <label class="text-light">Team Address</label>
                  <input type="text" name="teamAddress" class="form-control">
                </div>
                <div class="form-group">
                  <label class="text-light">Team Email</label>
                  <input type="email" name="teamEmail" class="form-control">
                </div>
   							
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label class="text-light">Team Level</label>
                      <select class="form-control" name="teamLevel">
                        <option value="First Division">First Division</option>
                        <option value="Second Division">Second Division</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label class="text-light">Team Image</label>
                      <input type="file" name="teamImage" >
                    </div>
                  </div>
                </div>
   							<center>
   								<div>
   									<input type="submit" value="SAVE" class="btn btn-danger btn-block btn-lg">
   								</div>
   							</center>
   						</form>
   					</div>
   				</div>
   			</div>
   		</div>
   	</div> -->

    <!--  -->

    <div class="modal" id="teamDetail">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title text-center" id="exampleModalLongTitle">
              <i>Add New <b>TEAM</b></i>
            </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
          </div>

          <div class="modal-body">
            <div id="teamName"></div>
          </div>
        </div>
      </div>
    </div>

  
  <script type="text/javascript">
    $(document).ready(function(){
      $(".teamDetail").click(function(){
        var attribute = $(this).attr('id');

        $.ajax({
          url: '/teamdetail/'+attribute,
          type: 'get',
          datatype: 'text',
          success: function(data){
            $('#teamName').text(data[0]);
          }

          })
        console.log(attribute);
      })
    })
  </script>
@endsection