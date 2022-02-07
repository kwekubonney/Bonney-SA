<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FixtureComment extends Model
{

    //
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function fixture(){
        return $this->belongsTo(Fixture::class);
    }
}
