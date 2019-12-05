<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});


Route::get('/', 'MyAuth\MyLogincontroller@index')->name('index');
Route::get('/login', 'MyAuth\MyLogincontroller@index')->name('login');
Route::post('/', 'MyAuth\MyLogincontroller@authproc')->name('mylogin');
Route::post('logout', 'MyAuth\MyLogincontroller@logout')->name('logout');

    Route::middleware(['auth'])->group(function(){
        Route::get('test', function(){
            $a= App\User::find(2);
            dump($a->otdel->otdelfullname);
        });
        
        Route::get('/main','Appmain\MainPageController@showMainPage')->name('main');
        
        //sitting users for admin
        Route::get('/users','Appmain\WorksUsersController@show_users')->name('show_users');
        Route::get('/registr','Appmain\WorksUsersController@registr')->name('registr_user');
        //create user
        Route::post('/registr','Appmain\WorksUsersController@create');
        //edit  user
        Route::get('/edituser/{id}','Appmain\WorksUsersController@edit')->name('edit_user')->where('id','[0-9]+');
        Route::match(['get', 'put'],'/edituseru/{id}','Appmain\WorksUsersController@editDbUser')->name('edit_bd_user')->where('id', '[0-9]+');
        //works roles
        Route::get('/roles', 'Appmain\RolesMainController@show')->name('roles_main');
        Route::match(['get', 'post'],'/rolecreat', 'Appmain\RolesMainController@rolecreat')->name('role_creat');
        Route::get('/usersrole/{id}', 'Appmain\RolesMainController@showUsersRole')->name('show_users_role')->where('id','[0-9]+');
        Route::match(['post', 'get'],'/roleadd/{id}', 'Appmain\RolesMainController@roleAddUser')->name('role_add');
        Route::delete('/roledelete/{id}', 'Appmain\RolesMainController@roleDeleteUser')->name('role_delete');
        //otdel edit
        Route::put('/otdeledit', 'Appmain\WorksUsersController@otdelEdit')->name('otdel_edit');
        
    
    
    
    
});

//Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
