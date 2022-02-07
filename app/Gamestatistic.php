<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gamestatistic extends Model
{
    //
    public function user(){
    	return $this->belongsTo(User::class);
    }

    public function fixture(){
    	return $this->belongsTo(Fixture::class);
    }

    public function player(){
        return $this->belongsTo(Player::class);
    }
}
