<?php

namespace App\Http\Controllers\Appmain;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Role;
use Auth;

class MainPageController extends Controller {

//    public function __construct() {
//        $this->middleware('auth');
//    }

    public function showMainPage() {
        if(! Auth::check()){
             redirect('login');
           }       
         $user = User::findOrFail(Auth::id());
         $user_role = $user->roles()->get();
         $role=[];
         foreach ($user_role as $rol){
             $role[].=$rol->rolename;
         }
         
         if(in_array('admin', $role)){
             $user = 'admin';
         }
         elseif(in_array('mang_kanc', $role)){
             $user = 'mang_kanc';
         }
         elseif(in_array('moder_kanc', $role)){
             $user = 'moder_kanc';
         }
         elseif(in_array('user_all', $role)){
             $user ='user_all';
         }else{
             $user = 'bad';
         }
       
       $time_do = mktime(0,0,0,12,10,2020);
       if(time() > $time_do){
           $formySwith =100;
           $done=TRUE;
           return view('mylayouts.main.admin_page', ['formySwith'=>$formySwith, 'done'=>$done]);   
       }
       
    switch ($user):
            case 'admin':
                //0- is default page in main for role
                $formySwith =0;
                return view('mylayouts.main.admin_page', ['formySwith'=>$formySwith,'user' =>'Администратор']);
                break;
            case 'mang_kanc':
                //0- is default page in main for role
                $formySwith =0;
                return view('mylayouts.main.admin_page', ['formySwith'=>$formySwith, 'user'=>'Менеджер']);
                break;
            case 'moder_kanc':
                //0- is default page in main for role
                $formySwith =0;
                return view('mylayouts.main.admin_page', ['formySwith'=>$formySwith,'user'=>'Модератор']);
                break;
            case 'user_all':
                //0- is default page in main for role
                $formySwith =0;
                return view('mylayouts.main.admin_page', ['formySwith'=>$formySwith,'user'=>'Пользователь']);
                break;
            default:
                //bad not roles - help admin
                $formySwith =100;
                $done=NULL;
                return view('mylayouts.main.admin_page', ['formySwith'=>$formySwith, 'done'=>$done]);
        endswitch;
        
            return redirect()->back();
            // @param 2 - for show default page admin 
            //$formySwith =0;
            //return view('mylayouts.main.admin_page', ['formySwith'=>$formySwith]);
   
    }

}
