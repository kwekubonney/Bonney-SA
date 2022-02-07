<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<div class="row">
    <div class="col-sm-12">
        <table class="table table-striped">
        <div class="row bg-warning">
            <div class="col-sm-6">
                <h1 class="text-center">
                    {{$fixture->team1->teamName}}
                </h1>
            </div>
            <div class="col-sm-6">
                <h1 class="text-center">{{$fixture->team2->teamName}}</h1>
            </div>
        </div>
        @for($i=0; $i < count($game); $i++)
        @if($game[$i]->team_id == $game[$i]->fixture->homeTeam)
        <tr>
            <td style="width:10%;">{{$game[$i]->eventTime}}</td>
            <td style="width:35%;"><h4>{{$game[$i]->player->firstName}} {{$game[$i]->player->lastName}}</h4></td>
            @if($game[$i]->event == 'goal')
            <td style="width:10%;">
                <img src="{{asset('/image/goal.jpg')}}" style="width:70%;">
            </td>
            @elseif($game[$i]->event == 'redcard')
            <td style="width:10%;">
                <img src="{{asset('/image/red_card.jpg')}}" style="width:70%;">
            </td>
            @elseif($game[$i]->event == 'yellowcard')
            <td style="width:10%;">
                <img src="{{asset('/image/yellow_card.jpg')}}" style="width:70%;">
            </td>
            @endif
            <td style="width:10%;"></td>
            <td style="width:35%;"></td>
        </tr>
        @else
        <tr>
            <td style="width:10%;">{{$game[$i]->eventTime}}</td>
            <td style="width:35%;"></td>
            <td style="width:10%;"></td>
             @if($game[$i]->event == 'goal')
            <td style="width:10%;">
                <img src="{{asset('/image/goal.jpg')}}" style="width:70%;">
            </td>
            @elseif($game[$i]->event == 'redcard')
            <td style="width:10%;">
                <img src="{{asset('/image/red_card.jpg')}}" style="width:70%;">
            </td>
            @elseif($game[$i]->event == 'yellowcard')
            <td style="width:10%;">
                <img src="{{asset('/image/yellow_card.jpg')}}" style="width:70%;">
            </td>
            @endif
            <td style="width:35%;"><h4 style="float:right;">{{$game[$i]->player->firstName}} {{$game[$i]->player->lastName}}</h4></td>
        </tr>
        @endif
        @endfor
        </table>
    </div>
</div>
</body>
</html>