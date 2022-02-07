<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teamsquart extends Model
{
    //
    public function team(){
        return $this->belongsTo(Team::class);
    }

    public function player(){
        return $this->belongsTo(Player::class);
    }

    public function fixture(){
        return $this->belongsTo(Fixture::class);
    }
}
