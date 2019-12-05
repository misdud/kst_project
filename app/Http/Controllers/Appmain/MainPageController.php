<?php

namespace App\Http\Controllers\Appmain;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Auth;

class MainPageController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function showMainPage() {
//        if(! Auth::check()){
//            redirect('login');
//        }

//        $user = 'admin';
//
//        switch ($user):
//            case 'admin':
//                return view('mylayouts.main.admin_page');
//                break;
//            case 'moderator':
//                return view('mylayouts.main.admin_page');
//                break;
//            case 'meneger':
//                return view('mylayouts.main.admin_page');
//                break;
//            case 'user':
//                return view('mylayouts.main.admin_page');
//                break;
//            default:
//                return view('mylayouts.main.admin_page');
//        endswitch;

            // @param 2 - for show default page admin 
            $formySwith =0;
            return view('mylayouts.main.admin_page', ['formySwith'=>$formySwith]);
   
    }

}
