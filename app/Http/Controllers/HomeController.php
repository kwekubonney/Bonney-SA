<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;
use App\Player;
use App\Venue;
use App\Team;
use App\Result;
use App\News;
use App\Fixture;
use App\NewsType;
use App\lTable;
use DB;



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function admin(){
        return view('admin');
    }


   

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $players = count(Player::all());
        $venues = count(Venue::all());
        $teams = Team::all();
        $results = count(Result::all());
        $gameResult = Result::all();
        $news = News::all();
        //$count = count($players);
       //dd($teams);
        $tables = lTable::select('team_id', 'win', 'lost', 'draw', 'points', 'gamePlay')->orderBy('points', 'Desc')->get();
        //dd($table);
        return view('admin.dashboard', ['player'=>$players, 'venue'=>$venues, 'teams'=>$teams, 'result'=>$results, 'tables'=>$tables, 'gameResult'=>$gameResult, 'news'=>$news]);
    }

    public function homePage(){
        $fixtures = Fixture::where('isPlay', '=', 'No')->orderBy('gameDate')->take(5)->get();
        $result = Result::select('id', 'fixture_id', 'homeScore', 'awayScore', 'status', 'created_at')->orderBy('created_at')->take(5)->get();
        $news = News::all();
        $table = lTable::select('team_id', 'win', 'lost', 'draw', 'points', 'gamePlay')->orderBy('points', 'Desc')->get();
         return view('index', ['fixtures'=>$fixtures, 'results'=>$result, 'tables'=>$table, 'news'=>$news]);
    }

    public function news(){
        $user = auth()->user()->id;
        $news = News::all();
        $newsType = NewsType::all();
        return view('admin.navtop.news', ['user'=>$user, 'newsType'=>$newsType, 'news'=>$news]);
    }

    public function newsEdit($id){
        $news = News::find($id);
        return view('admin.navtop.news_edit', ['news'=>$news]);
    }

    public function newsStore(Request $request){
        $news = new News();

        $fileName = $request->pic->getClientOriginalName();

        $news->user_id = $request->input('user');
        $news->newsBody = $request->input('editor');
        $news->title = $request->input('title');
        $news->news_type_id = $request->input('type');
        $news->picture = $fileName;
        $news->save();

        $request->pic->storeAs('news', $fileName, 'public');
        // $news->title = $request->input('');

        return redirect()->back();
               //redirect()->back()
    }

    public function newsUpdate(Request $request, $id){
        $news = News::find($id);
        if($request->newsImage){
        $fileName = $request->newsImage->getClientOriginalName();
        $news->newsBody = $request->input('editor');
        $news->picture = $fileName;
        // dd($fileName);
        $news->save();
        $request->newsImage->storeAs('news', $fileName, 'public');
    }else{
        $news->newsBody = $request->input('editor');
        $news->save();
    }
    return redirect()->back();
    }

    // public function result(){
    //     $results = Result::all();
    //     return view()
    // }
}
