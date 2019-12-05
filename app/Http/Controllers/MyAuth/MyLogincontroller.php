<?php

namespace App\Http\Controllers\MyAuth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class MyLogincontroller extends Controller {

    public function index() {
        //return redirect(showMainPage());
        return view('auth.login');
    }

    public function authproc(Request $request) {

        $arr = $request->all();
        $remember = $request->has('remember');


        if (Auth::attempt([
                    'login' => $arr['login'],
                    'password' => $arr['password'],
                    //'activ'=>1
                    
                ],$remember)) {
            $user = Auth::user();
            //проверка на активность
            if ($user->activ == 0) {
                Auth::logout();
                return redirect()->back()->withInput($request->only('login'))->withErrors(['login' => 'Вы заблокированы']);
            }
            //если прошёл проверку перенаправляем на страницу проекта
            return redirect()->route('main');
        }
        //если не прошёл проверку гоним назад
        return redirect()->back()->withInput($request->only('login','remember'))->withErrors(['login'=>'Ваши данные не верны']);
    }
    
    public function logout(){
        Auth::logout();
        return redirect()->route('index');
        
    }
    

}
