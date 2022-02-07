<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fixture;
use App\Player;
use App\Teamsquart;
use App\Result;
use App\GameStatistic;
use App\lTable;

class gameController extends Controller
{
    //
    public function index(){
    	$fixtures = Fixture::where('isPlay', '=', 'No')->orderBy('gameDate')->get();
        $result = Result::all();
        //dd($results);
    	return view('admin.game', ['result' => $result, 'fixtures' => $fixtures]);
    }

    public function result($id){
    	return view('admin.setting.result');
    }

    public function gamecover($id){
    	$fixture = Fixture::find($id);
    	$homes = Teamsquart::where('team_id', '=', $fixture->homeTeam)->where('fixture_id', '=', $fixture->id)->get();
    	$aways = Teamsquart::where('team_id', '=', $fixture->awayTeam)->where('fixture_id', '=', $fixture->id)->get();

    	return view('admin.gameCover', ['fixture'=>$fixture, 'homes'=>$homes, 'aways'=>$aways]);
    }

    public function resultCreate(Request $request){
        $result = new Result();
        $result->fixture_id = $request->fixture;
        $result->homeScore = $request->homeTeam;
        $result->awayScore = $request->awayTeam;
        $result->status = $request->status;
        $result->save();
        return 'Fixture inputed';
    }

    // 



    public function gameStatistic(Request $request){
        $statistic = new GameStatistic();
        $statistic->fixture_id = $request->fixture;
        $statistic->team_id = $request->team;
        $statistic->player_id = $request->player;
        $statistic->event = $request->event;
        $statistic->eventTime = $request->eventTime;
        $statistic->save();

        if($request->event == 'goal'){
            $result = Result::where('fixture_id', '=', $request->fixture)->first();
            $score = $request->score;
            $oldScore = $result->$score;
            $newScore = $oldScore + 1;
            $result->$score = $newScore;

            // dd($result);
            $result->save();
        }
        return "Well done";
    }

    public function gameDetail($id){
        $fixture = Fixture::find($id);
        $game = Gamestatistic::where('fixture_id', '=', $id)->get();
      //  dd($game->fixture_id);
        return view('admin.setting.game_satis', ['game' => $game, 'fixture' => $fixture]);
    }

    public function resultDetail($id){
        $fixture = Fixture::find($id);
        $game = Gamestatistic::where('fixture_id', '=', $id)->get();
        return view('pages.resultDetail', ['game' => $game, 'fixture' => $fixture]);
    }

    public function halfTime(Request $request){
        $result = Result::where('fixture_id', '=', $request->fixture)->first();
        $result->status = $request->status;
        $result->save();

        return 'good';   
    }

    public function matchend(Request $request, $id){
        //dd($id);
        $result = Result::where('fixture_id', '=', $id)->first();
        $result->status = 'FT';
        $result->save();

        $team = Fixture::find($id);
        $team->isPlay = 'Yes';
        $team->save();
        $team1 = $team->homeTeam;
        $team2 = $team->awayTeam;

        $tableTeam1 = lTable::where('team_id', '=', $team1)->first();
        $team1Win = $tableTeam1->win; 
        $team1Draw = $tableTeam1->draw;
        $team1Lost = $tableTeam1->lost;
        $team1Point = $tableTeam1->points;
        $team1Gameplay = $tableTeam1->gamePlay;

        $tableTeam2 = lTable::where('team_id', '=', $team2)->first();
        $team2Win = $tableTeam2->win; 
        $team2Draw = $tableTeam2->draw;
        $team2Lost = $tableTeam2->lost;
        $team2Point = $tableTeam2->points;
        $team2Gameplay = $tableTeam2->gamePlay;

        if($result->homeScore > $result->awayScore){

           $hometeamTable = lTable::find($team1);
           $hometeamTable->gamePlay = $team1Gameplay + 1;
           $hometeamTable->win =  $team1Win + 1;
           $hometeamTable->points =  $team1Point + 3;
           $hometeamTable->save();

           $awayteamTable = lTable::find($team2);
           $awayteamTable->gamePlay = $team2Gameplay + 1;
           $awayteamTable->lost =  $team2Lost + 1;
           $awayteamTable->save();

        }
        elseif($result->homeScore < $result->awayScore){
           $hometeamTable = lTable::find($team1);
           $hometeamTable->gamePlay = $team1Gameplay + 1;
           $hometeamTable->lost =  $team1Lost + 1;
           $hometeamTable->save();

           $awayteamTable = lTable::find($team2);
           $awayteamTable->gamePlay = $team2Gameplay + 1;
           $awayteamTable->win =  $team2Win + 1;
           $awayteamTable->points = $team2Point + 3;
           $awayteamTable->save();
        }
        elseif($result->homeScore == $result->awayScore){
          $hometeamTable = lTable::find($team1);
           $hometeamTable->gamePlay = $team1Gameplay + 1;
           $hometeamTable->draw =  $team1Draw + 1;
           $hometeamTable->points = $team1Point + 1;
           $hometeamTable->save();

           $awayteamTable = lTable::find($team2);
           $awayteamTable->gamePlay = $team2Gameplay + 1;
           $awayteamTable->draw =  $team2Draw + 1;
           $awayteamTable->points = $team2Point + 1;
           $awayteamTable->save();
        }
        return redirect('/dashboard');
    }
}
