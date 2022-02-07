<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    //
    public function team(){
        return $this->belongsTo(Team::class);
    }

    public function teamSquarts(){
        return $this->hasMany(Teamsquart::class);
    }

    public function gamestatistics(){
        return $this->hasMany(Gamestatistic::class);
    }
}
