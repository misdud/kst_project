<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'role_id', 'user_id'
    ];
    
    public function users(){
        return $this->belongsToMany('App\User', 'roles_users');
    }
    
    
    
}
