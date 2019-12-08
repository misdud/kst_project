<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
   
    protected $fillable=[
        'productname', 'productdiscript', 'units', 'productactiv'
    ];
    
    public function orders(){
        return $this->hasMany('App\Order', 'product_id', 'id');
    }
}
