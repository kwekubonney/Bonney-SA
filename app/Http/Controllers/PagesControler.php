<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\lTable;
use App\Fixture;
use App\News;
use App\Result;
use App\Team;
use App\User;

class PagesControler extends Controller
{
    //

    public function fixture(){
        $news = News::all();
        $fixtures = Fixture::where('isPlay', '=', 'No')->orderBy('gameDate')->get();
        return view('pages.fixture', ['fixtures'=>$fixtures, 'news'=>$news]);
    }
    //

    public function result(){
        $results = Result::all();
        $news = News::all();
        return view('pages.result', ['results'=>$results, 'news'=>$news]);
    }
    //

    public function team(){
        $team = Team::all();
        return view('pages.team', ['teams'=>$team]);
    }
    //

    public function table(){
        $fixtures = Fixture::where('isPlay', '=', 'No')->orderBy('gameDate')->get();
        $tables = lTable::select('team_id', 'win', 'lost', 'draw', 'points', 'gamePlay')->orderBy('points', 'Desc')->get();
        return view('pages.table', ['tables'=>$tables, 'fixtures'=>$fixtures]);
    }

    public function newsShow($id){
        $news = News::find($id);
        $newsLists = News::all();
        $ids = $id;
        //dd($news);
        return view('pages.news_show', ['news'=>$news, 'newslists'=>$newsLists, 'id'=>$ids]);
    }
}
