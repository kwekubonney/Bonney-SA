<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fixture extends Model
{
    //
    public function team1(){
    	return $this->belongsTo(Team::class, 'homeTeam');
    } 

     public function team2(){
        return $this->belongsTo(Team::class, 'awayTeam');
    } 

    public function venue(){
    	return $this->belongsTo(Venue::class);
    }

    public function gameassign(){
    	return $this->hasOne(Gameassign::class);
    }

    public function teamSquarts(){
        return $this->hasMany(Teamsquart::class);
    }

    public function result(){
      return  $this->hasOne(Result::class);
    }

    public function fixtureComments(){
        return $this->hasMany(fixtureComment::class);
    }
}
