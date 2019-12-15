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
        
        Route::get('/no_access', 'Appmain\ErrorController@noAccess')->name('no_access');
        
        
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
        
        
        // For Works zakaz (open\close) - list
        Route::get('/listzakaz', 'AppKancler\ZakazMainController@showListZakaz')->name('zakaz_list');
        Route::get('/zakazcreat', 'AppKancler\ZakazMainController@showFormZakaz')->name('zakaz_creat');
        Route::post('/zakcreat', 'AppKancler\ZakazMainController@createZakaz')->name('zakaz_creat_regist');
        Route::get('/zakedit/{id}/edit', 'AppKancler\ZakazMainController@editZakaz')->name('zakaz_edit')->where('id','[0-9]+');
        Route::put('/zakedit/{id}', 'AppKancler\ZakazMainController@editZakazdb')->name('zakaz_edit_db');
        
        //works derectory product
        Route::resource('/products', 'AppKancler\ProductController')->except(['show', 'destroy']);
        
        //for works orders
        Route::resource('/orders', 'AppKancler\OrderController')->only(['index', 'store', 'show']);
        Route::resource('/myorders', 'AppKancler\MyOrderResourseController')->except(['create', 'store']);
        //for show otdel order
        Route::get('/otdellist', 'AppKancler\OrderOtdelController@showList')->name('otdel_order_list');
        Route::get('/otdelorders/{id_zakaz}', 'AppKancler\OrderOtdelController@showAllInZakaz')->name('otdel_orders_zakaz');
        Route::get('/downloadPDF/{id_zak}', 'AppKancler\OrderOtdelController@downloadTotalZakazPDF')->name('get_pdf_zakaz_otdel');
        
        //for valid
        Route::get('/downdPDF/{id_zak}/otdel/{id_otdel}', 'AppKancler\ValidResourseController@downloadZakazPDF')->name('otdel_pdf_zakaz');
        Route::get('/validotdel/{zakaz_id}/edit/{otdel_id}', 'AppKancler\ValidResourseController@validOtdel')->name('valid_otdel')
                ->where(['zakaz_id'=>'[0-9]+', 'otdel_id'=>'[0-9]+']);
        Route::resource('/valids', 'AppKancler\ValidResourseController')->except(['create', 'store', 'edit']);
        
        //for raport kancler
        Route::get('/raports', 'AppKancler\RaportKanclerController@index')->name('show_index_raport');
        Route::get('/rapshow/{id_zakr}', 'AppKancler\RaportKanclerController@show')->name('show_otdels_raport')->where('id_zakr','[0-9]+');
        Route::get('/rapotd/{id_zak}/show/{id_otdel}', 'AppKancler\RaportKanclerController@showRaportOtdel')->name('show_otd_rap')
                ->where(['id_zak'=>'[0-9]+', 'id_otdel'=>'[0-9]+']);
        //for svodni
        Route::get('/showsvod/{id_zak}', 'AppKancler\RaportKanclerController@showSvod')->name('show_svod_zakaz');
        Route::get('/downsvod/{id_zak}', 'AppKancler\RaportKanclerController@downloadSvodPDF')->name('svod_zakaz_pdf');
                         

});

//Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
