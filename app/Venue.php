<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venue extends Model
{
    //
    public function fixtures(){
    	return $this->hasMany(Fixture::class);
    }
}
