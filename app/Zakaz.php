<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zakaz extends Model
{
        protected $fillable = [
        'zakazname', 'zakazactiv', 'dodate',
    ];
        
     public function orders(){
         return $this->hasMany('App\Order', 'zakaz_id', 'id');
     }   
        
        
}
