<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    //

    public function fixture(){
      return  $this->belongsTo(Fixture::class);
    }
}
