<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    //
    public function newsType(){
        return $this->belongsTo(NewsType::class);
    }

    // 
    public function comments(){
        return $this->hasMany(Comment::class);
    }

    // 
    public function user(){
        return $this->belongsTo(User::class);
    }
}
