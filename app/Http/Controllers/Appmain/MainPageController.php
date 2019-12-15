<?php

namespace App\Http\Controllers\Appmain;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Role;
use Auth;

class MainPageController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function showMainPage() {
        if(! Auth::check()){
             redirect('login');
           }
            
//         $user = User::findOrFail(Auth::id());
//         $user_role = $user->roles()->get();
//         $role=[];
//         foreach ($user_role as $rol){
//             $role[].=$rol->rolename;
//         }
//         
//         if(in_array('admin', $role)){
//             $user = 'admin';
//         }
//         elseif(in_array('menjr_kanc', $role)){
//             $user = 'menjr_kanc';
//         }
//         elseif(in_array('moder_kanc', $role)){
//             $user = 'moder_kanc';
//         }
//         elseif(in_array('user_all', $role)){
//             $user ='user_all';
//         }else{
//             $user = 'bad';
//         }
         
         
//         dump($user);
//         dump($role);
         //exit();


//    switch ($user):
//            case 'admin':
//                //0- is default page in main for role
//                $formySwith =0;
//                return view('mylayouts.main.admin_page', ['formySwith'=>$formySwith,'user' =>'Администратор']);
//                break;
//            case 'manager_kanc':
//                //0- is default page in main for role
//                $formySwith =0;
//                return view('mylayouts.main.admin_page', ['formySwith'=>$formySwith]);
//                break;
//            case 'moder_kanc':
//                //0- is default page in main for role
//                $formySwith =0;
//                return view('mylayouts.main.admin_page', ['formySwith'=>$formySwith]);
//                break;
//            case 'user_all':
//                //0- is default page in main for role
//                $formySwith =0;
//                return view('mylayouts.main.all_user_page', ['formySwith'=>$formySwith,'user'=>'пользователь']);
//                break;
//            default:
//                //bad not roles - help admin
//                return view('mylayouts.main.admin_page', ['formySwith'=>$formySwith]);
//        endswitch;

            // @param 2 - for show default page admin 
            $formySwith =0;
            return view('mylayouts.main.admin_page', ['formySwith'=>$formySwith]);
   
    }

}
