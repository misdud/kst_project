<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Otdel extends Model
{
    
    public function users(){
        return $this->hasMany('App\User', 'otdel_id', 'id');
    }
    
}
