<?php

namespace App\Http\Controllers\AppKancler;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Zakaz;
use App\Orders;
use App\Otdel;
use App\Product;
use App\User;

class ValidResourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //test
        if(!Auth::check()){
            return redirect('/login');
        }

        //get ist all zakaz;
        $list_zakazs = Zakaz::with('orders')->orderBy('created_at','desc')->paginate(10);
        if(view()->exists('mylayouts.main.validate.all_list_zakaz')){
            $formySwith=22;
            return view('mylayouts.main.admin_page', compact('formySwith', 'list_zakazs'));
        }else{
            abort('404');
        }
 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $zakaz= Zakaz::findOrFail($id);
        $orders_zakaz = $zakaz->orders()->with('otdel')->get();
        $group_otdel_orders=$orders_zakaz->groupBy('otdel_id');
        //d($orders_zakaz);
        //dump($foo);
        
        if(view()->exists('mylayouts.main.validate.all_list_otdels')){
            $formySwith=23;
            return view('mylayouts.main.admin_page', compact('formySwith', 'group_otdel_orders', 'zakaz'));
        }else{
            abort('404');
        }
        
        foreach ($group_otdel_orders as $otdel){
         echo $otdel->count();
         //echo $otdel->otdel_id;
         foreach ($otdel as $a){
             echo $a->otdel->otdelfullname;
             echo $a->otdel->id;
             break;
         }
         
         //cho $otdel->otdel->otdelname;
         //dump($otdel); //$otdel->otdel->otdelname;
         //echo '<br>';
        }
        //exit();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
