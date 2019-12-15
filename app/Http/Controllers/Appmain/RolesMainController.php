<?php

namespace App\Http\Controllers\Appmain;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Role;
use App\User;
use Gate;

class RolesMainController extends Controller
{
    public function show(){
        //isAdmin
        if(Gate::denies('show_users_admin')){
            return redirect()->route('no_access');
        }
        
        $roles = Role::select('id', 'rolename', 'inforole')->get();
         $formySwith = 4;
        return view('mylayouts.main.admin_page', compact('roles', 'formySwith'));

    }
    
    public function rolecreat(Request $request){
        //isAdmin
        if(Gate::denies('show_users_admin')){
            return redirect()->route('no_access');
        }
        
        
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
        //isAdmin
        if(Gate::denies('show_users_admin')){
            return redirect()->route('no_access');
        }
        

        if($request->isMethod('POST') && $request->input('role_id')!=NULL && $id !=0 ){
             
               $user_id=User::find($id);
                $user_role=Role::find($request->input('role_id'))->id;
                $user_id->roles()->attach($user_role);

                return redirect()->route('edit_user',['id'=>$id]);
            }

            $info = 'Что-то пошло не так';
            return redirect()->back()->with('message', $info);

    }


    
    public function showUsersRole($id=0){
        //isAdmin
        if(Gate::denies('show_users_admin')){
            return redirect()->route('no_access');
        }
        
           
            $roles = Role::findOrFail($id);
            $users_role = $roles->users()->orderBy('name')->paginate(10);
            //$users = User::select('id', 'name', 'login', 'activ')->where('role.id', $id)->paginate(10);        
           //for list role users
//            dump($users_role);
//            exit();
            $formySwith = 6;
            return view('mylayouts.main.admin_page', compact('users_role','formySwith', 'roles'));
    }
    
    public function roleDeleteUser(Request $request, $id=0){
        //isAdmin
        if(Gate::denies('show_users_admin')){
            return redirect()->route('no_access');
        }
        
        
        if($id == $request->input('user_dell_id')){
            $user = User::findOrFail($request->input('user_dell_id'));
            $user->roles()->detach();
            return redirect()->back();

        }
        
    }
    
    
}
