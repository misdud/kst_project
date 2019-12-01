<?php

namespace App\Http\Controllers\Appmain;

use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class WorksUsersController extends Controller {

    public function show_users() {
        //isAdmin

        $users_count = User::count();

        if ($users_count > 0) {

            //storing in session users
            session(['count_users' => $users_count]);


            $users = User::select('id', 'name', 'login', 'activ')->orderBY('name')->paginate(10);
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

        if (view()->exists('mylayouts.main.admin_page')) {
            $formySwith = 2;
            return view('mylayouts.main.admin_page', ['formySwith' => $formySwith]);
        } else {
            abort(404);
        }
    }

    public function create(Request $request) {
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
                'password'=> Hash::make($data['password']),
            ]);
            
            $creat_user = "Пользователь ". $data['name']." успешно создан";
            return redirect()->back()->with('message', $creat_user);
        }else{
            return redirect()->back()->with('message', 'Произошла ошибка при создании');
        }
    }


    public function edit($id=0){
        if($id == 0){
            return redirect()->back()->with('message', 'Произошла ошибка при выборе');
        }else{
            $edit_user = User::findOrFail($id);
//           dump($edit_user);
//          exit();
            $formySwith = 3;
            return view('mylayouts.main.admin_page', compact('edit_user', 'formySwith'));
            
        }
        
    }
  

}
