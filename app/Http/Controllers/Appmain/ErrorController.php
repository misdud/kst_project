<?php

namespace App\Http\Controllers\AppMain;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ErrorController extends Controller
{
    public function noAccess(){
        return view('mylayouts.main.no_access');
    }
}
