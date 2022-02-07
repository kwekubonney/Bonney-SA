<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teamrep extends Model
{
    /*
		This function show the connection between the teamrep model to the user model
    */

    public function user(){
           return $this->belongsTo('App\User');
        }

     /*
		This function show the connection between the teamrep model to the team model
    */

    public function team(){
           return $this->belongsTo('App\Team');
        }
}
