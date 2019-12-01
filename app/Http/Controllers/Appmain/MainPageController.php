<?php

namespace App\Http\Controllers\Appmain;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Auth;

class MainPageController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    

    public function showMainPage(){
//        if(! Auth::check()){
//            redirect('login');
//        }
      
             return view('mylayouts.main.main_page');
        
        
        
    }
}
