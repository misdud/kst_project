<?php

namespace App\Http\Controllers\Appmain;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Role;

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


    
    
    
    
}
