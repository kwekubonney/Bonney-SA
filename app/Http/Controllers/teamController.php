<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use App\Team;
use App\User;
use App\Player;
use App\Teamrep;
use App\Fixture;
use App\TeamSquart;
use App\lTable;

class teamController extends Controller
{
    //
    // public function __construct(){
    // 	$this->middleware('auth');
    // }
//*** The below method show and display the team page ***//
    public function index(){
        $teams = Team::all();
    	return view('admin.team')->with('teams', $teams);
    }

    public function store(Request $request){
    	$team = new Team();

    	$request->validate([
            "teamName" => "required|max:255",
            "teamAddress" => "required",
            "teamContact" => "required",
            "teamEmail" => "required",
            "teamLevel" => "required",
            "commonName" => "required",
        ]);

    	$fileName = $request->teamImage->getClientOriginalName();  
    	$request->teamImage->storeAs('images', $fileName, 'public');

    	$team->teamName = $request->input('teamName');
    	$team->teamAddress = $request->input('teamAddress');
    	$team->teamContact = $request->input('teamContact');
    	$team->teamEmail = $request->input('teamEmail');
    	$team->teamLevel = $request->input('teamLevel');
        $team->commonName = $request->input('commonName');
    	$team->teamPicture = $fileName;
    	$team->save();

        $teamRep = Team::where('teamName', $request->input('teamName'))->get();
        foreach ($teamRep as $key) {
            
            $teamKey = $key->id;
        }

        // insert created team into leaque table

        $ltable = new lTable();
        $ltable->team_id = $teamKey;
        $ltable->gamePlay = 0;
        $ltable->win = 0;
        $ltable->lost = 0;
        $ltable->draw = 0;
        $ltable->points = 0;
        $ltable->save();


        return redirect('/teamRep/'.$teamKey);
    	
    }

    /*
        INSERTING RECORD IN BOTH THE USER AND THE TEAMREP TABLE
    */ 
        public function createTeamrep(Request $request){
            $test = $request->input();
            //dd($test);
            $users = new User();
            $users->email = $request->input('email');
            $users->name = $request->input('name');
            $users->kind = $request->input('kind');
           // dd($users);
            $users->password =  Hash::make($request->input('password'));
            $users->save();


            // 

            $userId = User::where('email', $request->input('email'))->get();
            foreach($userId as $id){
                $uId = $id->id;
            }

            // Filling the teamrep table

            $rep = new Teamrep();
                $rep->team_id = $request->input('teamId');
                $rep->user_id = $uId;
                $rep->firstName = $request->input('firstName');
                $rep->lastName = $request->input('lastName');
                $rep->contact1 = $request->input('primaryContact');
                $rep->contact2 = $request->input('secondaryContact');
                $rep->email = $request->input('email');
               // dd($rep);
                $rep->save();

                return redirect('/team');

            
        }


    public function teamRep($id){
        //$rep = $id;
        $repTeam = Team::find($id);
        return view('admin.teamrep')->with('teamId', $repTeam);
    }

    public function edit($id){
        $editTeam = Team::find($id);
        return view('admin.team_edit')->with('editteam', $editTeam);
    }


    public function update(Request $request, $id){
        $team = Team::find($id);
        $team->teamName = $request->input('teamName');
        $team->teamLevel = $request->input('teamLevel');
        $team->teamEmail = $request->input('teamEmail');
        $team->teamContact = $request->input('teamContact');
        $team->teamAddress = $request->input('teamAddress');
        $team->save();

        return redirect()->back();
    }

    function changeLogo(Request $request, $id){
        $team = Team::find($id);

        $fileName = $request->teamImage->getClientOriginalName();
        $team->teamPicture = $fileName;
        $team->save();
        $request->teamImage->storeAs('images', $fileName, 'public');

        return redirect()->back();
    }

    public function teamDetail($id){
        $team = Team::find($id);
        $players = Player::where('team_id', '=', $id)->get();
        $fixtures = Fixture::where('homeTeam', '=', $id)->orWhere('awayTeam', '=', $id)->get();
        //dd($players);
       return view('admin.team_detail', ['team'=>$team, 'players'=>$players, 'fixtures'=>$fixtures]);
    }
    // 

    public function squartCreate($id){
        $user = auth()->user()->teamrep->team_id;
        // dd($user);
        $fixture = Fixture::find($id);
        // $home = $fixture->homeTeam;
        // $away = $fixture->awayTeam;

        $teamPlayers = Player::where('team_id', '=', $user)->get();
        // $awayTeamPlayers = Player::where('team_id', '=', $away)->get();

        return view('admin.setting.teamSquart', ['teamPlayers'=>$teamPlayers, 'fixture'=>$fixture, 'teamId'=>$user]);
        return redirect('/game');
    }

    public function squartStore(Request $request){
        $player =  $request->input('players');
        
        // dd($player[0]);

        for($i=0; $i<count($player); $i++){
           
            $tSquart = new Teamsquart();
            $tSquart->team_id = $request->input('teamId');
            $tSquart->player_id = $player[$i];
            $tSquart->fixture_id = $request->input('fixtureId');
            $tSquart->state = 'true';
            $tSquart->save();
        }
        //dd($player);
        return redirect('/game');
        
    }

    public function social(){
        return view('social.teamPage');
    }
}
