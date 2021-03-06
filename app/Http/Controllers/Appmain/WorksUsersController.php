<?php

namespace App\Http\Controllers\Appmain;

use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\Otdel;
use Gate;

class WorksUsersController extends Controller {

    public function show_users() {
        //isAdmin
        if(Gate::denies('show_users_admin')){
            return redirect()->route('no_access');
        }

        $users_count = User::count();

        if ($users_count > 0) {

            //storing in session users
            session(['count_users' => $users_count]);


            $users = User::with('otdel')->select('id', 'name', 'login', 'activ', 'otdel_id')->orderBY('name')->paginate(10);
//            dump($users);
//            exit();
            //$users->orderBY('name');

            if (view()->exists('mylayouts.main.admin_page')) {

                // @param 1 - for show all users
                $formySwith = 1;
                return view('mylayouts.main.admin_page', compact('users', 'formySwith'));
            } else {
                abort(404);
            }
        }
    }

    public function registr() {
        //isAdmin
        if(Gate::denies('show_users_admin')){
            return redirect()->route('no_access');
        }
        
        if (view()->exists('mylayouts.main.admin_page')) {
         // @param 2 - for registr users
            $formySwith = 2;
            return view('mylayouts.main.admin_page', ['formySwith' => $formySwith]);
        } else {
            abort(404);
        }
    }

    public function create(Request $request) {
        //isAdmin
        if(Gate::denies('show_users_admin')){
            return redirect()->route('no_access');
        }
        
        if ($request->isMethod('POST')) {

            $data = $request->only(['name', 'login', 'password']);

            $rules = [
                'name' => ['required', 'string', 'max:30'],
                'login' => ['required', 'string', 'unique:users,login', 'max:10'],
                'password' => ['required', 'string', 'min:6', 'confirmed']
            ];
            $this->validate($request, $rules);

            $data = $request->only(['name', 'login', 'password']);

            User::create([
                'name' => $data['name'],
                'login' => $data['login'],
                'password' => Hash::make($data['password']),
            ]);

            $creat_user = "Пользователь <" . $data['name'] . "> успешно создан";
            return redirect()->back()->with('message', $creat_user);
        } else {
            return redirect()->back()->with('message', 'Произошла ошибка при создании');
        }
    }

    //echo form for edit user
    public function edit(Request $request, $id = 0) {
        //isAdmin
        if(Gate::denies('show_users_admin')){
            return redirect()->route('no_access');
        }
        
        if ($id == 0 && $request->input('role_id') == NULL) {
            return redirect()->back()->with('message', 'Произошла ошибка при выборе');
        } else {
            $edit_user = User::findOrFail($id);
            $roles_user = $edit_user->roles()->orderBy('rolename')->get();
            //dump($roles_user->isEmpty());
            //exit();
            if ($roles_user->isEmpty()) {
                $rol_user = 'У пользователя нет ролей';
                $roles = Role::select('id', 'rolename', 'inforole')->where('rolename', '<>', 'admin')->get();
            } else {
                $rol_usr = $edit_user->roles()->get();
                $rol_user = '';
                foreach ($rol_usr as $role) {
                    $arr_id_rol[] = $role->id;
                    $rol_user .= $role->rolename . ', ';
                }
                //dump($arr_id_rol);
                //exit();
                $roles = Role::whereNotIn('id', $arr_id_rol)->
                                where('rolename', '<>', 'admin')->get();
            }
        }

        $otdels = Otdel::select('id', 'otdelname', 'otdelfullname')->get();
        $formySwith = 3;
        return view('mylayouts.main.admin_page', compact('edit_user', 'formySwith', 'rol_user', 'roles', 'otdels'));
    }

    //function for edit user
    public function editDbUser(Request $request, $id = null) {
        //isAdmin
        if(Gate::denies('show_users_admin')){
            return redirect()->route('no_access');
        }

        if ($request->isMethod('PUT')) {
//            dump($request->activuser);
//            dump($id);
//            exit();
            $user = User::select('name', 'activ')->where('id', $id)->first();


            if ($request->input('activuser') === '1' && $request->input('passport') == '') {

                User::where('id', $id)->update([
                    'name' => $request->input('name'),
                    'activ' => $request->input('activuser')
                ]);
                return redirect()->back()->with('message', 'Пользователь активирован');
            } elseif ($request->input('activuser') === '0' && $request->input('password') == '') {
                User::where('id', $id)->update([
                    'name' => $request->input('name'),
                    'activ' => $request->input('activuser'),
                ]);
                return redirect()->back()->with('message', 'Пользователь заблокирован');
            } elseif ($request->input('name') == $user->name && is_null($request->input('activuser')) && $request->input('password') == '') {
                return redirect()->back()->with('message', 'Вы ничего не изменили');
            } elseif ($request->has('name') && $request->has('password')) {

                $rules = [
                    'name' => ['required', 'string', 'max:30'],
                    'password' => ['string', 'min:6']];

                $this->validate($request, ['password' => ['min:6']]);

                User::where('id', $id)->update([
                    'name' => $request->input('name'),
                    'password' => Hash::make($request->input('password')),
                    'activ' => $request->input('activ') === '1' ? 1 : 0,
                ]);
                return redirect()->back()->with('message', 'Пароль и поля изменены');
            }
        } else {
            return redirect()->route('show_users');
        }
//        dump($id);
//        dump($request->all());
//        exit();
    }
    
    public function otdelEdit(Request $request){
        //isAdmin
        if(Gate::denies('show_users_admin')){
            return redirect()->route('no_access');
        }
        
        if($request->isMethod('PUT')){
            $user = User::findOrFail($request->input('user_id'));
            $otdel = Otdel::findOrFail($request->input('otdel_id'));
            $user->otdel()->associate($otdel)->save(); 
            return redirect()->back();
        }
         
        
    }

}
