<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zakaz extends Model
{
        protected $fillable = [
        'zakazname', 'zakazactiv', 'dodate',
    ];
}
