<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;
use App\Player;
use App\User;
use App\Venue;
use App\Fixture;
use App\NewsType;
use App\Teamsquart;

class AdminController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function index(Request $request)
    {
        return view('admin');
    }

    public function players(){
    	$teams = Team::all();//->order('teamName', 'Desc');
    	$players = Player::all();
    	return view('admin.navtop.player', ['teams' => $teams, 'players' => $players]);
    }

    public function storePlayer(Request $request){
        $pictureName = $request->picture->getClientOriginalName();
    	$player = new Player();
    	$player->firstName = $request->input('firstName');
    	$player->lastName = $request->input('lastName');
    	$player->position = $request->input('position');
    	$player->dob = $request->input('dob');
    	$player->team_id = $request->input('team');
        $player->image = $pictureName;
        $request->picture->storeAs('players', $pictureName, 'public');
    	$player->save();

    	return redirect()->back();
    }

    public function user(){
        $venue = Venue::all();
        $team = Team::all();
        $fixtures = Fixture::where('status', '=', 'open')->get();
    	return view('admin.setting.config', ['venues'=>$venue, 'teams'=>$team, 'fixtures'=>$fixtures]);
    }

    public function appuser(){
        $users = User::all();
    	return view('admin.setting.appuser')->with('users', $users);
    }

    public function venue(Request $request){
        $fileName = $request->pic->getClientOriginalName();
        $venue = new Venue();
        $venue->name = $request->input('venueName');
        $venue->location = $request->input('location');
        $venue->isActive = $request->input('active');
        $venue->image = $fileName;
        $request->pic->storeAs('stadium', $fileName, 'public');
        $venue->save();
        return redirect()->back();
    }

    public function fixture(Request $request){
       if($request->input('homeTeam') == $request->input('awayTeam')){
            dd('fail');
       }else{
        $fixture = new Fixture();
            $fixture->homeTeam = $request->input('homeTeam');
            $fixture->awayTeam =  $request->input('awayTeam');
            $fixture->venue_id =  $request->input('gameVenue');
            $fixture->gameDate =  $request->input('gameDate');
            $fixture->gameTime =  $request->input('gameTime');
            $fixture->save();

            return redirect()->back();
       }
    }

    public function fixtureEdit($id){
        $teams = Team::all();
        $venues = Venue::all();
        $users = User::where('kind', '=', 'agent')->get();
        $fixtures = Fixture::find($id);
        return view('admin.setting.fixture_edit', ['teams'=>$teams, 'fixtures'=>$fixtures, 'venues'=>$venues, 'users'=>$users]);
    }

    public function newsType(Request $request){
        $pic = $request->pic->getClientOriginalName();
        $newsType = new NewsType();
        $newsType->name = $request->input('name');
        $newsType->image = $pic;
        $request->pic->storeAs('news', $pic, 'public');
        $newsType->save();
        return redirect()->back();

    }

    public function fixtureDetail($id){
        $fixturesId = Fixture::find($id);
        //dd($fixturesId);
        $fixtureDetails = Teamsquart::where('fixture_id', '=', $id)->get();
        // dd($fixtureDetails);
       return view('pages.fixture_detail', ['fixtureDetails'=>$fixtureDetails, 'fixtureId'=>$fixturesId]);
    }
}


