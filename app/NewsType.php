<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsType extends Model
{
    //
    public function news(){
        return $this->hasMany(News::class);
    }
}
