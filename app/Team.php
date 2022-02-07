<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    /*
		This function show the connection between the teamrep model to the user model
    */

    public function teamrep(){
           return $this->hasOne(teamrep::class);
    }

    public function homes(){
    	return $this->hasMany(Fixture::class, 'homeTeam');
    } 

    public function aways(){
    	return $this->hasMany(Fixture::class, 'awayTeam');
    } 

    public function players(){
        return $this->hasMany(Player::class);
    }

    public function teamSquarts(){
        return $this->hasMany(Teamsquart::class);
    }

    public function ltable(){
        return $this->hasOne(lTable::class);
    }
}
