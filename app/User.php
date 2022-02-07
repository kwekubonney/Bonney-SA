<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'kind',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /*
        This function show the connection between the user model to the teamrep model
    */

        public function agent(){
            return $this->hasOne('App\Agent');
        }

        public function staff(){
            return $this->hasOne('App\Staff');
        }

        public function press(){
            return $this->hasOne('App\Press');
        }

        public function gameassign(){
            return $this->hasMany(Gameassign::class);
        }

        public function teamrep(){
           return $this->hasOne('App\Teamrep');
        }

        // 
         public function news(){
            return $this->hasMany(User::class);
        }

        public function fixtureComments(){
            return $this->hasMany(fixtureComment::class);
        }
}
