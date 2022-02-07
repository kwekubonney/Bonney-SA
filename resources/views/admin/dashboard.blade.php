@extends('adminlte::page')

@section('title', 'LIB-SPORT')

@section('content_header')
    <h1>Dashboard</h1>
@endsection 

@section('content')
    <div class="container-fluid">
	<div class="row">
            
       <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info" style="height:150px;">
              <div class="inner">
                <h2>Stadium</h2>
                <h3>{{$venue}}</h3>
              </div>
              <div class="icon">
                <i class="fas fa-hotel"></i>
              </div>
            </div>
          </div>

          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success" style="height:150px;">
              <div class="inner">
                <h2>PLAYERS</h2>
                  <h3>{{$player}}</h3>
              </div>
              <div class="icon">
                <i class="far fa-2x fa-futbol"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
         <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning" style="height:150px;">
              <div class="inner text-light">
                <h2>TEAMS</h2>
                  <h3>{{count($teams)}}</h3>
              </div>
              <div class="icon">
                <i class="fas fa-users"></i>
              </div>
              
            </div>
         </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger" style="height:150px;">
              <div class="inner">
               <h2>GAMES</h2>
                  <h3>{{$result}}</h3>
              </div>
              <div class="icon">
                <i class="fas fa-2x fa-gamepad"></i>
              </div>
            </div>
    	</div>
	</div>
  <hr>
  <div class="row">
    <div class="col-sm-7">
      <table class="table table-striped" style="max-height:500px; overflow:auto;">
        <tr class="bg-dark">
          <th>#</th>
          <th>Team</th>
          <th>G Play</th>
          <th>win</th>
          <th>Lost</th>
          <th>Draw</th>
          <th>Point</th>
        </tr>
        @for($i=0; $i < count($tables); $i++)
        <tr>
          <td>{{$i + 1}}</td>
          <td>{{$tables[$i]->team->teamName}}</td>
          <td>{{$tables[$i]['gamePlay']}}</td>
          <td>{{$tables[$i]['win']}}</td>
          <td>{{$tables[$i]['lost']}}</td>
          <td>{{$tables[$i]['draw']}}</td>
          <td>{{$tables[$i]['points']}}</td>
        </tr>
        @endfor
      </table>

      <div class="row">
        @foreach($news as $new)
        <div class="col-sm-3" style=" box-shadow:-1px 1px 2px 2px red;">
          <figure class="figure">
            <img src="{{asset('/storage/news/'.$new->picture)}}" class="figure-img" style="width:100%; height:120px; padding:2px;">
            <figcaption>{{$new->title}}</figcaption>
          </figure>
        </div>
        @endforeach
      </div>
    </div>

    <div class="col-sm-4 offset-sm-1">
      <!-- result  -->
      <div class="card" style="max-height:400px; box-shadow:-1px 2px 4px red;">
          <div class="card-header text-center">
            GAME RESULTS
          </div>
          <div class="card-body">
            <table class="table table-striped text-center">
              <tr class="bg-dark">
                <th>Home Team</th>
                <th></th>
                <th></th>
                <th>Away Team</th>
                <th></th>
              </tr>
              @foreach($gameResult as $result)
              <tr>
                <td>{{$result->fixture->team1->teamName}}</td> 
                <td>{{$result->homeScore}}</td> 
                <td>{{$result->awayScore}}</td>
                <td>{{$result->fixture->team2->teamName}}</td>
                <td>
                  <a href="/game/detail/{{$result->fixture_id}}" class="btn btn-success btn-sm">View</a>
                </td>
              </tr>
              @endforeach
              
            </table>
          </div>
        </div>

      <!-- list of team -->
      
      <ul class="list-group mb-5" style="height:400px; overflow:auto; margin-top:50px;">
        <li class="text-center bg-danger" style="font-size:40px;">List of Team</li>
        @foreach($teams as $team)
        <li class="list-group-item d-flex ">
          <div class="col-sm-3" style="width:80px; height:40px;"><img src="{{asset('storage/images/'.$team->teamPicture)}}" style="width:100%; height:100%;"></div>
          <div class="col-sm-9"><h5>{{$team->teamName}}</h5></div> 
        </li>
        @endforeach
      </ul>
    </div>
  </div>
</div>
@endsection








