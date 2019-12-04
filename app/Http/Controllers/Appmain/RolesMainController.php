<?php

namespace App\Http\Controllers\Appmain;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Role;
use App\User;

class RolesMainController extends Controller
{
    public function show(){
        
        $roles = Role::select('id', 'rolename', 'inforole')->get();
         $formySwith = 4;
        return view('mylayouts.main.admin_page', compact('roles', 'formySwith'));

    }
    
    public function rolecreat(Request $request){
        
        if($request->isMethod('GET')){
            $formySwith = 5;
            return view('mylayouts.main.admin_page', compact('formySwith'));
        }else{
               $rules = [
                'rolename' => ['required', 'string', 'max:10'],
                'inforole' => ['required', 'string',  'max:30'],
            ];
               
            $this->validate($request, $rules);
         
            $data = $request->only('rolename', 'inforole');
            
            Role::create([
                'rolename'=>$data['rolename'],
                'inforole'=>$data['inforole'],
            ]);

            $roleinfa = 'Роль <'.$data['rolename'].'> добавлена.';
            return redirect()->back()->with('message', $roleinfa);
            
            
        }
        return redirect('/main');
    }
    
        public function roleAddUser(Request $request, $id=0){
          
            dump($request->has('role_id'));
            dump($request->input('role_id'));

        if($request->isMethod('POST') && $request->input('role_id')!=NULL && $id !=0 ){
             
               $user_id=User::find($id);
                $user_role=Role::find($request->input('role_id'))->id;
                $user_id->roles()->attach($user_role);

                return redirect()->route('edit_user',['id'=>$id]);

            }
 

        
            $info = 'Что-то пошло не так';
            return redirect()->back()->with('message', $info);

    }


    
    public function showUsersRole(){
        echo 1;
        exit();
    }
    
    
}
