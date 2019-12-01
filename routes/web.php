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
        
        Route::get('/main','Appmain\MainPageController@showMainPage')->name('main');
        Route::get('/register','Appmain\MainPageController@showMainPage')->name('registr');
   
    
    
    
    
});

//Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
