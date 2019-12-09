<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable=[
        'discriptorder', 'count', 'count_good', 'valid', 'user_id', 'product_id', 'zakaz_id', 'otdel_id'
    ];
    
    
    public function user(){
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
    
      public function otdel(){
        return $this->belongsTo('App\Otdel', 'otdel_id', 'id');
    }
    
      public function product(){
        return $this->belongsTo('App\Product', 'product_id', 'id');
    }
    
      public function zakaz(){
        return $this->belongsTo('App\Zakaz', 'zakaz_id', 'id');
    }
    
}
